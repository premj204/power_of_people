<?php 
 if (! defined('BASEPATH')) exit('No direct script access allowed');
 error_reporting(E_ERROR | E_PARSE);
 class Blog extends CI_Controller{
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
        $data['nav']='blog';
       $data['main_content']='blog/edit_blog';
       $this->load->view('includes/templates',$data);
    }

    //  public function uploadFiles($rowId, $filename, $tmp_name, $position){
    //     $data['status'] = 400;
    //     $file1 = explode(".",$filename);
        
    //     $ext = $file1[1];
    //     $newfilename = "";
    //     $allowed = array("jpg","jpeg","png","pdf");
    //     if(in_array($ext, $allowed)){
    //         $uploadPath = "/assets/img/store_image/".$rowId;
    //         $savePath = "/assets/img/store_image/".$rowId;
    //         if($position == "photo"){
    //             $newfilename = date('Ymd')."_photo_".round(microtime(true)). '.' . end($file1);
    //             $uploadPath = $uploadPath."/photo/";
    //             $savePath = $savePath."/photo/".$newfilename;
    //             if(!file_exists($uploadPath)){
    //                 mkdir($uploadPath,0777,true);
    //             }
    //             $path = $uploadPath.$newfilename;
    //             $docData['photo'] = $newfilename;
    //         }
    //         if(move_uploaded_file($tmp_name, $path)){
    //             //echo $rowId; print_r($docData);
    //             $last_Id = $this->model->update_where('blog',  $docData , 'id', $rowId);
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
        // $uploadFile = $this->input->get_post('uploadFile'); 
       

        if($headline != "" && $description!="" ){
           $blogData = array(
               'headline' => $headline,
               'description' => $description,   
            //    'uploadFile' => $uploadFile,   
           );

            $this->model->insert_into('blog',$blogData);
            

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
        $date = date('Y-m-d');
        $baseurl = base_url();
        $columnarray = array(`id`, `headline`, `description`, `uploadFile`,`status`,`added_on`);

        foreach($columnarray as $key=>$value){
            if($requestData['order'][0]['column']==$key){
                $column = $value;
            }
        }
        $sql="SELECT `id`, `headline`, `description`, `uploadFile`, `status` ,`added_on` FROM `blog`";

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
            $nestedData[] = $value['status'];
            $nestedData[] = '<a class="btn btn-action btn-orange" title="Edit Blog" href="'.base_url('blog/edit_blog?id='.base64_encode($value["id"])).'"><i class="bx bx-edit-alt me-1" ></i></a>
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