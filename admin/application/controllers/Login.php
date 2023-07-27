<?php 
   if (! defined('BASEPATH')) exit('No direct script access allowed');
  error_reporting(E_ERROR | E_PARSE);

  class Login extends CI_Controller{

	  	function __construct() {
	      parent::__construct();
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
				$data['msg']=$msg;
				$this->load->view('login',$data);
			}

			public function validate(){
				$email = $this->input->post('email');
			  $password = $this->input->post('password');	
  
			  if($email!= "" && $password!= ""){
				//    $password = md5($password);
  
				  $staff=$this->model->getData('staff',array('email'=>$email,'password'=>$password,'status'=>'1'));
					  if($staff){
							  $newdata = array(
								'id' => $staff[0]['id'],
						        'email' => $staff[0]['email'],
								'fname' => $staff[0]['fname'],
								'lname' => $staff[0]['lname'],
								'is_logged_in' => TRUE
					  );
							  $this->session->set_userdata($newdata);
							  $data['status'] = 200;
							  $data['msg'] = "You have logged in successfully.<br> Please wait .....";
						  }else{	
							  $data['status'] = 400;
							  $data['msg'] = "The email address or password you entered is incorrect.";
						  }
				  }else{
					  $data['status'] = 400;
					  $data['msg'] = "The email address or password you entered is incorrect.";
				  }
				  echo json_encode($data);
			  }		

  }

?>