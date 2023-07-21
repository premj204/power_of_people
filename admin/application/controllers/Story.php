<?php 
 if (! defined('BASEPATH')) exit('No direct script access allowed');
 error_reporting(E_ERROR | E_PARSE);
 class story extends CI_Controller{

 	function index(){
 		$data['nav']='story';
		$data['main_content']='story/story';
		$this->load->view('includes/templates',$data);
 	}
     function new_story(){
 		$data['nav']='story';
		$data['main_content']='story/new_story';
		$this->load->view('includes/templates',$data);
 	}
     function edit_story(){
        $id = $this->input->get_post('id');
        $data['story'] = array();
        if(isset($id) && !empty($id)){
             $data['story'] = $this->model->getData('story',array('id'=> $id));
            //  print_r($data['blog']); exit;
        }
       $data['nav']='story';
       $data['main_content']='story/edit_story';
       $this->load->view('includes/templates',$data);

    }
    function update_story(){
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

           
            $this->model->insert_into('story',$storyData);
            // if(isset($_FILES) && $_FILES['uploadFile']['name']!="" && $_FILES['uploadFile']['size']>0){
            //     $file = $_FILES["uploadFile"]["name"];
            //     $tmp_name = $_FILES["uploadFile"]["tmp_name"];
            //     $uploadData = $this->uploadFiles($rowId, $file, $tmp_name, "uploadFile");
            // } 
            

           $data['status'] = 200;
           $data[ 'msg'] = 'New story Added successfully.';
           }else{
               $data['status'] = 400;
               $data['msg'] = 'Invalid data. please check with story data.';
           }
        echo json_encode($data);
    }











    function fetch_story_list(){

        $requestData= $_REQUEST;
        $date = date('Y-m-d');
        $baseurl = base_url();
        $columnarray = array(`id`, `title`, `description`, `uploadFile`, `type`, `category`, `tags`, `status`, `addes_on`);

        foreach($columnarray as $key=>$value){
            if($requestData['order'][0]['column']==$key){
                $column = $value;
            }
        }
        $sql="SELECT `id`, `title`, `description`, `uploadFile`, `type`, `category`, `tags`, `status`, `addes_on` FROM `story`";

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
            $deleteRestoreBtn = '<a class="btn btn-action btn-danger" title="Block Story" href="javascript:void(0);" onclick="return deletestory('.$value["id"].',0,this);"><i class="bx bx-block me-1" ></i></a>';
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



















}?>