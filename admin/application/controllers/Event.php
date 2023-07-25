<?php 
 if (! defined('BASEPATH')) exit('No direct script access allowed');
 error_reporting(E_ERROR | E_PARSE);
 class Event extends CI_Controller{
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
 		$data['nav']='event';
		$data['main_content']='event/event';
		$this->load->view('includes/templates',$data);
 	}
    
     function new_event(){
        $data['nav']='event';
       $data['main_content']='event/new_event';
       $this->load->view('includes/templates',$data);
    }
    function edit_event(){
        $id = $this->input->get_post('id');
        $data['event'] = array();
        if(isset($id) && !empty($id)){
             $data['event'] = $this->model->getData('event',array('id'=> $id));
                    }
       $data['nav']='event';
       $data['main_content']='event/edit_event';
       $this->load->view('includes/templates',$data);

    }

    function add_event(){
        $title = $this->input->get_post('title'); 
        $address = $this->input->get_post('address'); 
        $state = $this->input->get_post('state'); 
        $city = $this->input->get_post('city');    
        $pincode = $this->input->get_post('pincode');    
        $description = $this->input->get_post('description');    
        $date = $this->input->get_post('date');    
        $time = $this->input->get_post('time');    
               if($title!= "" && $city!="" ){
           $eventData = array(
               'title' => $title,
               'address' => $address,
               'state' => $state,  
               'city' => $city,
               'pincode' => $pincode,
               'description' => $description,
               'date' => $date,
               'time' => $time,                         
           );
            $this->model->insert_into('event', $eventData);
                $data['status'] = 200;
                $data[ 'msg'] = 'New Event Added successfully.';
           }else{
               $data['status'] = 400;
               $data['msg'] = 'Invalid data. Please check with Event Data.';
           }
        echo json_encode($data);
    }


    function fetch_event_list(){
        $requestData= $_REQUEST;
        $date = date('Y-m-d');
        $baseurl = base_url();
        $columnarray = array(`id`, `title`, `address`, `state`, `city`, `pincode`, `description`, `date`, `time`, `status`, `added_on`);
        foreach($columnarray as $key=>$value){
            if($requestData['order'][0]['column']==$key){
                $column = $value;
            }
        }
        $sql="SELECT `id`, `title`, `address`, `state`, `city`, `pincode`, `description`, `date`, `time`, `status`, `added_on` FROM `event`";
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
            $nestedData[] = $value['city'];
            $nestedData[] = $value['date'];
            $nestedData[] = ($value['status']=='1') ? '<span class="badge text-success me-1">ACTIVE</span>' : '<span class="badge text-danger me-1">IN-ACTIVE</span>';
            $deleteRestoreBtn = '<a class="btn btn-action btn-danger" title="Block event" href="javascript:void(0);" onclick="return deleteevent('.$value["id"].',0,this);"><i class="bx bx-trash me-1" ></i></a>';
            if($value['status']=='0'){
                $deleteRestoreBtn =  '<a class="btn btn-action btn-danger" title="Unblock event" href="javascript:void(0);" onclick="return deleteevent('.$value["id"].',1,this);"><i class="bx bxs-right-arrow me-1" ></i></a>';
            } 
            
            $nestedData[] = '<a class="btn btn-action btn-orange" title="Edit event" href="'.base_url('event/edit_event?id='.$value["id"]).'"><i class="bx bx-edit-alt me-1" ></i></a>
            <a class="btn btn-action btn-primary" title="View Data" href="'.base_url('event/view_event?id='.$value["id"]).'"><i class="bx bx bx-show-alt me-1" ></i></a>
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

    function delete_event(){
        $id = $this->input->get_post('id');
        $status = $this->input->get_post('status');
        if(isset($id) && $id!=""){
            $eventData = array('status'=>$status);
            $this->model->update_where('event',$eventData, 'id', $id );
            $data['status'] = 200;
            $data['msg'] = 'event has been suspend successfully.';
        }else{
            $data['status'] = 400;
            $data['msg'] = 'Invalid event  ids.';
        }
        echo json_encode($data);
    }
    function update_event(){
        $title = $this->input->get_post('title'); 
        $address = $this->input->get_post('address'); 
        $state = $this->input->get_post('state'); 
        $city = $this->input->get_post('city'); 
        $pincode = $this->input->get_post('pincode'); 
        $description = $this->input->get_post('description'); 
        // $date = $this->input->get_post('date'); 
        // $time = $this->input->get_post('time'); 
     
       
        if($title!="" && $state!=""){
            $eventData = array(
               'title' => $title,
               'address' => $address,
               'state' => $state,
               'city' => $city,
               'pincode' => $pincode,
               'description' => $description,
            //    'date' => $date,
            //    'time' => $time,
               
            );
            $hasUpdated = $this->model->update_where('event',$eventData,'id',$id);

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










}?>