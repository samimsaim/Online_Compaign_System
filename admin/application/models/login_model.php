<?php
class Login_model extends CI_Model{

	function __construct(){
		parent::__construct();
	}

	public function check(){
        if(isset($_SESSION['id'])){
            redirect("mainPageController/index");
        }else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $rememberMe = $this->input->post('rememberMe');
            $this->db->select('username', 'password');
            $this->db->where('username', $username);
            $this->db->where('password', sha1($password));
            $this->db->from('users');
            $is = $this->db->count_all_results();
            $query = $this->db->query("select * from users WHERE username ='" . $username . "'");
            $result = $query->result();
            if ($is > 0) {
                foreach ($result as $rows)
                    $data_session = array('id' => $rows->user_id, 'username' => $username,'person_type'=>$rows->person_type,'person_id'=>$rows->person_id,'user_level'=>$rows->user_level,'gender' => $rows->gender, 'image' => $rows->photo,'login' => true, 'lock' => false);
                $this->session->set_userdata($data_session);
                redirect("mainPageController/index");
            } else {
                $this->load->view('login', array('error' => true));
            }
        }
	}

}
?>