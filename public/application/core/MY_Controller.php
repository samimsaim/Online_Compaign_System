<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	function __construct()
	{
		parent::__construct();

         $username;

        $slogin=$this->input->cookie('userblog');
        if(!empty($slogin)){
        	$this->load->library('encrypt'); 
        	$login_text=$this->encrypt->decode($slogin);
        	$login_info=explode('_',$login_text);
        	$this->username=$login_info[0];
        	$is_login=$login_info[1];
        	if($is_login!='islogin'){
        		redirect('login/index');
        	}
        }else{

		$login=$this->session->userdata('login');

		if(!empty($login))
		{
			if($login!=true)
			{
				redirect('login/index');
			}
		}else{
		       redirect('login/index');
		}
		$this->username=$this->session->userdata('username');
        }
	}
}

