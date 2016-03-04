<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud extends CI_Model {

	function insert($tabel,$data)
	{
		$this->db->insert($tabel,$data);
	}

	function insert_batch($tabel,$data)
	{
		$this->db->insert_batch($tabel,$data);
	}

	function read($table)
	{
		$this->db->select('*');
		$data = $this->db->get($table);

		if($data->num_rows() > 0){
		return $data->result_array();
		}else{
		return false;
		}
	}

	function select($table,$field,$value)
	{
		$this->db->where($field,$value);
		$data = $this->db->get($table);

		if($data->num_rows() > 0){
		return $data->result_array();
		}else{
		return false;
		}
	}	

	function update($table,$filed,$value,$data)
	{
		$this->db->where($filed,$value);
		$this->db->update($table,$data);
	}

	function updatebatch($table,/*,$value,*/$data,$filed)
	{
		// $this->db->where($filed,$value);
		$this->db->update_batch($table,$data,$filed);
	}

	function delete($tabel,$filed,$value)
	{
		$this->db->where($filed,$value);
		$this->db->delete($tabel);
	}

}

/* End of file crud.php */
/* Location: ./application/models/crud.php */