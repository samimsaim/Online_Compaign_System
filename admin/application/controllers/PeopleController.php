<?php 
Class PeopleController extends CI_Controller{
	function __construct(){
		parent::__construct();
	    $this->load->model('PeopleModel');
	}
	function index(){
		$data=$this->PeopleModel->GetData();
		$this->load->view('include/header.inc.php');
		$this->load->view('People', array('data'=>$data));
		$this->load->view('include/footer.inc.php');
	}
	function AddPeople(){
		$this->load->view('include/header.inc.php');
		$this->load->view('AddPeople');
		$this->load->view('include/footer.inc.php');
	}


        function CheckPeople(){
        $error_name = $error_lname = $error_photo = $error_gender = $error_email = $error_phone =   '';
        $error = false;
              if (isset($_POST['AddPeo'])) {
            if (empty($_POST['name'])) {
                $error_name = 'لطفاً اسم خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['lastname'])) {
                $error_lname = 'لطفاً اسم خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['email'])) {
                $error_email = 'لطفاً اسم خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['phone'])) {
                $error_phone = 'لطفاً اسم خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['gender'])) {
                $error_gender = 'لطفاً جنسیت خود را انتخاب نماید';
                $error = true;
            }
            // ------------------------ Image validation ---------------
             if (isset($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
                if ($_FILES["photo"]["type"] != "image/jpeg" && $_FILES["photo"]["type"] != "image/png") {
                    $error_photo = "Please select jpeg| jpg| png files";
                    $error = true;
                }
            } else {
                switch ($_FILES["photo"]["error"]) {
                    case UPLOAD_ERR_INI_SIZE:
                        $error_photo = "This photo has larger size";
                        $error = true;
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        $error_photo = "The photo is larger than the script allows.";
                        $error = true;
                        break;
                    case UPLOAD_ERR_NO_FILE:
//                        $error_photo = "شما هیج عکس انتخاب نکرده اید";
//                        $error = true;
                        break;
                    default:
                        $error_photo = "Please contact to server manager !";
                        $error = true;
                }
            }
            // ---------------------------------------------------------
        }
        //------------------------------------------------
    
        if(!$error){
             $destination ="C:/xampp/htdocs/kandid/assets/img/people/";
            if (!empty($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK)
                move_uploaded_file($_FILES['photo']['tmp_name'], $destination . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5));
            $image =  base_url()."assets/img/people/" . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5);
             if (empty($_FILES["photo"]["name"])) {
                $image = "";
            }

            $failed_data=array(
                'po_name' => $_POST['name'],
                'po_last_name' => $_POST['lastname'],
                'po_email' => $_POST['email'],
                'gender'=>$_POST['gender'],
                'po_photo' => $image,
                'create_at' => date('Y-m-d'),
                'update_at' => date('Y-m-d'),
            );
          $this->PeopleModel->insertPeople($failed_data);
          redirect('PeopleController/index');
         
           }else{
            $this->load->view('include/header.inc.php');
            $this->load->view('AddPeople', array(
                'error_name' => $error_name,
                'error_lname' => $error_lname,
                'error_email'=>$error_email,
                'error_phone'=>$error_phone,
                'error_photo' => $error_photo,
                'error_gender'=>$error_gender,
            ));
            $this->load->view('include/footer.inc.php');
        }
}

	function DeletePeople(){
		$id=$_GET['id'];
		$this->PeopleModel->DeletePeople($id);
		redirect('PeopleController/index');
	}
	function PeopleDetail(){
		$id=$_GET['id'];
		$data=$this->PeopleModel->GetDetail($id);
		$this->load->view('include/header.inc.php');
		$this->load->view('PeopleDetail',array('data'=>$data));
		$this->load->view('include/footer.inc.php');
	}
	function EditPeopl(){
		$id=$_GET['id'];
		$data=$this->PeopleModel->GetPepl($id);
		$this->load->view('include/header.inc.php');
		$this->load->view('EditPeople',array('data'=>$data));
		$this->load->view('include/footer.inc.php');
	}
    function CheckEditPeople(){
        $error_name = $error_lname = $error_photo = $error_email = $error_phone =   '';
        $error = false;
              if (isset($_POST['EditPeople'])) {
            if (empty($_POST['name'])) {
                $error_name = 'لطفاً اسم خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['lastname'])) {
                $error_name = 'لطفاً اسم خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['email'])) {
                $error_name = 'لطفاً اسم خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['phone'])) {
                $error_name = 'لطفاً اسم خود را وارد نماید';
                $error = true;
            }
            // ------------------------ Image validation ---------------
             if (isset($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
                if ($_FILES["photo"]["type"] != "image/jpeg" && $_FILES["photo"]["type"] != "image/png") {
                    $error_photo = "Please select jpeg| jpg| png files";
                    $error = true;
                }
            } else {
                switch ($_FILES["photo"]["error"]) {
                    case UPLOAD_ERR_INI_SIZE:
                        $error_photo = "This photo has larger size";
                        $error = true;
                        break;
                    case UPLOAD_ERR_FORM_SIZE:
                        $error_photo = "The photo is larger than the script allows.";
                        $error = true;
                        break;
                    case UPLOAD_ERR_NO_FILE:
//                        $error_photo = "شما هیج عکس انتخاب نکرده اید";
//                        $error = true;
                        break;
                    default:
                        $error_photo = "Please contact to server manager !";
                        $error = true;
                }
            }
            // ---------------------------------------------------------
        }
        //------------------------------------------------
    
        if(!$error){
             $destination ="C:/xampp/htdocs/kandid/assets/img/kandid/";
            if (!empty($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK)
                move_uploaded_file($_FILES['photo']['tmp_name'], $destination . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5));
            $image =  base_url()."assets/img/kandid/" . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5);
             if (empty($_FILES["photo"]["name"])) {
                $image = "";
            }

            $failed_data=array(
                'po_name' => $_POST['name'],
                'po_last_name' => $_POST['lastname'],
                'po_email' => $_POST['email'],
                'po_phone'=>$_POST['phone'],
                'po_photo' => $image,
                'create_at' => date('Y-m-d'),
                'update_at' => date('Y-m-d'),
            );
            $id=$_POST['people_id'];
          $this->PeopleModel->UpdatePeople($failed_data, $id);
          redirect('PeopleController/index');
         
           }else{
            $this->load->view('include/header.inc.php');
            $this->load->view('AddPeople', array(
                'error_name' => $error_name,
                'error_lname' => $error_lname,
                'error_email'=>$error_email,
                'error_phone'=>$error_phone,
                'error_photo' => $error_photo,
            ));
            $this->load->view('include/footer.inc.php');
        }
}

}
?>