
<?php
class KandidController extends MY_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('KandidModel');
	}

 	function index(){
        // $jDate = new jDateTime(true,true,"asia/kabul");
        $this->load->view('include/header.inc.php');
        $this->load->view("AddKandid");
        $this->load->view('include/footer.inc.php');
 	}
   function CheckKandid(){
       $error_name=$error_last_name=$error_phone=$error_email=$error_election_num=$error_page_num=$error_gender=$error_logo_photo =$error_photo =$error_kandid_of_typ=$error_kandid_typ=$error_logon ='';
           $error = false;
              if (isset($_POST['AddKan'])) {
            if (empty($_POST['election_num'])) {
                $error_election_num = 'لطفاً شماره انتخاباتی خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['page_num'])) {
                $error_page_num = 'لطفاً نمبر صفحه خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['name'])) {
                $error_name = 'لطفاً اسم خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['lastname'])) {
                $error_last_name = 'لطفاً تخلص خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['kandidoftyp'])) {
                $error_kandid_of_typ = 'لطفاً نوعیت کاندید را وارد نماید';
                $error = true;
            }
            if (empty($_POST['kandidtyp'])) {
                $error_kandid_typ = 'لطفاً نوعیت کاندید را وارد نماید';
                $error = true;
            }
            if (empty($_POST['email'])) {
                $error_email = 'لطفاً ایمیل خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['phone'])) {
                $error_phone = 'لطفاً شماره تماس خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['logon'])) {
                $error_logon = 'لطفاً شعار خود را وارد نماید';
                $error = true;
            }
             if (empty($_POST['gender'])) {
                $error_gender = 'لطفاً جنست خود را وارد نماید';
                $error = true;
            }
            // ------------------------ Image validation ---------------
            
        }
        
    
        if(!$error){
             $destination ="C:/xampp/htdocs/kandid/assets/img/kandid/";
            if (!empty($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK)
                move_uploaded_file($_FILES['photo']['tmp_name'], $destination . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5));
            $image =  "../assets/img/kandid/" . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5);
             if (empty($_FILES["photo"]["name"])) {
                $image = "";
            }
            $destinations ="C:/xampp/htdocs/kandid/assets/img/kandid/cover/";
            if (!empty($_FILES["logo_photo"]) and $_FILES["logo_photo"]["error"] == UPLOAD_ERR_OK)
                move_uploaded_file($_FILES['logo_photo']['tmp_name'], $destinations . ($_FILES['logo_photo']['name']) . date('his') . "." . substr($_FILES['logo_photo']['type'], 6, 5));
            $logo_image = "../assets/img/kandid/cover/" . ($_FILES['logo_photo']['name']) . date('his') . "." . substr($_FILES['logo_photo']['type'], 6, 5);
            if (empty($_FILES["logo_photo"]["name"])) {
                $logo_image = "";
            }

            $failed_data=array(
               'kan_number'=>$_POST['election_num'],
             'kan_page_number'=>$_POST['page_num'],
             'kan_name'=>$_POST['name'],
             'kan_last_name'=>$_POST['lastname'],
             'kan_profile_photo'=>$image,
             'kan_cover'=>$logo_image,
             'kan_typeOfkan'=>$_POST['kandidoftyp'],
             'kan_type'=>$_POST['kandidtyp'],
             'kan_province'=>$_POST['province'],
             'kan_email'=>$_POST['email'],
             'kan_phone'=>$_POST['phone'],
             'kan_slogon'=>$_POST['logon'],
             'gender'=>$_POST['gender'],
             'create_at' => date('Y-m-d'),
            
            );
          $this->KandidModel->insertKan($failed_data);
          redirect('mainPageController/index');
         
           }else{
            $this->load->view('include/header.inc.php');
            $this->load->view('AddKandid', array(
                'error_name' => $error_name,
                'error_last_name' => $error_last_name,
                'error_election_num' => $error_election_num,
                'error_email'=>$error_email,
                'error_page_num'=>$error_page_num,
                'error_gender'=>$error_gender,
                'error_phone'=>$error_phone,
                'error_logo_photo'=>$error_logo_photo,
                'error_kandid_typ' => $error_kandid_typ,
                'error_kandid_of_typ' => $error_kandid_of_typ,
                'error_photo' => $error_photo,
                'error_logon'=>$error_logon
            ));
            $this->load->view('include/footer.inc.php');
        }
}

    function EditKanData(){
        if($_SESSION['user_level']==1 || $_SESSION['person_id']==$_GET['id']){
        $id=$_GET['id'];
        $result=$this->KandidModel->GetKanData($id);
        $this->load->view('include/header.inc.php');
        $this->load->view('EditKan',array('result'=>$result));
        $this->load->view('include/footer.inc.php');
    }else
    redirect('usersController/kanPro');
    }
        function CheckEditKandid(){
       $error_name=$error_last_name=$error_phone=$error_email=$error_election_num=$error_page_num=$error_gender=$error_logo_photo =$error_photo =$error_kandid_of_typ=$error_kandid_typ=$error_logon ='';
           $error = false;
              if (isset($_POST['editKan'])) {
            $id=$_POST['kan_id'];
            if (empty($_POST['election_num'])) {
                $error_election_num = 'لطفاً شماره انتخاباتی خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['page_num'])) {
                $error_page_num = 'لطفاً نمبر صفحه خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['name'])) {
                $error_name = 'لطفاً اسم خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['lastname'])) {
                $error_last_name = 'لطفاً تخلص خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['kandidoftyp'])) {
                $error_kandid_of_typ = 'لطفاً نوعیت کاندید را وارد نماید';
                $error = true;
            }
            if (empty($_POST['kandidtyp'])) {
                $error_kandid_typ = 'لطفاً نوعیت کاندید را وارد نماید';
                $error = true;
            }
            if (empty($_POST['email'])) {
                $error_email = 'لطفاً ایمیل خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['phone'])) {
                $error_phone = 'لطفاً شماره تماس خود را وارد نماید';
                $error = true;
            }
            if (empty($_POST['logon'])) {
                $error_logon = 'لطفاً شعار خود را وارد نماید';
                $error = true;
            }
             if (empty($_POST['gender'])) {
                $error_gender = 'لطفاً جنست خود را وارد نماید';
                $error = true;
            }  
        }
        
    
        if(!$error){
             $destination ="C:/xampp/htdocs/kandid/assets/img/kandid/";
            if (!empty($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK)
                move_uploaded_file($_FILES['photo']['tmp_name'], $destination . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5));
            $image =  "../assets/img/kandid/" . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5);
             if (empty($_FILES["photo"]["name"])) {
                $image = "";
            }
                        $destinations ="C:/xampp/htdocs/kandid/assets/img/kandid/cover/";
            if (!empty($_FILES["logo_photo"]) and $_FILES["logo_photo"]["error"] == UPLOAD_ERR_OK)
                move_uploaded_file($_FILES['logo_photo']['tmp_name'], $destinations . ($_FILES['logo_photo']['name']) . date('his') . "." . substr($_FILES['logo_photo']['type'], 6, 5));
            $logo_image = "../assets/img/kandid/cover/" . ($_FILES['logo_photo']['name']) . date('his') . "." . substr($_FILES['logo_photo']['type'], 6, 5);
            if (empty($_FILES["logo_photo"]["name"])) {
                $logo_image = "";
            }

            $failed_data=array(
               'kan_number'=>$_POST['election_num'],
             'kan_page_number'=>$_POST['page_num'],
             'kan_name'=>$_POST['name'],
             'kan_last_name'=>$_POST['lastname'],
             'kan_profile_photo'=>$image,
             'kan_cover'=>$logo_image,
             'kan_typeOfkan'=>$_POST['kandidoftyp'],
             'kan_type'=>$_POST['kandidtyp'],
             'kan_email'=>$_POST['email'],
             'kan_phone'=>$_POST['phone'],
             'kan_slogon'=>$_POST['logon'],
             'gender'=>$_POST['gender'],
             'create_at' => date('Y-m-d'),
            
            );
          $this->KandidModel->UpdateKan($failed_data,$id);
          redirect('mainPageController/index');
         
           }else{
            $result=$this->KandidModel->GetKanData($id);
            $this->load->view('include/header.inc.php');
            $this->load->view('EditKan', array(
                'result'=>$result,
                'error_name' => $error_name,
                'error_last_name' => $error_last_name,
                'error_election_num' => $error_election_num,
                'error_email'=>$error_email,
                'error_page_num'=>$error_page_num,
                'error_gender'=>$error_gender,
                'error_phone'=>$error_phone,
                'error_logo_photo'=>$error_logo_photo,
                'error_kandid_typ' => $error_kandid_typ,
                'error_kandid_of_typ' => $error_kandid_of_typ,
                'error_photo' => $error_photo,
                'error_logon'=>$error_logon
            ));
            $this->load->view('include/footer.inc.php');
        }
}

   
    function KanDetail(){
        if($_SESSION['user_level']==1 || $_SESSION['person_id']==$_GET['id']){
        $id=$_GET['id'];
        $data=$this->KandidModel->KanDetail($id);
        $this->load->view('include/header.inc.php');
        $this->load->view('KanDetail',array('data'=>$data));
        $this->load->view('include/footer.inc.php');
    }else
    redirect('usersController/kanPro');
    }
    function DeletKanData(){
        $id=$_GET['id'];
        $result=$this->KandidModel->DeletKanData($id);
        if($result){
        $data=$this->KandidModel->DeleteKanPosts($id);
        if($data){
            $deleteBio=$this->KandidModel->DeleteKanBio($id);
         if($deleteBio){
         redirect('mainPageController/index');
    }
}
     }   
    }
    function KandidBio(){
        if($_SESSION['user_level']==1 || $_SESSION['person_id']==$_GET['id']){
        $this->load->view('include/header.inc.php');
        $this->load->view('KandidBio');
        $this->load->view('include/footer.inc.php');
    }else
        redirect('usersController/kanPro');
    }
    function AddBio(){
        if(isset($_POST['AddBio'])){
           $kan_id= $_POST['id'];
                 $destination ="C:/xampp/htdocs/kandid/assets/img/biography/";
            if (!empty($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK)
                move_uploaded_file($_FILES['photo']['tmp_name'], $destination . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5));
            $image =  "../assets/img/biography/" . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5);
             if (empty($_FILES["photo"]["name"])) {
                $image = "";
            }
            $data=array(
                'boi_kandid'=>$_POST['biography'],
                'kan_id'=>$kan_id,
                'image'=>$image,
                'create_at' => date('Y-m-d'),
                'update_at' => date('Y-m-d'),
            );
            $this->KandidModel->addBio($data);
            redirect('mainPageController/index');
            
        }
    }
    function EditBio(){
        if($_SESSION['user_level']==1 || $_SESSION['person_id']==$_GET['id']){
        $id=$_GET['id'];
        $result=$this->KandidModel->UpdateBio($id);
        $this->load->view('include/header.inc.php');
        $this->load->view('EditBio', array('data'=>$result));
        $this->load->view('include/footer.inc.php');
    }else
    redirect('usersController/kanPro');
    }
    function updateBio(){
           if(isset($_POST['EditBio'])){
           $kan_id= $_POST['id'];
                 $destination ="C:/xampp/htdocs/kandid/assets/img/biography/";
            if (!empty($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK)
                move_uploaded_file($_FILES['photo']['tmp_name'], $destination . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5));
            $image = "../assets/img/biography/" . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5);
             if (empty($_FILES["photo"]["name"])) {
                $image = "";
            }
            $data=array(
                'boi_kandid'=>$_POST['biography'],
                'kan_id'=>$kan_id,
                'image'=>$image,
                'create_at' => date('Y-m-d'),
                'update_at' => date('Y-m-d'),
            );
            $result=$this->KandidModel->editBio($data, $kan_id);
            redirect('mainPageController/index');
           
        }
    }
    function Posts(){
        if($_SESSION['user_level']==1 || $_SESSION['person_id']==$_GET['id']){
        $id=$_GET['id'];
        $data=$this->KandidModel->Posts($id);
        $this->load->view('include/header.inc.php');
        $this->load->view('Posts', array('data'=>$data));
        $this->load->view('include/footer.inc.php');
    }else
    redirect('usersController/kanPro');
    }
    function AddPost(){
        $this->load->view('include/header.inc.php');
        $this->load->view('AddPost');
        $this->load->view('include/footer.inc.php');

    }
    function insertPost(){
           if(isset($_POST['insert'])){
            $kan_id= $_POST['id'];
            $image = $image1 = $image2 = $image3 =$video = '';
            $destination ="C:/xampp/htdocs/kandid/assets/img/post/";

            $data=array(
            'post_details'=>$_POST['comment'],
            'kan_id'=>$kan_id,
            'create_at' => date('Y-m-d'),
            );
            $id=$this->KandidModel->AddPost($data);
            if($id){
                if (!empty($_FILES["photo"]['tmp_name']) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK){
                    move_uploaded_file($_FILES['photo']['tmp_name'], $destination . date('his') . "0." . substr($_FILES['photo']['type'], 6, 5));
                    $image = "../assets/img/post/" . date('his') . "0." . substr($_FILES['photo']['type'], 6, 5);
                     $this->KandidModel->insertKanImage(array(
                            'image'=>$image,
                            'post_id'=>$id,
                            'kan_id'=>$kan_id,
                            "created_at"=>date("Y-m-d h:i:s")));
               }
               
                if (!empty($_FILES["photo1"]['tmp_name']) and $_FILES["photo1"]["error"] == UPLOAD_ERR_OK){
                    move_uploaded_file($_FILES['photo1']['tmp_name'], $destination . date('his') . "1." . substr($_FILES['photo1']['type'], 6, 5));
                    $image1 = "../assets/img/post/" . date('his') . "1." . substr($_FILES['photo1']['type'], 6, 5);
                     $this->KandidModel->insertKanImage(array(
                            'image'=>$image1,
                            'post_id'=>$id,
                            'kan_id'=>$kan_id,
                            "created_at"=>date("Y-m-d h:i:s")));
               }
                if (!empty($_FILES["photo2"]) and $_FILES["photo2"]["error"] == UPLOAD_ERR_OK){
                    move_uploaded_file($_FILES['photo2']['tmp_name'], $destination . date('his') . "2." . substr($_FILES['photo2']['type'], 6, 5));
                    $image2 = "../assets/img/post/" . date('his') . "2." . substr($_FILES['photo2']['type'], 6, 5);
                     $this->KandidModel->insertKanImage(array(
                            'image'=>$image2,
                            'post_id'=>$id,
                            'kan_id'=>$kan_id,
                            "created_at"=>date("Y-m-d h:i:s")));
                }

                if (!empty($_FILES["photo3"]) and $_FILES["photo3"]["error"] == UPLOAD_ERR_OK){
                    move_uploaded_file($_FILES['photo3']['tmp_name'], $destination . date('his') . "3." . substr($_FILES['photo3']['type'], 6, 5));
                    $image3 = "../assets/img/post/" . date('his') . "3." . substr($_FILES['photo3']['type'], 6, 5);
                     $this->KandidModel->insertKanImage(array(
                            'image'=>$image3,
                            'post_id'=>$id,
                            'kan_id'=>$kan_id,
                            "created_at"=>date("Y-m-d h:i:s")));
                }

                if (!empty($_FILES["video"]) and $_FILES["video"]["error"] == UPLOAD_ERR_OK){
                    move_uploaded_file($_FILES['video']['tmp_name'], $destination."videos/" . date('his') . "." . substr($_FILES['video']['type'], 6, 5));
                    $video = "../assets/img/post/videos/" . date('his') . "." . substr($_FILES['video']['type'], 6, 5);
                     $this->KandidModel->insertKanVideo(array(
                            'video'=>$video,
                            'post_id'=>$id,
                            'kan_id'=>$kan_id,
                            "created_at"=>date("Y-m-d h:i:s")));
                }
                redirect('mainPageController/index');
            }else{
                redirect('mainPageController/index');
            }
        }
    }
    function PostDetail(){
        $id=$_GET['id'];
        $data=$this->KandidModel->GetPost($id);
        $result=$this->KandidModel->comment($id);
        $image=$this->KandidModel->getImage($id);
        $this->load->view('include/header.inc.php');
        $this->load->view('PostDetail',array('data'=>$data,'result'=>$result,'image'=>$image));
        $this->load->view('include/footer.inc.php');
    }
    function DeletPost(){
        $id=$_GET['id'];
       $result= $this->KandidModel->DeletePost($id);
       if($result){
        $data=$this->KandidModel->deleteImage($id);
        if($data){
            $this->KandidModel->deleteVideo($id);
        }
       }
        redirect('mainPageController/index');
    }
    function EditPost(){
        $id=$_GET['id'];
        $data=$this->KandidModel->GetPostById($id);
        $this->load->view('include/header.inc.php');
        $this->load->view('EditPost',array('data'=>$data));
        $this->load->view('include/footer.inc.php');
    }
    function UpdatePost(){
          if(isset($_POST['update'])){
           $kan_id= $_POST['id'];
           $id=$_GET['id'];
                 $destination ="C:/xampp/htdocs/kandid/assets/img/post/";
            if (!empty($_FILES["photo"]) and $_FILES["photo"]["error"] == UPLOAD_ERR_OK)
                move_uploaded_file($_FILES['photo']['tmp_name'], $destination . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5));
            $image =  "../assets/img/post/" . ($_FILES['photo']['name']) . date('his') . "." . substr($_FILES['photo']['type'], 6, 5);
             if (empty($_FILES["photo"]["name"])) {
                $image = "";
            }
            $data=array(
                'post_details'=>$_POST['comment'],
                'kan_id'=>$kan_id,
                'update_at' => date('Y-m-d'),
            );
            $this->KandidModel->UpdatePost($data,$id);
            $failed_data=array(
                'image'=>$image,
                'post_id'=>$id,
                'kan_id'=>$kan_id,
            );
            $this->KandidModel->updateKanImage($failed_data,$id);
            redirect('mainPageController/index');
        }
    }
    function DeleteCommen(){
        $id=$_GET['id'];
        $this->KandidModel->deleteComment($id);
        redirect('mainPageController/index');
    }
} ?>
