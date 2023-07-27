<?php 
if (! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ERROR | E_PARSE);

	class Model extends CI_Model{
		private $_stateID;
		function is_record($tbl,$clm,$val){
		$query = $this->db->get_where($tbl, array($clm => $val));
		return ($query->num_rows == 1) ? TRUE : FALSE;	
	}
	
	function update_where($tbl,$uData,$wClm,$wVal){
		$this->db->where($wClm, $wVal);
		$this->db->update($tbl, $uData);
		if($this->db->affected_rows() == 1) {
		   return TRUE;
		}else{
		   return FALSE;
		}
	}

	function delete_data($tbl,$clm,$val){
		$this->db->delete($tbl, array($clm => $val)); 
		if($this->db->affected_rows() == 1) {
            return TRUE;
		}else{
		   return FALSE;
		}
	}

	function delete_multiple_condition($tbl,$whr){
		$this->db->delete($tbl, $whr); 
		if($this->db->affected_rows() >0) {
            return TRUE;
		}else{
		   return FALSE;
		}
	}

	function insert_into($tbl,$val){
		$this->db->insert($tbl,$val); 
		if($this->db->affected_rows() == 1) {
            return TRUE;
        }else{
            return FALSE;
        }
	}

	function insert_and_return($tbl,$val){
		$this->db->db_debug = false;
		$this->db->insert($tbl,$val); 
	 	$last_id = $this->db->insert_id();
	 	if(!$last_id){
	        $error = $this->db->error();
	        return $error;
	        //return array $error['code'] & $error['message']
	    }else{
	        return $last_id;
	    }
	}

	function getAllData($tbl){
		$query = $this->db->get($tbl);
		$result = $query->result_array();
        return $result;
	}

	function getAllData_order_by($tbl,$clm,$ord_by="desc"){
		$this->db->from($tbl);
		$this->db->order_by($clm, $ord_by);
		$query = $this->db->get();
		$result = $query->result_array();
        return $result;
	}
	
	function getData_order_by($tbl,$where_data,$clm='',$ord_by="ASC"){
		$result = $this->db->select("*")
			->from($tbl)
			->where($where_data)
			->order_by($clm, $ord_by)
			->get()
			->result_array();
		 return $result;
	}

	function getColumnData($clm, $tableName, $where_data){
		try{
			if (isset($tableName) && isset($where_data)) {
				$this->db->select($clm);
				$this->db->trans_start();
				$query = $this->db->get_where($tableName, $where_data);
				
				$this->db->trans_complete();
				if ($query->num_rows() > 0){
					$rows = $query->result_array();
					return $rows;
				}else{
					return false;
				} 
			}else{
				return false;
			}
		} catch (Exception $e){
			return false;
		}
	}

	function getData($tableName, $where_data){
		try{
			if (isset($tableName) && isset($where_data)) {
				
				$this->db->trans_start();
				$query = $this->db->get_where($tableName, $where_data);
				
				$this->db->trans_complete();
				if ($query->num_rows() > 0){
					$rows = $query->result_array();
					return $rows;
				}else{
					return false;
				} 
			}else{
				return false;
			}
		} catch (Exception $e){
			return false;
		}
	}
	
	function get_where_data($tbl,$clm,$val,$order_by=""){
		$sql="SELECT * FROM $tbl WHERE $clm='$val' $order_by";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	function get_and_where_data($tbl,$clm1,$clm2,$val1,$val2){
		$sql="SELECT * FROM $tbl WHERE $clm1='$val1' AND $clm2='$val2'";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	function get_multipleWhere($tbl,$whr,$order_by_clm="",$order_by="ASC"){
		$this->db->select('*');
	    $this->db->from($tbl);
	    $this->db->where($whr);
	    if(isset($order_by_clm) && $order_by_clm!=""){
	    	$this->db->order_by($order_by_clm, $order_by);
		}
	    $query = $this->db->get();
	    $result = $query->result_array();
		return $result;
	}

	function update_record($tbl,$clm,$val,$data){
		$this->db->where($clm, $val);
		$this->db->update($tbl,$data);

		if($this->db->affected_rows() == 1){
			return True;
		}else{
			return False;
		}
	}

	function update_record_whr_multiple($tbl,$whr,$data){
		$this->db->where($whr);
		$this->db->update($tbl,$data);

		if($this->db->affected_rows() == 1){
			return True;
		}else{
			return False;
		}
	}

	function getSum($tbl,$sumQry,$whrCondition)
	{
		$this->db->select($sumQry, FALSE);
		$this->db->where($whrCondition);
		$this->db->from($tbl);
		$query = $this->db->get();
	    $result = $query->result_array();
		return $result;
	}
	
	function count_record_where_arr($tbl,$whrCondition){
		$this->db->where($whrCondition);
		$this->db->from($tbl);
		$query = $this->db->get();
		$rowcount = $query->num_rows();
		return $rowcount;
	}	

	function count_record_where($tbl,$clm,$val){
		$query="SELECT * FROM $tbl where $clm='$val'";
		$q=$this->db->query($query);
		$rowcount = $q->num_rows();
		return $rowcount;
	}	

	
	function getTableColumn($tableName='')
	{
		$sql="SHOW COLUMNS FROM ".$tableName;
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;	
	}

	function doQuery($sql){
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}

	function countTotalRecord($tbl,$clm,$value)
	{
		$this->db->where($clm,$value);
		$this->db->from($tbl);
		return $this->db->count_all_results();
	}

	function deleteFrom($tbl,$whr)
	{
		$this->db->where($whr);
		$this->db->delete($tbl); 
		if($this->db->affected_rows() == 1){
			return True;
		}else{
			return False;
		}
	}

	function getStrData($str){
		$query = $this->db->query($str);
        if($query->num_rows() >=1){
            return $query->result_array();
        }else{
            return FALSE;
        }
	}
//change
	 function setStateID($stateID) {
        return $this->_stateID = $stateID;
    }
	//get state method
	function getStates() {
        $this->db->select(array('s.id as state_id', 's.country_id', 's.name as state_name'));
        $this->db->from('states as s');
        $query = $this->db->get();
        return $query->result_array();
    }

    // get city method
    function getCities() {
        $this->db->select(array('c.id as city_id', 'c.city as city_name', 'c.state_id'));
        $this->db->from('cities as c');
        $this->db->where('c.state_id', $this->_stateID);
        $query = $this->db->get();
        return $query->result_array();
    }

	
	function count_story(){
		return $this->db->select('COUNT(id) as total_story')
						->from('story')
						// ->where(array('status'=>'1'))
						->get()->row_array();
	}
	function count_blog(){
		return $this->db->select('COUNT(id) as total_blog')
						->from('blog')
						// ->where(array('status'=>'1'))
						->get()->row_array();
	}
	function count_interview(){
		return $this->db->select('COUNT(id) as total_interview')
						->from('interview')
						// ->where(array('status'=>'1'))
						->get()->row_array();
	}
// SELECT COUNT( id ) FROM daily_visitor WHERE status = '1';
	
}?>