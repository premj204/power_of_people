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
    
     function new_gallery(){
        $data['nav']='gallery';
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













}?>