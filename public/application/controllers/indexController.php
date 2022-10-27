<?php 
class IndexController extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('kandidModel');
	}

	function index(){
		$posts = $this->kandidModel->getAllPosts();
		$this->load->view('include/header.inc.php',array('title' =>"KANDID PAGE"));
		$this->load->view('index',array('posts'=>$posts));
		$this->load->view('include/footer.inc.php');
	}

	function kandidProfile(){
		$id = $_GET['id'];
		$user_id = isset($_SESSION['user_id'])? $_SESSION['user_id'] : 0;
		$kandidInfo = $this->kandidModel->getKandidInfo($id);
		$result = $this->kandidModel->getFollow($id,$user_id);
		$follow = false;
		if($result >0){
			$follow = true;
		}
		$posts = $this->kandidModel->getPosts($id);
		$this->load->view('include/header.inc.php',array('title' =>"KANDID PAGE"));
		$this->load->view('kandidProfile',array('kandidInfo' => $kandidInfo,'follow'=>$follow,'posts'=>$posts));
		$this->load->view('include/footer.inc.php');
	}

	function provinceKandid(){
		$this->load->view('include/header.inc.php',array('title' =>"KANDID PAGE"));
		$this->load->view('kandidList');
		$this->load->view('include/footer.inc.php');
	}

	function contactUs(){
		$this->load->view('include/header.inc.php',array('title' =>"CONTACT US"));
		$this->load->view('contactUs');
		$this->load->view('include/footer.inc.php');
	}

	function aboutUs(){
		$this->load->view('include/header.inc.php',array('title' =>"ABOUT US"));
		$this->load->view('aboutUs');
		$this->load->view('include/footer.inc.php');
	}

	function login(){
		$this->load->view('include/header.inc.php',array('title' =>"LOGIN"));
		$this->load->view('login');
		$this->load->view('include/footer.inc.php');
	}

	function checkLogin(){
		if(isset($_POST['login'])){
			if(!isset($_POST['isKandid'])){
		        $username = $this->input->post('email');
		        $password = $this->input->post('password');
		        $this->db->select('po_email','password');
		        $this->db->where('po_email',$username);
		        $this->db->where('password',sha1($password));
		        $this->db->from('poeple');
		        $is = $this->db->count_all_results();
		        $query = $this->db->query("select * from poeple WHERE po_email ='".$username."'");
		        $result = $query->result();
		        if($is > 0){
		            foreach($result as $rows)
		                $user_id =  $rows->po_id;
		                $po_photo = $rows->po_photo;
		                $data_session = array('user_id'=>$user_id ,'photo'=> $po_photo,'name'=>$rows->po_name,'last_name'=>$rows->po_last_name,'level'=>"people",'login'=>true);
		                $this->session->set_userdata($data_session);
		                redirect("indexController");
		        }else{
		            redirect('indexController/login');
		        }
	    	}else{
	    		$username = $this->input->post('email');
		        $password = $this->input->post('password');
		        $this->db->select('person_id');
		        $this->db->where('username',$username);
		        $this->db->where('password',sha1($password));
		        $this->db->from('users');
		        $is = $this->db->count_all_results();
		        if($is > 0){
		        	$this->db->select('person_id');
		        	$this->db->where('username',$username);
		        	$this->db->from('users');
		        	$kan_id = $this->db->get()->row()->person_id;
		        	$this->db->select('kan_id,kan_name,kan_last_name,kan_profile_photo');
		        	$this->db->where('kan_id',$kan_id);
		        	$this->db->from('kandid');
		        	$result = $this->db->get()->result();
		            foreach($result as $rows)
		                $data_session = array('user_id'=>$rows->kan_id ,'photo'=> $rows->kan_profile_photo,'name'=>$rows->kan_name,'last_name'=>$rows->kan_last_name,'level'=>"Condidate",'login'=>true);
		                $this->session->set_userdata($data_session);
		                redirect("indexController");
		        }else{
		            redirect('indexController/login');
		        }
	    	}
        }else{
        	redirect("indexController/login");
        }  
    }

    function logout(){
    	session_destroy();
        unset($_SESSION['login']);
        unset($_SESSION['user_id']);
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),null, time() - 3600);
        }
        redirect('indexController/index');
    }	

	function addPeople(){
		$this->load->view('include/header.inc.php',array('title' =>"REGISTRATION"));
		$this->load->view('addPeople');
		$this->load->view('include/footer.inc.php');
	}

	function checkAddPeople(){
		if(isset($_POST['addPeople'])){
			 $destination ="C:/xampp/htdocs/kandid/assets/img/people/";
            if (!empty($_FILES["image"]) and $_FILES["image"]["error"] == UPLOAD_ERR_OK)
            move_uploaded_file($_FILES['image']['tmp_name'], $destination . ($_FILES['image']['name']) . date('his') . "." . substr($_FILES['image']['type'], 6, 5));
            $image = "../assets/img/people/" . ($_FILES['image']['name']) . date('his') . "." . substr($_FILES['image']['type'], 6, 5);

			$data = array(
				'po_name' =>$_POST['first_name'],
				'po_last_name' => $_POST['last_name'],
				'po_email' => $_POST['email'],
				'password'=>sha1($_POST['password']),
				'gender' => $_POST['gender'],
				'po_photo' => $image,
				'create_at'=> date('Y-m-d H:i:s'),
				'update_at'=> date('Y-m-d H:i:s')
				);
			$status = $this->kandidModel->insertPeople($data);
			if ($status) {
				redirect("indexController/login");
			}
		}
	}

	function follow($kan_id){
		$data = array(
			'people_id' =>$_SESSION['user_id'],
			'kan_id' =>$kan_id,
			'created_at' => date('Y-m-d H:i:s')
		 );
		$status = $this->kandidModel->follow($data);
		if($status){
			redirect("indexController/kandidProfile?id=$kan_id");
		}
	}

	function deleteFollow($kan_id){
		$people_id = $_SESSION['user_id'];
		$status = $this->kandidModel->deleteFollow($kan_id,$people_id);
		if($status){
			redirect("indexController/kandidProfile?id=$kan_id");
		}
	}

	function insertComment(){
		$post_id = $_POST['post_id'];
		$comment = 'comment_'.$post_id;
		$data = array(
			'com_mark' =>$_POST["$comment"] ,
			'po_id'=>$_POST['people_id'],
			'post_id'=>$post_id,
			'create_at'=>date('Y-m-d h:i:s')
		);
		$this->db->where('com_mark',$data['com_mark']);
		$this->db->where('po_id',$data['po_id']);
		$this->db->where('post_id',$data['post_id']);
		$this->db->where('create_at',$data['create_at']);
		$this->db->from('comment');
		$result = $this->db->count_all_results();
		if(!$result > 0){
			$this->db->insert('comment',$data);
			$this->db->where('post_id',$data['post_id']);
			$this->db->from('comment');
			$commentCount = $this->db->count_all_results();
			echo json_encode(array('msg' =>'yes','commentCount'=>$commentCount));
		}
	}

	function insertLike(){
		$post_id = $_POST['postID'];
		$person_id = $_SESSION['user_id'];
		$data = array(
			'person_id'=>$person_id,
			'post_id'=>$post_id,
			'created_at'=>date('Y-m-d h:i:s')
		);
		$this->db->where('person_id',$data['person_id']);
		$this->db->where('post_id',$data['post_id']);
		$this->db->from('like');
		$result = $this->db->count_all_results();
		if(!$result > 0){
			$this->db->insert('like',$data);
			$this->db->where('post_id',$data['post_id']);
			$this->db->from('like');
			$likeCount = $this->db->count_all_results();
			echo json_encode(array('msg' =>'yes','likeCount'=>$likeCount));
		}else{
			$this->db->where('person_id',$data['person_id']);
			$this->db->where('post_id',$data['post_id']);
			$this->db->delete('like');
			$this->db->where('post_id',$data['post_id']);
			$this->db->from('like');
			$likeCount = $this->db->count_all_results();
			echo json_encode(array('msg' =>'no','likeCount'=>$likeCount));
		}
	}

} 
?>