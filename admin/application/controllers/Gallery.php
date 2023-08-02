<?php 
 if (! defined('BASEPATH')) exit('No direct script access allowed');
 error_reporting(E_ERROR | E_PARSE);
 class Gallery extends CI_Controller{
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
 		$data['nav']='gallery';
		$data['main_content']='gallery/gallery';
		$this->load->view('includes/templates',$data);
 	}
    
     function new_gallery($msg=""){
        $data['nav']='gallery';
        $data['msg']=$msg;
       $data['main_content']='gallery/new_gallery';
       $this->load->view('includes/templates',$data);
    }


    function fetch_gallery_list(){

        $requestData= $_REQUEST;
        $date = date('Y-m-d');
        $baseurl = base_url();
        $columnarray = array(`id`, `title`, `photo`, `status`, `added_on`);

        foreach($columnarray as $key=>$value){
            if($requestData['order'][0]['column']==$key){
                $column = $value;
            }
        }
        $sql="SELECT `id`, `title`, `photo`, `status`, `added_on` FROM `gallery`";

        if(!empty($requestData['search']['value'])){
            $sql.=" WHERE (name LIKE '%".$requestData['search']['value']."%')";      
        }
        $sql.='ORDER BY id DESC' ;
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
            $nestedData[] = date('d-m-Y',strtotime($value['added_on']));
            $nestedData[] = ($value['status']=='1') ? '<span class="badge text-success me-1">ACTIVE</span>' : '<span class="badge text-danger me-1">IN-ACTIVE</span>';
            $deleteRestoreBtn = '<a class="btn btn-action btn-danger" title="Block Blog" href="javascript:void(0);" onclick="return deleteblog('.$value["id"].',0,this);"><i class="bx bx-trash me-1" ></i></a>';
            if($value['status']=='0'){
                $deleteRestoreBtn =  '<a class="btn btn-action btn-danger" title="Unblock Blog" href="javascript:void(0);" onclick="return deleteblog('.$value["id"].',1,this);"><i class="bx bxs-right-arrow me-1" ></i></a>';
            } 
            
            $nestedData[] = '<a class="btn btn-action btn-primary" title="View Data" href="'.base_url('gallery/view_gallery?id='.$value["id"]).'"><i class="bx bx bx-show-alt me-1" ></i></a>
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



    function add_gallery(){
        $title = $this->input->get_post('title');  
        if($title != ""){
            $galleryData = array(
               'title' => $title,
            );

            $rowId = $this->model->insert_and_return('gallery',$galleryData);

            if($rowId > 0){
               $data['status'] = 200;
               $data[ 'msg'] = 'New gallery Added successfully.';

                $count = count($_FILES['files']['name']);

                for($i=0;$i<$count;$i++){
            
                    if(!empty($_FILES['files']['name'][$i])){
                
                        $_FILES['file']['name'] = $_FILES['files']['name'][$i];  
                        $_FILES['file']['type'] = $_FILES['files']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['files']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['files']['size'][$i];
              
                        $config['upload_path'] = 'gallery_docs/';

                        $config['allowed_types'] = 'jpg|jpeg|png|';
                        $config['files'] = $_FILES['files']['name'][$i];

                        $new_name = time().$_FILES["files"]['name'];
                        $config['files'] = $new_name;
                        
                        $this->load->library('upload',$config); 
                
                        if($this->upload->do_upload('file')){

                            $uploadData = $this->upload->data();
                            $savePath = $uploadData['file_name'];

                            $fileData = array(
                                'gallery_id' => $rowId,
                                'files' =>$savePath,
                                'added_on' => date('Y-m-d H:i:s')
                            ); 
                            $this->model->insert_into('gallery_child',$fileData);
                            $data['status'] = 200;
                            $data['msg'] = 'New gallery Added successfully.';
                        }
                    }
                }

            }
            

        }else{
            $data['status'] = 400;
            $data['msg'] = 'Invalid data. Please check with Plan Data.';
        }
        // echo json_encode($data);
           $this->new_gallery($data);
    }












    public function uploadFiles($rowId, $filename, $tmp_name, $position){
        $data['status'] = 400;
        $file1 = explode(".",$filename);
        $ext = $file1[1];
        $newfilename = "";
        $allowed = array("jpg","jpeg","png","webp");
        $count = count($_FILES['documents']['name']);
         for($i=0;$i<$count;$i++){
            if(!empty($_FILES['documents']['name'][$i])){
                $_FILES['files']['name'] = $_FILES['documents']['name'][$i];  
              $_FILES['files']['type'] = $_FILES['documents']['type'][$i];
              $_FILES['files']['tmp_name'] = $_FILES['documents']['tmp_name'][$i];
               $_FILES['files']['error'] = $_FILES['documents']['error'][$i];
                  $_FILES['files']['size'] = $_FILES['documents']['size'][$i];
                  
               $config['upload_path'] = './gallery_docs/';
               $config['allowed_types'] = 'jpg|jpeg|png|webp|';
               $config['attach_documents'] = $_FILES['documents']['name'][$i];
           
               $this->load->library('upload',$config);
               if($this->upload->do_upload('files')){
                 $uploadData = $this->upload->data();
                    $savePath = $uploadData['files'];
          
                 $fileData = array(
                        'id' => $rowId,
                    'documents' =>$savePath,
                        'added_on' => date('Y-m-d H:i:s')
                 );
                 $this->model->insert_into('gallery',$fileData);
                 $data['status'] = 200;
                 $data['msg'] = 'gallery added successfully.';
                }
            }
        }
         return $data;
    }











}?>