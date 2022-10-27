<?php
class LogoutController extends CI_Controller{

	function index(){
		session_destroy();
        unset($_SESSION['login1']);
        unset($_SESSION['id1']);
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),null, time() - 3600);
        }
        redirect('loginController/index');
	}
}
?>