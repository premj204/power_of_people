<?php 
 if (! defined('BASEPATH')) exit('No direct script access allowed');
 error_reporting(E_ERROR | E_PARSE);
 class Story extends CI_Controller{
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
 		$data['nav']='story';
		$data['main_content']='story/story';
		$this->load->view('includes/templates',$data);
 	}
     function new_story($msg=""){
 		$data['nav']='story';
        $data['msg']=$msg;
		$data['main_content']='story/new_story';
		$this->load->view('includes/templates',$data);
 	}

    public function uploadFiles($rowId, $filename, $tmp_name, $position){
        $data['status'] = 400;
        $file1 = explode(".",$filename);
        $ext = $file1[1];
        $newfilename = "";
        $allowed = array("jpg","jpeg","png","pdf");
        if(in_array($ext, $allowed)){
            $uploadPath = "./story_docs/".$rowId;
            $savePath = "./story_docs/".$rowId;
                $newfilename = date('Ymd')."_photo_".round(microtime(true)). '.' . end($file1);
                $uploadPath = $uploadPath."/photo/";
                $savePath = $savePath."/photo/".$newfilename;
                if(!file_exists($uploadPath)){
                    mkdir($uploadPath,0777,true);
                }
                $path = $uploadPath.$newfilename;
                $docData['uploadFile'] = $newfilename;
            if(move_uploaded_file($tmp_name, $path)){
                //echo $rowId; print_r($docData);
                $last_Id = $this->model->update_where('story',  $docData , 'id', $rowId);
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


    function add_story(){
        $title = $this->input->get_post('title'); 
        $description = $this->input->get_post('description'); 
         $type = $this->input->get_post('type'); 
        $category = $this->input->get_post('category'); 
        // $tags = $this->input->get_post('tags'); 

        if($title != "" && $description!="" ){
           $storyData = array(
               'title' => $title,
               'description' => $description,   
                'type' => $type, 
               'category' => $category, 
            //    'tags' => $tags, 
           );
            $rowId = $this->model->insert_and_return('story',$storyData);
            if(isset($_FILES) && $_FILES['uploadFile']['name']!="" && $_FILES['uploadFile']['size']>0){
                $file = $_FILES["uploadFile"]["name"];
                $tmp_name = $_FILES["uploadFile"]["tmp_name"];
                $uploadData = $this->uploadFiles($rowId, $file, $tmp_name, "uploadFile");
            } 
            
           $data['status'] = 200;
           $data[ 'msg'] = 'New story Added successfully.';
           }else{
               $data['status'] = 400;
               $data['msg'] = 'Invalid data. please check with story data.';
           }
        // echo json_encode($data);
           $this->new_story($data);
    }

     function edit_story(){
        $id = $this->input->get_post('id');
        $data['story'] = array();
        if(isset($id) && !empty($id)){
             $data['story'] = $this->model->getData('story',array('id'=> $id));
        }
       $data['nav']='story';
       $data['main_content']='story/edit_story';
       $this->load->view('includes/templates',$data);

    }
    function update_story(){
        $id = $this->input->get_post('id'); 
        $title = $this->input->get_post('title'); 
        $description = $this->input->get_post('description'); 
         $type = $this->input->get_post('type'); 
        $category = $this->input->get_post('category');        

        if($id != "" && $title!="" ){
           $storyData = array(
               'title' => $title,
               'description' => $description,   
                'type' => $type, 
               'category' => $category, 
           );
            $hasUpdated = $this->model->update_where('story',$storyData,'id',$id);

            // if(isset($_FILES) && $_FILES['uploadFile']['name']!="" && $_FILES['uploadFile']['size']>0){
            //     $file = $_FILES["uploadFile"]["name"];
            //     $tmp_name = $_FILES["uploadFile"]["tmp_name"];
            //     $uploadData = $this->uploadFiles($rowId, $file, $tmp_name, "uploadFile");
            // } 

            $data['status'] = 200;
            $data[ 'msg'] = 'blog update successfully.';
        }else{
            $data['status'] = 400;
            $data['msg'] = 'Invalid data. Please check with blog Data.';
        }
        echo json_encode($data);
    }


    function view_story(){
        $id = $this->input->get_post('id');
        $data['story'] = array();
        if(isset($id) && !empty($id)){
             $data['story'] = $this->model->getData('story',array('id'=> $id));
            //  print_r($data['blog']); exit;
        }
       $data['nav']='story';
       $data['main_content']='story/view_story';
       $this->load->view('includes/templates',$data);

    }


    function fetch_story_list(){

        $requestData= $_REQUEST;
        $date = date('Y-m-d');
        $baseurl = base_url();
        $columnarray = array(`id`, `title`, `description`, `uploadFile`, `type`, `category`, `tags`, `status`, `added_on`);

        foreach($columnarray as $key=>$value){
            if($requestData['order'][0]['column']==$key){
                $column = $value;
            }
        }
        $sql="SELECT `id`, `title`, `description`, `uploadFile`, `type`, `category`, `tags`, `status`, `added_on` FROM `story`";

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
            $nestedData[] = $value['title'];
            $nestedData[] = $value['type'];
            $nestedData[] = date('d-m-Y',strtotime($value['added_on']));

            $nestedData[] = ($value['status']=='1') ? '<span class="badge text-success me-1">ACTIVE</span>' : '<span class="badge text-danger me-1">IN-ACTIVE</span>';
            $deleteRestoreBtn = '<a class="btn btn-action btn-danger" title="Block Story" href="javascript:void(0);" onclick="return deletestory('.$value["id"].',0,this);"><i class="bx bx-trash me-1" ></i></a>';
            if($value['status']=='0'){
                $deleteRestoreBtn =  '<a class="btn btn-action btn-danger" title="Unblock Story" href="javascript:void(0);" onclick="return deletestory('.$value["id"].',1,this);"><i class="bx bxs-right-arrow me-1" ></i></a>';
            } 
            
            $nestedData[] = '<a class="btn btn-action btn-orange" title="Edit Story" href="'.base_url('story/edit_story?id='.$value["id"]).'"><i class="bx bx-edit-alt me-1" ></i></a>
            <a class="btn btn-action btn-primary" title="View Data" href="'.base_url('story/view_story?id='.$value["id"]).'"><i class="bx bx bx-show-alt me-1" ></i></a>
                              
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
    function delete_story(){
        $id = $this->input->get_post('id');
        $status = $this->input->get_post('status');
        if(isset($id) && $id!=""){
            $storyData = array('status'=>$status);
            $this->model->update_where('story',$storyData, 'id', $id );
            $data['status'] = 200;
            $data['msg'] = 'Service provider has been suspend successfully.';
        }else{
            $data['status'] = 400;
            $data['msg'] = 'Invalid story ids.';
        }
        echo json_encode($data);
    }
}?>