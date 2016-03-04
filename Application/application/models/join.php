<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Join extends CI_Model {

	function duatable($tfk,$ffk,$tpk,$fpk){
		$this->db->select('*');
		$this->db->from($tfk);
		$this->db->join($tpk,"$tfk.$ffk=$tpk.$fpk", 'left');
		$sql = $this->db->get();
		if($sql->num_rows()>0){
        	foreach ($sql -> result_array()as $row) {
        		$data[]=$row;
        	}
        	return $data;
        }else{
        	return null;
        }
	}

	function tigatable($tfk,$ffk,$ffk1,$tpk,$fpk,$tpk1,$fpk1){
		$this->db->select('*');
		$this->db->from($tfk);
		$this->db->join($tpk,"$tfk.$ffk=$tpk.$fpk", 'left');
		$this->db->join($tpk1,"$tfk.$ffk1=$tpk1.$fpk1", 'left');
		$sql = $this->db->get();
		if($sql->num_rows()>0){
        	foreach ($sql -> result_array()as $row) {
        		$data[]=$row;
        	}
        	return $data;
        }else{
        	return null;
        }
	}

	function tigatablewhere($tfk,$ffk,$ffk1,$tpk,$fpk,$tpk1,$fpk1,$filed,$value){
		$this->db->select('*');
		$this->db->from($tfk);
		$this->db->join($tpk,"$tfk.$ffk=$tpk.$fpk", 'left');
		$this->db->join($tpk1,"$tfk.$ffk1=$tpk1.$fpk1", 'left');
		$this->db->where($filed,$value);
		$sql = $this->db->get();
		if($sql->num_rows()>0){
        	foreach ($sql -> result_array()as $row) {
        		$data[]=$row;
        	}
        	return $data;
        }else{
        	return null;
        }
	}	

	function tigatablewherelim($tfk,$ffk,$ffk1,$tpk,$fpk,$tpk1,$fpk1,$filed,$value,$lim=NULL,$off=NULL){
		$this->db->select('*');
		$this->db->from($tfk);
		$this->db->join($tpk,"$tfk.$ffk=$tpk.$fpk", 'left');
		$this->db->join($tpk1,"$tfk.$ffk1=$tpk1.$fpk1", 'left');
		$this->db->where($filed,$value);
		if ($lim != NULL) {
			$this->db->limit($lim, $off);
		}
		
		// $this->db->limit($lim, $off);
		$sql = $this->db->get();
		return $sql;
		if($sql->num_rows()>0){
        	foreach ($sql -> result_array()as $row) {
        		$data[]=$row;
        	}
        	return $data;
        }else{
        	return null;
        }
	}

	function duatablewhere($tfk,$ffk,$tpk,$fpk,$filed,$value){
		$this->db->select('*');
		$this->db->from($tfk);
		$this->db->join($tpk,"$tfk.$ffk=$tpk.$fpk", 'left');
		$this->db->where($filed,$value);
		$sql = $this->db->get();
		if($sql->num_rows()>0){
        	foreach ($sql -> result_array()as $row) {
        		$data[]=$row;
        	}
        	return $data;
        }else{
        	return null;
        }
	}

	function empattablewhere($tfk,$ffk,$ffk1,$tpk,$fpk,$tpk1,$fpk1,$filed,$value){
		$this->db->select('*');
		$this->db->from($tfk);
		$this->db->join($tpk,"$tfk.$ffk=$tpk.$fpk", 'left');
		// $this->db->join($tpk2,"$tfk2.$ffk1=$tpk1.$fpk1",'left');
		$this->db->join($tpk1,"$tfk.$ffk1=$tpk1.$fpk1", 'left');
		$this->db->where($filed,$value);
		$sql = $this->db->get();
		if($sql->num_rows()>0){
        	foreach ($sql -> result_array()as $row) {
        		$data[]=$row;
        	}
        	return $data;
        }else{
        	return null;
        }
	}	

	/*Private Function*/
	function pgpararel($tfk,$ffk,$ffk1,$tpk,$fpk,$tpk1,$fpk1,$filed,$value,$filed1,$value1/*,$limit,$offset*/){
		$this->db->select('*');
		$this->db->from($tfk);
		$this->db->join($tpk,"$tfk.$ffk=$tpk.$fpk", 'left');
		$this->db->join($tpk1,"$tfk.$ffk1=$tpk1.$fpk1", 'left');
		$this->db->where($filed,$value);
		$this->db->where($filed1,$value1);
		// $this->db->limit($limit, $offset);
		$sql = $this->db->get();
		return $sql;/*
		if($sql->num_rows()>0){
        	foreach ($sql -> result_array()as $row) {
        		$data[]=$row;
        	}
        	return $data;
        }else{
        	return null;
        }*/
	}

}

/* End of file join.php */
/* Location: ./application/models/join.php */