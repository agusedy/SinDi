<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Select extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		// $this->load->model('Model File');
	}

	function max($table,$filed)
	{
		$this->db->select_max($filed);
		$sql=$this->db->get($table);
		return $sql->result_array();
	}	

	function not_in($table,$filed,$not)
	{
		$this->db->select('*');
		$this->db->where_not_in($filed,$not);
		$data = $this->db->get($table);

		if($data->num_rows() > 0){
		return $data->result_array();
		}else{
		return false;
		}
	}

	function from($table, $filed){
		$this->db->select($filed);
		// $this->db->where($filed,$not);
		$data = $this->db->get($table);

		if($data->num_rows() > 0){
		return $data/*->result_array()*/;
		}else{
		return false;
		}
	}

	function select_inverse($table,$table1,$filed){
		$data = $this->db->query("
			select * from $table where $filed not in(
			select $filed from $table1
			)
			");
		if($data->num_rows() > 0){
		return $data->result_array();
		}else{
		return false;
		}
	}

	function userpass($tfk,$ffk,$ffk1,$tpk,$fpk,$tpk1,$fpk1,$filed,$data,$filed1,$data1){
		// $data['test'] = join::tigatable('wali_kelas','nip','nisn','guru','nip','siswa','nisn');
		$this->db->select('*');
		$this->db->from($tfk);
		$this->db->where($filed,$data);
		$this->db->where($filed1,$data1);
		$this->db->join($tpk,"$tfk.$ffk=$tpk.$fpk", 'left');
		$this->db->join($tpk1,"$tfk.$ffk1=$tpk1.$fpk1", 'left');
		$sql = $this->db->get();
		return $sql/*->result_array()*/;
		
	}

	function where($table,$filed,$value/*,$filed2='',$value2='',$filed3='',$value3='',$filed4='',$value4=''*/){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($filed,$value);/*
		$this->db->where($filed2,$value2);
		$this->db->where($filed3,$value3);
		$this->db->where($filed4,$value4);*/
		$sql = $this->db->get();
		return $sql->result_array();
	}

	function valid($tabel,$filed,$value)
	{

		$this->db->select($filed);
	    $this->db->where($filed, $value);
	    $this->db->from($tabel);
	    $query = $this->db->get();
	    if( $query->num_rows() > 0 ){
	        return false;
	    }else{
	        return true;
	    }

	}

	function siswa($table,$filed,$value,$filed1,$data=null){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($filed,$value);
		$this->db->where_not_in($filed1,$data);
		$sql = $this->db->get();
		return $sql->result_array();

	}

	function pilih($table,$field,$value)
	{
		$this->db->select('*');
		$this->db->where($field,$value);
		$data = $this->db->get($table);

		if($data->num_rows() > 0){
		return $data;
		}else{
		return false;
		}
	}

	function wherein($table,$filed,$data)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where_in($filed, $data);
		$sql = $this->db->get();
		return $sql->result_array();
	}
}

/* End of file select.php */
/* Location: ./application/models/select.php */