<?php 
class KandidController extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('kandidModel');
	}

	function index(){
		$result = $this->kandidModel->getListOfKandid();
		$this->load->view('include/header.inc.php',array('title' =>"KANDID PAGE"));
		$this->load->view('kandidList', array('kandid' =>$result));
		$this->load->view('include/footer.inc.php');
	}

	function provicne(){
		$provicne = $_GET['province'];
		$result = $this->kandidModel->getListOfKandidProvince($provicne);
		$this->load->view('include/header.inc.php',array('title' =>"KANDID PAGE"));
		$this->load->view('kandidList', array('kandid' =>$result));
		$this->load->view('include/footer.inc.php');

	}

	function search(){
		if (isset($_POST['search'])) {
			$data = $_POST['data'];
			$result = $this->kandidModel->searchKandid($data);
			$this->load->view('include/header.inc.php',array('title' =>"KANDID PAGE"));
			$this->load->view('kandidList', array('kandid' =>$result));
			$this->load->view('include/footer.inc.php');
		}
	}

	function contactUs(){
		if(isset($_POST['contact'])){
			$data = array(
				'first_name' =>$_POST['first_name'],
				'last_name' =>$_POST['last_name'],
				'email' =>$_POST['email'],
				'message' =>$_POST['message'],
				'created_at' => date('Y-m-d H:i:s')
				);
			$status = $this->kandidModel->contactUs($data);
			if ($status) {
				redirect("indexController");
			}
		}
	}

	function follower(){
		$id = $_GET['id'];
		$user_id = isset($_SESSION['user_id'])? $_SESSION['user_id'] : 0;
		$kandidInfo = $this->kandidModel->getKandidInfo($id);
		$result = $this->kandidModel->getFollow($id,$user_id);
		$follow = false;
		if($result >0){
			$follow = true;
		}
		$this->load->view('include/header.inc.php',array('title' =>"PROFILE PAGE"));
		$this->load->view('kandidFollower',array('kandidInfo' => $kandidInfo,'follow'=>$follow));
		$this->load->view('include/footer.inc.php');
	}

	function photo(){
		$id = $_GET['id'];
		$user_id = isset($_SESSION['user_id'])? $_SESSION['user_id'] : 0;
		$kandidInfo = $this->kandidModel->getKandidInfo($id);
		$result = $this->kandidModel->getFollow($id,$user_id);
		$follow = false;
		if($result >0){
			$follow = true;
		}
		$this->load->view('include/header.inc.php',array('title' =>"PROFILE PAGE"));
		$this->load->view('kandidPhoto',array('kandidInfo' => $kandidInfo,'follow'=>$follow));
		$this->load->view('include/footer.inc.php');
	}

	function video(){
		$id = $_GET['id'];
		$user_id = isset($_SESSION['user_id'])? $_SESSION['user_id'] : 0;
		$kandidInfo = $this->kandidModel->getKandidInfo($id);
		$result = $this->kandidModel->getFollow($id,$user_id);
		$follow = false;
		if($result >0){
			$follow = true;
		}
		$this->load->view('include/header.inc.php',array('title' =>"PROFILE PAGE"));
		$this->load->view('kandidVideo',array('kandidInfo' => $kandidInfo,'follow'=>$follow));
		$this->load->view('include/footer.inc.php');
	}

	function about(){
		$id = $_GET['id'];
		$user_id = isset($_SESSION['user_id'])? $_SESSION['user_id'] : 0;
		$kandidInfo = $this->kandidModel->getKandidInfo($id);
		$result = $this->kandidModel->getFollow($id,$user_id);
		$follow = false;
		if($result >0){
			$follow = true;
		}
		$this->load->view('include/header.inc.php',array('title' =>"PROFILE PAGE"));
		$this->load->view('kandidAbout',array('kandidInfo' => $kandidInfo,'follow'=>$follow));
		$this->load->view('include/footer.inc.php');
	}

	function getImages($id){
		$this->db->select("image");
		$this->db->where('id',$id);
		$this->db->from('post_image');
		$image = $this->db->get()->result();
		$data = null;
		foreach ($image as $row) {
			$data = $row->image;
		}
		echo json_encode(array('image'=>base_url().$data));
	}

	function getVideos($id){
		$this->db->select("video");
		$this->db->where('id',$id);
		$this->db->from('post_video');
		$videos = $this->db->get()->result();
		$data = null;
		foreach ($videos as $rows) {
			$data = $rows->video;
		}
		echo json_encode(array('video'=>base_url().$data));
	}

} 
?>