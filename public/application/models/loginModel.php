<?php 
class loginModel extends CI_Model
{
	
	function __construct(){
		parent::__construct();
	}

	function check(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        //$rememberMe = $this->input->post('rememberMe');
        $this->db->select('username','password');
        $this->db->where('username',$username);
        $this->db->where('password',sha1($password));
        // ,sha1($password)
        $this->db->from('users');
        $is = $this->db->count_all_results();
        $query = $this->db->query("select * from users INNER JOIN poeple ON users.persson_id = poeple.po_id WHERE username ='".$username."'");
        $result = $query->result();
        if($is > 0){
            foreach($result as $rows)
                $user_id =  $rows->persson_id;
                $po_photo = $rows->po_photo;
                $data_session = array('user_id'=>$user_id ,'po_photo'=> base_url().$po_photo,'login'=>true);
                $this->session->set_userdata($data_session);

                redirect("indexController");
        }else{
            $this->load->view('login' ,array('error'=>true));
        }    
    }	

}

?>