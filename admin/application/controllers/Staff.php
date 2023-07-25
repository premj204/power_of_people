<?php 
 if (! defined('BASEPATH')) exit('No direct script access allowed');
 error_reporting(E_ERROR | E_PARSE);
 class staff extends CI_Controller{
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
 		$data['nav']='staff';
		$data['main_content']='staff/staff';
		$this->load->view('includes/templates',$data);
 	}
     function new_staff(){
 		$data['nav']='story';
		$data['main_content']='staff/new_staff';
		$this->load->view('includes/templates',$data);
 	}
    
    function profile(){
        $id = $this->input->get_post('id');
        $data['staff'] = array();
        if(isset($id) && !empty($id)){
             $data['staff'] = $this->model->getData('staff',array('id'=> $id));
        }
       $data['nav']='staff';
       $data['main_content']='staff/profile';
       $this->load->view('includes/templates',$data);

    }
     function add_staff(){
        $fname = $this->input->get_post('fname'); 
        $lname = $this->input->get_post('lname'); 
         $email = $this->input->get_post('email'); 
         $position = $this->input->get_post('position'); 
        // $mobile = $this->input->get_post('mobile'); 
        $password = $this->input->get_post('password'); 

        if($fname!= "" && $lname!="" ){
           $staffData = array(
               'fname' => $fname,
               'lname' => $lname,   
               'email' => $email, 
               'position' => $position, 
            //    'mobile' => $mobile, 
               'password' => $password, 
           );

           
            $this->model->insert_into('staff',$staffData);
            // if(isset($_FILES) && $_FILES['uploadFile']['name']!="" && $_FILES['uploadFile']['size']>0){
            //     $file = $_FILES["uploadFile"]["name"];
            //     $tmp_name = $_FILES["uploadFile"]["tmp_name"];
            //     $uploadData = $this->uploadFiles($rowId, $file, $tmp_name, "uploadFile");
            // } 
            

           $data['status'] = 200;
           $data[ 'msg'] = 'New staff Added successfully.';
           }else{
               $data['status'] = 400;
               $data['msg'] = 'Invalid data. please check with staff data.';
           }
        echo json_encode($data);
    }

 function fetch_staff_list(){

        $requestData= $_REQUEST;
        $date = date('d M, Y');
        $baseurl = base_url();
        $columnarray = array(`id`, `fname`, `lname`, `email`, `mobile`, `address`, `position`, `twitter`, `facebook`, `instagram`, `linkedin`, `password`, `added_on`);

        foreach($columnarray as $key=>$value){
            if($requestData['order'][0]['column']==$key){
                $column = $value;
            }
        }
        $sql="SELECT `id`, `fname`, `lname`, `email`, `mobile`, `address`, `position`, `gender`, `twitter`, `facebook`,`status`, `instagram`, `linkedin`, `password`, `added_on` FROM `staff`";

        if(!empty($requestData['search']['value'])){
            $sql.=" WHERE (name LIKE '%".$requestData['search']['value']."%')";      
        }
        $sql.=' ORDER BY id DESC ' ;
        $sqltotalCout=$sql;

        // $sql.=" LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
         $calldetails = $this->model->doQuery($sql);
        $totalData = $this->model->doQuery($sqltotalCout);
        $totalFiltered = count($totalData);
        
        $data = array();
        $i = $requestData['start']+1;

        foreach ($calldetails as $key => $value) {
            $nestedData = array();
            $nestedData[] = $i++;
            $nestedData[] = $value['fname']." ".$value['lname'];
            $nestedData[] = $value['position'];
            $nestedData[] = $value['gender'];
           
            $nestedData[] = ($value['status']=='1') ? '<span class="badge text-success me-1">ACTIVE</span>' : '<span class="badge text-danger me-1">IN-ACTIVE</span>';
            $deleteRestoreBtn = '<a class="btn btn-action btn-danger" title="Block Staff" href="javascript:void(0);" onclick="return deletestaff('.$value["id"].',0,this);"><i class="bx bx-trash me-1" ></i></a>';
            if($value['status']=='0'){
                $deleteRestoreBtn =  '<a class="btn btn-action btn-danger" title="Unblock Staff" href="javascript:void(0);" onclick="return deletestaff('.$value["id"].',1,this);"><i class="bx bxs-right-arrow me-1" ></i></a>';
            } 

            $nestedData[] = '<a class="btn btn-action btn-primary" title="View Data" href="'.base_url('staff/profile?id='.$value["id"]).'"><i class="bx bx bx-show-alt me-1" ></i></a>
                              
            '.$deleteRestoreBtn.'';
            $data[] = $nestedData;
        }

        $json_data = array(
            "draw"            => intval( $requestData['draw'] ),
            "recordsTotal"    => intval( $totalData ),
            "recordsFiltered" => intval( $totalFiltered ),
            "data"            => $data
        );
        echo json_encode($json_data);
    }

    // <a class="btn btn-action btn-orange" title="Edit Story" href="'.base_url('story/edit_story?id='.$value["id"]).'"><i class="bx bx-edit-alt me-1" ></i></a>

    function edit_profile(){
        $id = $this->input->get_post('id');
        $data['staff'] = array();
        if(isset($id) && !empty($id)){
             $data['staff'] = $this->model->getData('staff',array('id'=> $id));
        }
       $data['nav']='staff';
       $data['main_content']='staff/profile';
       $this->load->view('includes/templates',$data);

    }



    public function uploadFiles($rowId, $filename, $tmp_name, $position){
        $data['status'] = 400;
        $file1 = explode(".",$filename);
        
        $ext = $file1[1];
        $newfilename = "";
        $allowed = array("jpg","jpeg","png","pdf");
        if(in_array($ext, $allowed)){
            $uploadPath = "./imgstore/".$rowId;
            $savePath = "./imgstore/".$rowId;
            if($position == "photo"){
                $newfilename = date('Ymd')."_photo_".round(microtime(true)). '.' . end($file1);
                $uploadPath = $uploadPath."/photo/";
                $savePath = $savePath."/photo/".$newfilename;
                if(!file_exists($uploadPath)){
                    mkdir($uploadPath,0777,true);
                }
                $path = $uploadPath.$newfilename;
                $docData['photo'] = $newfilename;
            }
            if(move_uploaded_file($tmp_name, $path)){
                //echo $rowId; print_r($docData);
                $last_Id = $this->model->update_where('service_provider',  $docData , 'id', $rowId);
                if($last_Id){
                    $data['status'] = 200;
                    $data['msg'] = 'File has been uploaded successfully.';
                }else{
                    $data['status'] = 400;
                    $data['msg'] = 'Error while update. Please connect to administrator';
                }
            }else{
                $data['status'] = 400;
                $data['msg'] = 'Error while update.';
            }
        }
        return $data;
    }





    function update_profile(){
        $id = $this->input->get_post('id'); 
        $fname = $this->input->get_post('fname'); 
        $lname = $this->input->get_post('lname'); 
        $about = $this->input->get_post('about'); 
        $email = $this->input->get_post('email');  
        $mobile = $this->input->get_post('mobile'); 
        $address = $this->input->get_post('address'); 
        $twitter = $this->input->get_post('twitter'); 
        $facebook = $this->input->get_post('facebook');   //     // $tags = $this->input->get_post('tags'); 
        $instagram = $this->input->get_post('instagram');   //     // $tags = $this->input->get_post('tags'); 
        $linkedin = $this->input->get_post('linkedin');     //     // $tags = $this->input->get_post('tags'); 
       
        if($fname!= "" && $lname!="" ){
           $staffData = array(
               'fname' => $fname,
               'fname' => $fname,
               'lname' => $lname,   
               'about' => $about, 
               'email' => $email, 
               'mobile' => $mobile,
               'address' => $address,   
               'twitter' => $twitter, 
               'facebook' => $facebook,
               'instagram' => $instagram,
               'linkedin' => $linkedin,
           );
            $hasUpdated = $this->model->update_where('staff',$staffData,'id',$id);
//               if(isset($_FILES) && $_FILES['photo']['name']!="" && $_FILES['profile']['size']>0){
//                 $file = $_FILES["photo"]["name"];
//                 $tmp_name = $_FILES["photo"]["tmp_name"];
//                 $uploadData = $this->profile($rowId, $file, $tmp_name, "photo");
//             } 
            $data['status'] = 200;
            $data[ 'msg'] = 'staff update successfully.';
        }else{
            $data['status'] = 400;
            $data['msg'] = 'Invalid data. Please check with staff Data.';
        }
        echo json_encode($data);
    }

    function delete_staff(){
        $id = $this->input->get_post('id');
        $status = $this->input->get_post('status');
        if(isset($id) && $id!=""){
            $staffData = array('status'=>$status);
            $this->model->update_where('staff', $staffData, 'id', $id );
            $data['status'] = 200;
            $data['msg'] = 'Service provider has been suspend successfully.';
        }else{
            $data['status'] = 400;
            $data['msg'] = 'Invalid staff  ids.';
        }
        echo json_encode($data);
    }

    
}?>