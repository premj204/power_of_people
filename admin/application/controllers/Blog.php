<?php 
 if (! defined('BASEPATH')) exit('No direct script access allowed');
 error_reporting(E_ERROR | E_PARSE);
 class Blog extends CI_Controller{
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
        $data['nav']='blog';
		$data['main_content']='blog/blog';
		$this->load->view('includes/templates',$data);
 	}
     function new_blog(){
 		$data['nav']='blog';
		$data['main_content']='blog/new_blog';
		$this->load->view('includes/templates',$data);
 	}

     function edit_blog(){
        $id = $this->input->get_post('id');
        $data['blog'] = array();
        if(isset($id) && !empty($id)){
             $data['blog'] = $this->model->getData('blog',array('id'=> $id));
           }
       $data['nav']='blog';
       $data['main_content']='blog/edit_blog';
       $this->load->view('includes/templates',$data);

    }

    // public function uploadFiles($id, $filename, $tmp_name, $position){
    //     $data['status'] = 400;
    //     $file1 = explode(".",$filename);
        
    //     $ext = $file1[1];
    //     $newfilename = "";
    //     $allowed = array("jpg","jpeg","png");
    //     if(in_array($ext, $allowed)){
    //         $uploadPath = "/admin/assets/img/store_image/".$id;
    //         $savePath = "/admin/assets/img/store_image/".$id;
    //         if($position == "uploadFile"){
    //             $newfilename = date('Ymd')."_uploadFile_".round(microtime(true)). '.' . end($file1);
    //             $uploadPath = $uploadPath."/admin/assets/img/store_image/";
    //             $savePath = $savePath."/admin/assets/img/store_image/".$newfilename;
    //             if(!file_exists($uploadPath)){
    //                 mkdir($uploadPath,0777,true);
    //             }
    //             $path = $uploadPath.$newfilename;
    //             $docData['uploadFile'] = $newfilename;
    //         }
    //         if(move_uploaded_file($tmp_name, $path)){
    //             //echo $rowId; print_r($docData);
    //             $last_Id = $this->model->update_where('blog',  $blogData , 'id', $id);
    //             if($last_Id){
    //                 $data['status'] = 200;
    //                 $data['msg'] = 'File has been uploaded successfully.';
    //             }else{
    //                 $data['status'] = 400;
    //                 $data['msg'] = 'Error while update. Please connect to administrator';
    //             }
    //         }else{
    //             $data['status'] = 400;
    //             $data['msg'] = 'Error while update.';
    //         }
    //     }
    //     return $data;
    // }
    
    
     function add_blog(){
        $headline = $this->input->get_post('headline'); 
        $description = $this->input->get_post('description'); 
        $category = $this->input->get_post('category'); 
        $uploadFile = $this->input->get_post('uploadFile'); 
       

        if($headline != "" && $description!="" ){
           $blogData = array(
               'headline' => $headline,
               'description' => $description,   
               'category' => $category,   
               'uploadFile' => $uploadFile, 
           );

           
            $this->model->insert_into('blog',$blogData);
            // if(isset($_FILES) && $_FILES['uploadFile']['name']!="" && $_FILES['uploadFile']['size']>0){
            //     $file = $_FILES["uploadFile"]["name"];
            //     $tmp_name = $_FILES["uploadFile"]["tmp_name"];
            //     $uploadData = $this->uploadFiles($rowId, $file, $tmp_name, "uploadFile");
            // } 
            

           $data['status'] = 200;
           $data[ 'msg'] = 'New blog Added successfully.';
           }else{
               $data['status'] = 400;
               $data['msg'] = 'Invalid data. Please check with Plan Data.';
           }
        echo json_encode($data);
    }

    
    function fetch_blog_list(){

        $requestData= $_REQUEST;
        $date = date('d-m-Y');
        $baseurl = base_url();
        $columnarray = array(`id`, `headline`, `description`,`category`, `uploadFile`,`status`,`added_on`);

        foreach($columnarray as $key=>$value){
            if($requestData['order'][0]['column']==$key){
                $column = $value;
            }
        }
        $sql="SELECT `id`, `headline`, `description`, `category`, `uploadFile`,`status` ,`added_on` FROM `blog`";

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
            $nestedData[] = $value['headline'];
            $nestedData[] = date('d-m-Y',strtotime($value['added_on']));



            $nestedData[] = ($value['status']=='1') ? '<span class="badge text-success me-1">ACTIVE</span>' : '<span class="badge text-danger me-1">IN-ACTIVE</span>';
            $deleteRestoreBtn = '<a class="btn btn-action btn-danger" title="Block Blog" href="javascript:void(0);" onclick="return deleteblog('.$value["id"].',0,this);"><i class="bx bx-trash me-1" ></i></a>';
            if($value['status']=='0'){
                $deleteRestoreBtn =  '<a class="btn btn-action btn-danger" title="Unblock Blog" href="javascript:void(0);" onclick="return deleteblog('.$value["id"].',1,this);"><i class="bx bxs-right-arrow me-1" ></i></a>';
            } 
            
            $nestedData[] = '<a class="btn btn-action btn-orange" title="Edit Blog" href="'.base_url('blog/edit_blog?id='.$value["id"]).'"><i class="bx bx-edit-alt me-1" ></i></a>
            <a class="btn btn-action btn-primary" title="View Data" href="'.base_url('blog/view_blog?id='.$value["id"]).'"><i class="bx bx bx-show-alt me-1" ></i></a>
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

    
    function update_blog(){      
        $id = $this->input->get_post('id'); 
        $headline = $this->input->get_post('headline'); 
        $description = $this->input->get_post('description'); 
        $category = $this->input->get_post('category'); 
        $uploadFile = $this->input->get_post('uploadFile'); 
     
       
        if($id!="" && $category!=""){
            $blogData = array(
               'headline' => $headline,
               'description' => $description,
               'category' => $category,
               'uploadFile' => $uploadFile,
               
            );
            $hasUpdated = $this->model->update_where('blog',$blogData,'id',$id);

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

    function view_blog(){
        $id = $this->input->get_post('id');
        $data['blog'] = array();
        if(isset($id) && !empty($id)){
             $data['blog'] = $this->model->getData('blog',array('id'=> $id));
            //  print_r($data['blog']); exit;
        }
       $data['nav']='blog';
       $data['main_content']='blog/view_blog';
       $this->load->view('includes/templates',$data);

    }

    function delete_blog(){
        $id = $this->input->get_post('id');
        $status = $this->input->get_post('status');
        if(isset($id) && $id!=""){
            $blogData = array('status'=>$status);
            $this->model->update_where('blog',$blogData, 'id', $id );
            $data['status'] = 200;
            $data['msg'] = 'Service provider has been suspend successfully.';
        }else{
            $data['status'] = 400;
            $data['msg'] = 'Invalid society  ids.';
        }
        echo json_encode($data);
    }
}?>