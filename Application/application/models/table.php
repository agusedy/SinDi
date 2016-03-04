<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table extends CI_Model {

	function cari($table,$fileda,$filedb,$filedc,$data)
	{
		$this->db->select('*');
		$this->db->from($table);
		
		$this->db->like($fileda,$data);
        $this->db->or_like($filedb,$data);
        $this->db->or_like($filedc,$data);
        // $this->db->or_like($filedd,$data);
		
		// $this->db->join('pembimbing','mahasiswa.pembimbing_1 = pembimbing.id_pemb','left' );
		// $this->db->join('pembimbing AS coba','mahasiswa.pembimbing_2 = coba.id_pemb','left' );
		$sql = $this->db->get();
		return $sql->result_array();
	}

	function limitdata($tabel,$limit=NULL,$offset=NULL,$filed=NULL,$ord=NULL)
	{

		if($limit != NULL){
			$this->db->order_by($filed,$ord);
	        $this->db->limit($limit,$offset);
	    }
	    	
	    	return $this->db->get($tabel);
	}


}

/* End of file table.php */
/* Location: ./application/models/table.php */