<?php 
 if (! defined('BASEPATH')) exit('No direct script access allowed');
 error_reporting(E_ERROR | E_PARSE);
 class Interview extends CI_Controller{
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
        $data['title'] = "";
 		$data['nav']='interview';
		$data['main_content']='interview/interview';
		$this->load->view('includes/templates',$data);
 	}
     function new_interview(){
 		$data['nav']='interview';
		$data['main_content']='interview/new_interview';
		$this->load->view('includes/templates',$data);
 	}  

     function add_interview(){
        $video_link = $this->input->get_post('video_link'); 
        $details = $this->input->get_post('details'); 
        $description = $this->input->get_post('description'); 
        $category = $this->input->get_post('category');    
       
        if($video_link!= "" && $details!="" ){
           $interviewData = array(
               'video_link' => $video_link,
               'details' => $details,
               'description' => $description,  
               'category' => $category,
                         
           );

            $this->model->insert_into('interview',$interviewData);
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
        $sql="SELECT `id`, `video_link`, `details`, `description`, `uploadThumbnail`, `status`, `upload_date` FROM `interview`";

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
            $nestedData[] = ($value['status']=='1') ? '<span class="badge text-success me-1">ACTIVE</span>' : '<span class="badge text-danger me-1">IN-ACTIVE</span>';
            $deleteRestoreBtn = '<a class="btn btn-action btn-danger" title="Block Society" href="javascript:void(0);" onclick="return deleteinterview('.$value["id"].',0,this);"><i class="bx bx-trash me-1" ></i></a>';
            if($value['status']=='0'){
                $deleteRestoreBtn =  '<a class="btn btn-action btn-danger" title="Unblock Society" href="javascript:void(0);" onclick="return deleteinterview('.$value["id"].',1,this);"><i class="bx bxs-right-arrow me-1" ></i></a>';
            } 
           
            $nestedData[] = '<a class="btn btn-action btn-orange" title="Edit Interview" href="'.base_url('interview/edit_interview?id='.$value["id"]).'"><i class="bx bx-edit-alt me-1" ></i></a>
            <a class="btn btn-action btn-primary" title="View Interview" href="'.base_url('interview/view_interview?id='.$value["id"]).'"><i class="bx bx bx-show-alt me-1" ></i></a>
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
    function edit_interview(){
        $id = $this->input->get_post('id');
        $data['interview'] = array();
        if(isset($id) && !empty($id)){
             $data['interview'] = $this->model->getData('interview',array('id'=> $id));
                 }
       $data['nav']='interview';
       $data['main_content']='interview/edit_interview';
       $this->load->view('includes/templates',$data);
    }
    function view_interview(){
        $id = $this->input->get_post('id');
        $data['interview'] = array();
        if(isset($id) && !empty($id)){
             $data['interview'] = $this->model->getData('interview',array('id'=> $id));
        }
       $data['nav']='interview';
       $data['main_content']='interview/view_interview';
       $this->load->view('includes/templates',$data);
    }
        function update_inter(){
        $id = $this->input->get_post('id'); 
        $video_link = $this->input->get_post('video_link'); 
        $details = $this->input->get_post('details'); 
        $description = $this->input->get_post('description'); 
        $category = $this->input->get_post('category'); 
        $uploadThumbnail = $this->input->get_post('uploadThumbnail'); 
           
        if($id!="" && $video_link!=""){
            $interviewData = array(
               'video_link' => $video_link,
               'details' => $details,
               'description' => $description,
               'category' => $category,
               'uploadThumbnail' => $uploadThumbnail,
               
            );
            $hasUpdated = $this->model->update_where('interview', $interviewData,'id', $id);

            $data['status'] = 200;
            $data[ 'msg'] = 'interview update successfully.';
        }else{
            $data['status'] = 400;
            $data['msg'] = 'Invalid data. Please check with interview Data.';
        }
        echo json_encode($data);
    }
    function delete_interview(){
        $id = $this->input->get_post('id');
        $status = $this->input->get_post('status');
        if(isset($id) && $id!=""){
            $interviewData = array('status'=>$status);
            $this->model->update_where('interview',$interviewData, 'id', $id );
            $data['status'] = 200;
            $data['msg'] = 'Service provider has been suspend successfully.';
        }else{
            $data['status'] = 400;
            $data['msg'] = 'Invalid interview ids.';
        }
        echo json_encode($data);
    }
}?>