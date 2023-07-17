<?php 
 if (! defined('BASEPATH')) exit('No direct script access allowed');
 error_reporting(E_ERROR | E_PARSE);
 class Interview extends CI_Controller{
 	// public function __construct(){
    //     parent::__construct();
    //     $this->no_cache();
	// 	if(!$this->is_logged_in()){
	//         redirect('login');
	//     } 
	//     date_default_timezone_set("Asia/Kolkata");
	// }
    // protected function no_cache(){
    // 	header("cache-Control: no-store, no-cache, must-revalidate");
	// 	header("cache-Control: post-check=0, pre-check=0", false);
	// 	header("Pragma: no-cache");
	// 	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
    // }

        // function is_logged_in(){
        //     $is_logged_in = $this->session->userdata('is_logged_in');
        //     if(!isset($is_logged_in) || $is_logged_in != TRUE){
        //         return FALSE;
        //     }
        //     return TRUE;
        // }

        // function logout(){    	
        //     $this->session->set_userdata(array('is_logged_in' => FALSE));
        //     $this->session->sess_destroy();
        //     redirect(base_url('login'));
        // }

 	function index(){
 		$data['nav']='Interviews';
		$data['main_content']='interview/interview';
		$this->load->view('includes/templates',$data);
 	}
     function new_interview(){
 		$data['nav']='interview';
		$data['main_content']='interview/new_interview';
		$this->load->view('includes/templates',$data);
 	}

     

     function new_interviews(){
        $video_link = $this->input->get_post('video_link'); 
        $details = $this->input->get_post('details'); 
        $description = $this->input->get_post('description'); 
        $uploadThumbnail = $this->input->get_post('uploadThumbnail'); 
       
       

        if($video_link!= "" && $details!="" ){
           $interviewsData = array(
               'video_link' => $video_link,
               'details' => $details,
               'description' => $description,
               'uploadThumbnail' => $uploadThumbnail,                 
           );

            $this->model->insert_into(' interviews',$interviewsData);
            

           $data['status'] = 200;
           $data[ 'msg'] = 'New interview Added successfully.';
           }else{
               $data['status'] = 400;
               $data['msg'] = 'Invalid data. Please check with Plan Data.';
           }
        echo json_encode($data);
    }







    function fetch_interviews_list(){

        $requestData= $_REQUEST;
        $date = date('Y-m-d');
        $baseurl = base_url();
        $columnarray = array(`id`, `video_link`, `details`, `description`, `uploadThumbnail`, `status`, `upload_date`);

        foreach($columnarray as $key=>$value){
            if($requestData['order'][0]['column']==$key){
                $column = $value;
            }
        }
        $sql="SELECT `id`, `video_link`, `details`, `description`, `uploadThumbnail`, `status`, `upload_date` FROM `interviews`";

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
            $nestedData[] = $value['details'];
            $nestedData[] = $value['upload_date'];
            $nestedData[] = $value['status'];
           
            $nestedData[] = '<a class="btn btn-action btn-orange" title="Edit Staff" href="'.base_url('staff/edit_staff?id='.base64_encode($value["id"])).'"><i class="bx bx-edit-alt me-1" ></i></a>
            <a class="btn btn-action btn-primary" title="View Data" href="'.base_url('staff/view_staff?id='.base64_encode($value["id"])).'"><i class="bx bx bx-show-alt me-1" ></i></a>
                               ';
            
            
     
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






















}?>