<?php
/**
* 
*/
class UsersController extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('usersModel');
	}

    public function index($message = null, $type = null)
	{	if($_SESSION['user_level']==2){
        redirect('usersController/kanPro');
    }
		$user=$this->usersModel->getuser();
		$this->load->view('include/header.inc.php');
		$this->load->view('Users',array("user"=>$user,'Message' => $message, 'Type' => $type));
		$this->load->view('include/footer.inc.php');
	}
  function userDetails(){
        $id=$_GET['id'];
        $result=$this->usersModel->search_user($id);
        $this->load->view('include/header.inc.php');
        $this->load->view('userDetails',array('userDetails'=>$result));
        $this->load->view('include/footer.inc.php');
    }

 function addUser(){
	$this->load->view('include/header.inc.php');
	$this->load->view('AddUser');
	$this->load->view('include/footer.inc.php');
    }
  function AdminDetail(){
    $id=$_GET['id'];
    $data=$this->usersModel->getAdminDetail($id);
    $result=$this->usersModel->getUserDetail($id);
    $this->load->view('include/header.inc.php');
    $this->load->view('AdminDetail',  array('data'=>$data,'result'=>$result ));
    $this->load->view('include/footer.inc.php');
  }  
 function UpdateAdmin(){
    $id=$_GET['id'];
    $data=$this->usersModel->getAdminData($id);
    $result=$this->usersModel->getUsersData($id);
   $this->load->view('include/header.inc.php');
    $this->load->view('UpdateAdmin', array('data'=>$data,'result'=>$result));
    $this->load->view('include/footer.inc.php');
 }   
 function checkEditAdmin(){
          $error_name = $error_lname = $error_pos = $error_email = $error_privilege = $error_username = $error_pass = $error_c_pass = $error_photo = $error_gender= $error_phone = '';
        $error = false;
        if (isset($_POST['editAdmin'])) {
            // -------------- Form validation -----------------
            
            if (empty($_POST['name'])) {
                $error_name = 'لطفاً اسم خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['last_name'])) {
                $error_lname = 'لطفاً تخلص خود را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['position'])) {
                $error_pos = 'لطفاً مقام خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['email'])) {
                $error_email = 'لطفاً آدرس ایمل خود را درج نماید';
                $error = true;
            }
            if (empty($_POST['phone_no'])) {
                $error_phone = 'لطفاً شماره تیلفون خود را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['privilege'])) {
                $error_privilege = 'لطفاً محدودیت کاربر را انتخاب نماید';
                $error = true;
            }
            if (empty($_POST['gender'])) {
                $error_gender = 'لطفاً جنسیت کاربر را انتخاب نماید!';
                $error = true;
            }
            if (empty($_POST['username'])) {
                $error_username = 'لطفاً اسم کاربری خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['password'])) {
                $error_pass = 'لطفاً رمز عبور خود را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['confirm_password'])) {
                $error_c_pass = 'لطفاً رمز عبور خود را تائید نماید!';
                $error = true;
            } else {
                if ($_POST['password'] != $_POST['confirm_password']) {
                    $error_c_pass = 'رمز عبور شما یکسان نیستند!';
                    $error = true;
                }
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
        if (!$error) {
            $destination = "C:/xampp/htdocs/kandid/assets/img/users/";
            if (!empty($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK)
                move_uploaded_file($_FILES['photo']['tmp_name'], $destination . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5));
            $image = "../assets/img/users/" . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5);
            if(empty($_FILES["photo"]["name"])){
                $image = "";
            }
            $fields_data = array(
                'name' => $_POST['name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'phone'=>$_POST['phone_no'],
                'image' => $image,
                'create_at' => date('Y-m-d'),
                'update_at' => date('Y-m-d')
            );
            $admin_id=$_POST['id'];
             $result=$this->usersModel->UpdateAdmin($fields_data,$admin_id);
             foreach ($result as $key) {
                 $id=$key->id;
             }
             $data=array(
                'username'=> $_POST['username'],
                'password' => sha1($_POST['password']),
                'user_level'=> $_POST['privilege'],
                'person_type' => $_POST['position'],
                'person_id'=>$id,

             );
             $this->usersModel->UpdateUser($data);
             redirect('usersController/index');
        } else {
            $this->load->view('include/header.inc.php');
            $this->load->view('UpdateAdmin', array(
                'error_name' => $error_name,
                'error_lname' => $error_lname,
                'error_pos' => $error_pos,
                'error_email'=>$error_email,
                'error_privilege'=>$error_privilege,
                'error_gender'=>$error_gender,
                'error_phone'=>$error_phone,
                'error_username'=>$error_username,
                'error_pass' => $error_pass,
                'error_c_pass' => $error_c_pass,
                'error_photo' => $error_photo,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }
 }

          function checkAddUser(){
        $error_name = $error_lname = $error_pos = $error_email = $error_privilege = $error_username = $error_pass = $error_c_pass = $error_photo = $error_gender= $error_phone = '';
        $error = false;
        if (isset($_POST['addUser'])) {
            // -------------- Form validation -----------------
            if (empty($_POST['name'])) {
                $error_name = 'لطفاً اسم خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['last_name'])) {
                $error_lname = 'لطفاً تخلص خود را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['position'])) {
                $error_pos = 'لطفاً مقام خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['email'])) {
                $error_email = 'لطفاً آدرس ایمل خود را درج نماید';
                $error = true;
            }
            if (empty($_POST['phone_no'])) {
                $error_phone = 'لطفاً شماره تیلفون خود را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['privilege'])) {
                $error_privilege = 'لطفاً محدودیت کاربر را انتخاب نماید';
                $error = true;
            }
            if (empty($_POST['gender'])) {
                $error_gender = 'لطفاً جنسیت کاربر را انتخاب نماید!';
                $error = true;
            }
            if (empty($_POST['username'])) {
                $error_username = 'لطفاً اسم کاربری خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['password'])) {
                $error_pass = 'لطفاً رمز عبور خود را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['confirm_password'])) {
                $error_c_pass = 'لطفاً رمز عبور خود را تائید نماید!';
                $error = true;
            } else {
                if ($_POST['password'] != $_POST['confirm_password']) {
                    $error_c_pass = 'رمز عبور شما یکسان نیستند!';
                    $error = true;
                }
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
        if (!$error) {
            $destination = "C:/xampp/htdocs/kandid/assets/img/users/";
            if (!empty($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK)
                move_uploaded_file($_FILES['photo']['tmp_name'], $destination . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5));
            $image = "../assets/img/users/" . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5);
            if(empty($_FILES["photo"]["name"])){
                $image = "";
            }
            $fields_data = array(
                'name' => $_POST['name'],
                'last_name' => $_POST['last_name'],
                'email' => $_POST['email'],
                'phone'=>$_POST['phone_no'],
                'image' => $image,
                'create_at' => date('Y-m-d'),
                'update_at' => date('Y-m-d')
            );
             $id=$this->usersModel->insertUser($fields_data);
             $data=array(
                'username'=> $_POST['username'],
                'password' => sha1($_POST['password']),
                'user_level'=> $_POST['privilege'],
                'person_type' => $_POST['position'],
                'person_id'=>$id,

             );
             $this->usersModel->insertUsers($data);
             redirect('usersController/index');
        } else {
            $this->load->view('include/header.inc.php');
            $this->load->view('addUser', array(
                'error_name' => $error_name,
                'error_lname' => $error_lname,
                'error_pos' => $error_pos,
                'error_email'=>$error_email,
                'error_privilege'=>$error_privilege,
                'error_gender'=>$error_gender,
                'error_phone'=>$error_phone,
                'error_username'=>$error_username,
                'error_pass' => $error_pass,
                'error_c_pass' => $error_c_pass,
                'error_photo' => $error_photo,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }
    }

    function insertUser($data){
        $result = $this->usersModel->insertUser($data);
        if ($result) {
            UsersController::index("کاربر مورد نظر شما موفقانه اضافه گردید!", 'success');
        } else {
            UsersController::index("کاربر مورد نظر شما متاسفانه اضافه نگردید. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }

    function updateUser(){
        $userId = $_GET['id'];
        $result = $this->usersModel->search_user($userId);
        $this->load->view('include/header.inc.php');
        $this->load->view('editUser',array('user'=>$result));
        $this->load->view('include/footer.inc.php');
    }

    function checkEditUser(){
        $error_name = $error_lname = $error_pos = $error_email = $error_privilege = $error_username = $error_pass = $error_c_pass = $error_photo = $error_gender= $error_phone = $error_old_pass ='';
        $error = false;
        if (isset($_POST['editUser'])) {
            // -------------- Form validation -----------------
            if (empty($_POST['name'])) {
                $error_name = 'لطفاً اسم خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['last_name'])) {
                $error_lname = 'لطفاً تخلص خود را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['position'])) {
                $error_pos = 'لطفاً مقام خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['email'])) {
                $error_email = 'لطفاً آدرس ایمل خود را درج نماید';
                $error = true;
            }
            if (empty($_POST['phone_no'])) {
                $error_phone = 'لطفاً شماره تیلفون خود را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['privilege'])) {
                $error_privilege = 'لطفاً محدودیت کاربر را انتخاب نماید';
                $error = true;
            }
            if (empty($_POST['gender'])) {
                $error_gender = 'لطفاً جنسیت کاربر را انتخاب نماید!';
                $error = true;
            }
            if (empty($_POST['username'])) {
                $error_username = 'لطفاً اسم کاربری خود را درج نماید!';
                $error = true;
            }

            $result = $this->usersModel->search_user($_POST['user_id']);
            if (empty($_POST['old_password'])) {
                $error_pass = 'لطفاً رمز عبور قبلی خود را وارد نماید';
                $error = true;
            }else{
                foreach($result as $row){
                    if(sha1($_POST['old_password']) != $row->password){
                        $error_old_pass = 'رمز عبور شما اشتباه است!';
                        $error = true;
                    }
                }
            }
            if (empty($_POST['password'])) {
                $error_pass = 'لطفاً رمز عبور خود را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['confirm_password'])) {
                $error_c_pass = 'لطفاً رمز عبور خود را تائید نماید!';
                $error = true;
            } else {
                if ($_POST['password'] != $_POST['confirm_password']) {
                    $error_c_pass = 'رمز عبور شما یکسان نیستند!';
                    $error = true;
                }
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
                        $error_photo = "شما هیج عکس انتخاب نکرده اید";
                        //$error = true;
                        break;
                    default:
                        $error_photo = "Please contact to server manager !";
                        $error = true;
                }
            }
            // ---------------------------------------------------------
        }
        if (!$error) {
            $fields_data = array(
                'name' => $_POST['name'],
                'last_name' => $_POST['last_name'],
                'position' => $_POST['position'],
                'email' => $_POST['email'],
                'gender' => $_POST['gender'],
                'phone'=>$_POST['phone_no'],
                'privilege'=> $_POST['privilege'],
                'username'=> $_POST['username'],
                'password' => sha1($_POST['password']),
                'create_at' => date('Y-m-d'),
                'update_at' => date('Y-m-d'),
                'image' => null
            );
            $userId = $_POST['user_id'];
            if (isset($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK) {
                $destination = "C:/xampp/htdocs/kandid/assets/img/users/";
                if (!empty($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK)
                    move_uploaded_file($_FILES['photo']['tmp_name'], $destination .($_FILES['photo']['name']) .date('his'). "." . substr($_FILES['photo']['type'], 6, 5));
                $image = "../assets/img/users/" .($_FILES['photo']['name']) .date('his'). "." . substr($_FILES['photo']['type'], 6, 5);
                $fields_data['image'] = $image;
                $photo_url =(isset($_POST['photo_path']))? $_POST['photo_path'] : null;
                if($photo_url !=null)
                    unlink($photo_url);
            }else{
                array_pop($fields_data);
            }
            UsersController::editUser($fields_data,$userId);
        } else {
            $result = $this->usersModel->search_user($_POST['user_id']);
            $this->load->view('include/header.inc.php');
            $this->load->view('editUser', array('user'=>$result,
                'error_name' => $error_name,
                'error_lname' => $error_lname,
                'error_pos' => $error_pos,
                'error_email'=>$error_email,
                'error_privilege'=>$error_privilege,
                'error_gender'=>$error_gender,
                'error_phone'=>$error_phone,
                'error_username'=>$error_username,
                'error_old_pass'=>$error_old_pass,
                'error_pass' => $error_pass,
                'error_c_pass' => $error_c_pass,
                'error_photo' => $error_photo,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }
    }

    function editUser($data,$userId){
        $result = $this->usersModel->update_user($data,$userId);
        if ($result) {
            UsersController::index("کاربر مورد نظر شما موفقانه ویرایش شد!", 'success');
        } else {
            UsersController::index("کابر مورد نظر شما متاسفانه ویرایش نشد!", 'failed');
        }
    }

    public function delete_user(){
        $id=$_GET['id'];
        $id = $this->usersModel->DeleteUser($id);
        $result = $this->usersModel->delete_user($id);
        if($result){
            UsersController::index("کاربر مورد نظر شما موفقانه حذف شد!", 'success');
        }else{
            UsersController::index("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }
       function delete_people(){
        $id=$_GET['id'];
         $this->usersModel->DeletePeople($id);
        $result = $this->usersModel->deleteUserData($id);
        if($result){
            UsersController::peopl("کاربر مورد نظر شما موفقانه حذف شد!", 'success');
        }else{
            UsersController::peopl("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }
        function deleteKandid(){
        $id=$_GET['id'];
        $result = $this->usersModel->deleteUserData($id);
        if($result){
            UsersController::kandid("کاربر مورد نظر شما موفقانه حذف شد!", 'success');
        }else{
            UsersController::kandid("کاربر مورد نظر شما متاسفانه حذف نشد. لطفاً دوباره کوشش نماید!", 'failed');
        }
    }
    function kandid($message = null, $type = null){
        $user=$this->usersModel->kandid();
        foreach ($user as $row) 
        $data=$this->usersModel->getUsers($row->kan_id);
        $this->load->view('include/header.inc.php');
        $this->load->view('kandid',array('user'=>$user,'Message'=>$message, 'Type'=>$type,'data'=>$data));
        $this->load->view('include/footer.inc.php');
    
       
    }
    function EditKandid(){
        $id=$_GET['id'];
            $data=$this->usersModel->EditKan($id);
            $result=$this->usersModel->editUs($id);
           $this->load->view('include/header.inc.php');
            $this->load->view('updatePeople', array('data'=>$data));
            $this->load->view('include/footer.inc.php');
    }
    function Peopl($message = null, $type = null){
         $user=$this->usersModel->people();
        $this->load->view('include/header.inc.php');
        $this->load->view('peopleView',array('user'=>$user, 'Message'=>$message, 'Type'=>$type));
        $this->load->view('include/footer.inc.php');
    }
    // public function index($message = null, $type = null)
    // {   
    //     $user=$this->usersModel->getuser();
    //     $this->load->view('include/header.inc.php');
    //     $this->load->view('Users',array("user"=>$user,'Message' => $message, 'Type' => $type));
    //     $this->load->view('include/footer.inc.php');
    // }
    function insertPeople(){
       $this->load->view('include/header.inc.php');
        $this->load->view('insertPeople');
        $this->load->view('include/footer.inc.php'); 
    }
    function AddPeople(){
         $error_name = $error_lname = $error_pos = $error_email = $error_privilege = $error_username = $error_pass = $error_c_pass = $error_photo = $error_gender= $error_phone = '';
        $error = false;
        if (isset($_POST['addUser'])) {
            // -------------- Form validation -----------------
            if (empty($_POST['name'])) {
                $error_name = 'لطفاً اسم خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['last_name'])) {
                $error_lname = 'لطفاً تخلص خود را وارد نماید!';
                $error = true;
            }
            
            if (empty($_POST['email'])) {
                $error_email = 'لطفاً آدرس ایمل خود را درج نماید';
                $error = true;
            }
           
            if (empty($_POST['gender'])) {
                $error_gender = 'لطفاً جنسیت کاربر را انتخاب نماید!';
                $error = true;
            }
            
            if (empty($_POST['password'])) {
                $error_pass = 'لطفاً رمز عبور خود را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['confirm_password'])) {
                $error_c_pass = 'لطفاً رمز عبور خود را تائید نماید!';
                $error = true;
            } else {
                if ($_POST['password'] != $_POST['confirm_password']) {
                    $error_c_pass = 'رمز عبور شما یکسان نیستند!';
                    $error = true;
                }
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
        if (!$error) {
            $destination = "C:/xampp/htdocs/kandid/assets/img/users/";
            if (!empty($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK)
                move_uploaded_file($_FILES['photo']['tmp_name'], $destination . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5));
            $image = "../assets/img/users/" . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5);
            if(empty($_FILES["photo"]["name"])){
                $image = "";
            }
            $fields_data = array(
                'po_name' => $_POST['name'],
                'po_last_name' => $_POST['last_name'],
                'po_email' => $_POST['email'],
                'po_photo' => $image,
                'gender'=>$_POST['gender'],
                'password'=>sha1($_POST['password']),
                'create_at' => date('Y-m-d'), 
            );
             $id=$this->usersModel->insertPeople($fields_data);
             redirect('usersController/Peopl');
        } else {
            $this->load->view('include/header.inc.php');
            $this->load->view('insertPeople', array(
                'error_name' => $error_name,
                'error_lname' => $error_lname,
                'error_pos' => $error_pos,
                'error_email'=>$error_email,
                'error_privilege'=>$error_privilege,
                'error_gender'=>$error_gender,
                'error_phone'=>$error_phone,
                'error_username'=>$error_username,
                'error_pass' => $error_pass,
                'error_c_pass' => $error_c_pass,
                'error_photo' => $error_photo,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }

    }
       function updatePeople(){
            $id=$_GET['id'];
            $data=$this->usersModel->getPeopleData($id);
            $result=$this->usersModel->getUsersData($id);
           $this->load->view('include/header.inc.php');
            $this->load->view('updatePeople', array('data'=>$data,'result'=>$result));
            $this->load->view('include/footer.inc.php');
       } 
       function checkEditPeople(){
          $error_name = $error_lname = $error_pos = $error_email = $error_privilege = $error_username = $error_pass = $error_c_pass = $error_photo = $error_gender= $error_phone = '';
        $error = false;
        if (isset($_POST['editAdmin'])) {
            // -------------- Form validation -----------------
            
            if (empty($_POST['name'])) {
                $error_name = 'لطفاً اسم خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['last_name'])) {
                $error_lname = 'لطفاً تخلص خود را وارد نماید!';
                $error = true;
            }
          
            if (empty($_POST['email'])) {
                $error_email = 'لطفاً آدرس ایمل خود را درج نماید';
                $error = true;
            }
            if (empty($_POST['gender'])) {
                $error_gender = 'لطفاً جنسیت کاربر را انتخاب نماید!';
                $error = true;
            }
            if (empty($_POST['password'])) {
                $error_pass = 'لطفاً رمز عبور خود را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['confirm_password'])) {
                $error_c_pass = 'لطفاً رمز عبور خود را تائید نماید!';
                $error = true;
            } else {
                if ($_POST['password'] != $_POST['confirm_password']) {
                    $error_c_pass = 'رمز عبور شما یکسان نیستند!';
                    $error = true;
                }
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
        if (!$error) {
            $destination = "C:/xampp/htdocs/kandid/assets/img/users/";
            if (!empty($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK)
                move_uploaded_file($_FILES['photo']['tmp_name'], $destination . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5));
            $image = "../assets/img/users/" . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5);
            if(empty($_FILES["photo"]["name"])){
                $image = "";
            }
            $fields_data = array(
                'po_name' => $_POST['name'],
                'po_last_name' => $_POST['last_name'],
                'po_email' => $_POST['email'],
                'password' => sha1($_POST['password']),
                'gender'=>$_POST['gender'],
                'po_photo' => $image,
                'update_at' => date('Y-m-d'),
            );
            $po_id=$_POST['id'];
             $this->usersModel->UpdatePeople($fields_data,$po_id);
             
             redirect('usersController/Peopl');
        } else {
            $this->load->view('include/header.inc.php');
            $this->load->view('updataPeople', array(
                'error_name' => $error_name,
                'error_lname' => $error_lname,
                'error_pos' => $error_pos,
                'error_email'=>$error_email,
                'error_privilege'=>$error_privilege,
                'error_gender'=>$error_gender,
                'error_phone'=>$error_phone,
                'error_username'=>$error_username,
                'error_pass' => $error_pass,
                'error_c_pass' => $error_c_pass,
                'error_photo' => $error_photo,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }
 }
 function PeopleDetails(){
    $id=$_GET['id'];
    $data=$this->usersModel->getPeopleData($id);
    $result=$this->usersModel->getUserDetail($id);
    $this->load->view('include/header.inc.php');
    $this->load->view('PeopleDetails',  array('data'=>$data,'result'=>$result ));
    $this->load->view('include/footer.inc.php');

 }
 function AddKandidView(){
    $id=$_GET['id'];
    $data=$this->usersModel->getKandid($id);
    $this->load->view('include/header.inc.php');
    $this->load->view('AddKandidView',array('data'=>$data));
    $this->load->view('include/footer.inc.php');
 }
 function AddKandid(){
        $error_logon=$error_kan_typ=$error_type_of_kan=$error_page_num=$error_election_num= $error_name = $error_lname = $error_pos = $error_email = $error_privilege = $error_username = $error_pass = $error_c_pass = $error_photo = $error_gender= $error_phone=$error_province=$error_logo_photo = '';
        $error = false;
        if (isset($_POST['addUser'])) {
            // -------------- Form validation -----------------
            $id=$_POST['id'];
            if (empty($_POST['position'])) {
                $error_pos = 'لطفاً مقام خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['privilege'])) {
                $error_privilege = 'لطفاً محدودیت کاربر را انتخاب نماید';
                $error = true;
            }
            if (empty($_POST['username'])) {
                $error_username = 'لطفاً اسم کاربری خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['password'])) {
                $error_pass = 'لطفاً رمز عبور خود را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['confirm_password'])) {
                $error_c_pass = 'لطفاً رمز عبور خود را تائید نماید!';
                $error = true;
            } else {
                if ($_POST['password'] != $_POST['confirm_password']) {
                    $error_c_pass = 'رمز عبور شما یکسان نیستند!';
                    $error = true;
                }
            }
        }
        if (!$error) {
             $data=array(
                'username'=> $_POST['username'],
                'password' => sha1($_POST['password']),
                'user_level'=> $_POST['privilege'],
                'person_type' => $_POST['position'],
                'person_id'=>$_POST['id'],

             );
             $this->usersModel->insertUsers($data);
             redirect('usersController/kandid');
        } else {
             $data=$this->usersModel->getKandid($id);
            $this->load->view('include/header.inc.php');
            $this->load->view('AddKandidView', array(
                'data'=>$data,
                'error_pos' => $error_pos,
                'error_privilege'=>$error_privilege,
                'error_username'=>$error_username,
                'error_pass' => $error_pass,
                'error_c_pass' => $error_c_pass,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }

    }
    function KandidDetail(){
    $id=$_GET['id'];
    $data=$this->usersModel->getKandidDetail($id);
    $result=$this->usersModel->getUserDetail($id);
    $this->load->view('include/header.inc.php');
    $this->load->view('KandidDetail',array('data'=>$data,'result'=>$result));
    $this->load->view('include/footer.inc.php');
    }
    function EditKan(){
        $id=$_GET['id'];
        $data=$this->usersModel->getKandidDetail($id);
        $result=$this->usersModel->getUserDetail($id);
        $this->load->view('include/header.inc.php');
        $this->load->view('EditKanView',array('data'=>$data,'result'=>$result));
        $this->load->view('include/footer.inc.php');
    }
    function checkEditKan(){
         $error_name = $error_lname = $error_pos = $error_email = $error_privilege = $error_username = $error_pass = $error_c_pass = $error_photo = $error_gender= $error_phone = '';
        $error = false;
        if (isset($_POST['addUser'])) {
            // -------------- Form validation -----------------
            if (empty($_POST['name'])) {
                $error_name = 'لطفاً اسم خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['last_name'])) {
                $error_lname = 'لطفاً تخلص خود را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['position'])) {
                $error_pos = 'لطفاً مقام خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['email'])) {
                $error_email = 'لطفاً آدرس ایمل خود را درج نماید';
                $error = true;
            }
            if (empty($_POST['phone_no'])) {
                $error_phone = 'لطفاً شماره تیلفون خود را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['privilege'])) {
                $error_privilege = 'لطفاً محدودیت کاربر را انتخاب نماید';
                $error = true;
            }
            if (empty($_POST['gender'])) {
                $error_gender = 'لطفاً جنسیت کاربر را انتخاب نماید!';
                $error = true;
            }
            if (empty($_POST['username'])) {
                $error_username = 'لطفاً اسم کاربری خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['password'])) {
                $error_pass = 'لطفاً رمز عبور خود را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['confirm_password'])) {
                $error_c_pass = 'لطفاً رمز عبور خود را تائید نماید!';
                $error = true;
            } else {
                if ($_POST['password'] != $_POST['confirm_password']) {
                    $error_c_pass = 'رمز عبور شما یکسان نیستند!';
                    $error = true;
                }
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
        if (!$error) {
            $destination = "C:/xampp/htdocs/kandid/assets/img/users/";
            if (!empty($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK)
                move_uploaded_file($_FILES['photo']['tmp_name'], $destination . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5));
            $image = "../assets/img/users/" . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5);
            if(empty($_FILES["photo"]["name"])){
                $image = "";
            }
            $fields_data = array(
                'kan_number' => $_POST['kan_election_num'],
                'kan_page_number' => $_POST['page_num'],
                'kan_name' => $_POST['name'],
                'kan_last_name' => $_POST['last_name'],
                'kan_email' => $_POST['email'],
                'kan_phone'=>$_POST['phone_no'],
                'kan_province'=>$_POST['province'],
                'kan_profile_photo' => $image,
                'gender'=>$_POST['gender'],
                'create_at' => date('Y-m-d'),
                'update_at' => date('Y-m-d')
            );
             $id=$this->usersModel->insertKan($fields_data);
             $data=array(
                'username'=> $_POST['username'],
                'password' => sha1($_POST['password']),
                'user_level'=> $_POST['privilege'],
                'person_type' => $_POST['position'],
                'person_id'=>$id,

             );
             $this->usersModel->insertUsers($data);
             redirect('usersController/kandid');
        } else {
            $this->load->view('include/header.inc.php');
            $this->load->view('insertPeople', array(
                'error_name' => $error_name,
                'error_lname' => $error_lname,
                'error_pos' => $error_pos,
                'error_email'=>$error_email,
                'error_privilege'=>$error_privilege,
                'error_gender'=>$error_gender,
                'error_phone'=>$error_phone,
                'error_username'=>$error_username,
                'error_pass' => $error_pass,
                'error_c_pass' => $error_c_pass,
                'error_photo' => $error_photo,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }

    }
    function kanPro(){
        $id=$_SESSION['person_id'];
        $data=$this->usersModel->kanPro($id);
        $this->load->view('include/header.inc.php');
        $this->load->view('kanPro', array('data'=>$data));
        $this->load->view('include/footer.inc.php');
    }
     function kandidAcount(){
        $id=$_SESSION['person_id'];
        $user=$this->usersModel->kandidAcount($id);
        $this->load->view('include/header.inc.php');
        $this->load->view('kandidAcount',array('user'=>$user));
        $this->load->view('include/footer.inc.php');
    }
    function editKandidAcount(){
        $error_logon=$error_kan_typ=$error_type_of_kan=$error_page_num=$error_election_num= $error_name = $error_lname = $error_pos = $error_email = $error_privilege = $error_username = $error_pass = $error_c_pass = $error_photo = $error_gender= $error_phone=$error_province=$error_logo_photo = '';
        $error = false;
        if (isset($_POST['addUser'])) {
            $id=$_POST['id'];
            // -------------- Form validation -----------------
            if (empty($_POST['position'])) {
                $error_pos = 'لطفاً مقام خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['privilege'])) {
                $error_privilege = 'لطفاً محدودیت کاربر را انتخاب نماید';
                $error = true;
            }
            if (empty($_POST['username'])) {
                $error_username = 'لطفاً اسم کاربری خود را درج نماید!';
                $error = true;
            }
            if (empty($_POST['password'])) {
                $error_pass = 'لطفاً رمز عبور خود را وارد نماید!';
                $error = true;
            }
            if (empty($_POST['confirm_password'])) {
                $error_c_pass = 'لطفاً رمز عبور خود را تائید نماید!';
                $error = true;
            } else {
                if ($_POST['password'] != $_POST['confirm_password']) {
                    $error_c_pass = 'رمز عبور شما یکسان نیستند!';
                    $error = true;
                }
            }
        }
        if (!$error) {
             $data=array(
                'username'=> $_POST['username'],
                'password' => sha1($_POST['password']),
                'user_level'=> $_POST['privilege'],
                'person_type' => $_POST['position'],
                'person_id'=>$id,

             );
             $this->usersModel->updateUsers($data,$id);
             redirect('usersController/kandid');
        } else {
            $data=$this->usersModel->getKandid($id);
            $this->load->view('include/header.inc.php');
            $this->load->view('AddKandidView', array(
                'data'=>$data,
                'error_pos' => $error_pos,
                'error_privilege'=>$error_privilege,
                'error_username'=>$error_username,
                'error_pass' => $error_pass,
                'error_c_pass' => $error_c_pass,
                'Field_data' => $_POST
            ));
            $this->load->view('include/footer.inc.php');
        }

    }
      
}

?>