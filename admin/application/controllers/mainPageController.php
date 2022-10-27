
<?php
class MainPageController extends MY_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('KandidModel');
                $this->load->model('mainPageModel');	
	}
 	function index($message = null, $type = null){
        $data=$this->KandidModel->GetData();
        $result=$this->KandidModel->GetBio();
        $this->load->view('include/header.inc.php');
        $this->load->view("mainPage",array('data'=>$data,'Message' => $message, 'Type' => $type, $result));
        $this->load->view('include/footer.inc.php');
 	}
 	function chartView(){
        $kandid = $this->mainPageModel->getKandid();
        $this->load->view('include/header.inc.php');
        $this->load->view("chartView",array('kandid'=>json_encode($kandid)));
        $this->load->view('include/footer.inc.php');
 	}

}?>





