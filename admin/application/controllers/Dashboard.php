<?php 
 if (! defined('BASEPATH')) exit('No direct script access allowed');
 error_reporting(E_ERROR | E_PARSE);
 class Dashboard extends CI_Controller{
 	public function __construct(){
        parent::__construct();
        $this->no_cache();
		if(!$this->is_logged_in()){
	        redirect('login');
	    } 
	    date_default_timezone_set("Asia/Kolkata");
	}
    protected function no_cache(){
    	header("cache-Control: no-store, no-cache, must-revalidate");
		header("cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
    }

        function is_logged_in(){
            $is_logged_in = $this->session->userdata('is_logged_in');
            if(!isset($is_logged_in) || $is_logged_in != TRUE){
                return FALSE;
            }
            return TRUE;
        }

        function logout(){    	
            $this->session->set_userdata(array('is_logged_in' => FALSE));
            $this->session->sess_destroy();
            redirect(base_url('login'));
        }






        
 	function index(){
        $data['story'] = $this->model->count_story();
        $data['blog'] = $this->model->count_blog();
        $data['interview'] = $this->model->count_interview();
 		$data['nav']='dashboard';
		$data['main_content']='dashboard/dashboard';
		$this->load->view('includes/templates',$data);
 	}

     
//    function new_profile(){
//      $data['title']='Profile';
//       $data['nav']='profile';
//       $data['main_content']='profile/profile';
//       $this->load->view('includes/templates',$data);
//    }
   
//    function user(){
//       $data['title']='New user';
//       $data['nav']='users';
//       $data['main_content']='users/users';
//       $this->load->view('includes/templates',$data);
//    }

    function role(){
      $data['title']='permission';
      $data['nav']='role';
      $data['main_content']='role/role';
      $this->load->view('includes/templates',$data);
    }

}?>