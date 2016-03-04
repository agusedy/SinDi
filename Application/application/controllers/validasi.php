<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Validasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model(array('crud','table','select','join'));
	}

	public function chekwali()
	{
		
		$kelas = $this->input->post();

		$ckone = array(
			'nip' => $kelas['nip'],
			'kelas' => $kelas['kelas'],
			'ruang' => $kelas['ruang'],
			'thn_ajaran' => $kelas['thn_ajaran']
			);
		$data =  $this->db->get_where('kelas',$ckone);
		if ($data->num_rows() > 0) {
			$ck ="
			<div class='alert alert-danger alert-dismissable'>
	            <i class='fa fa-ban'></i>
	            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
	            <b>Perhatian!</b><br> Data Sudah Ada.
	        </div>
			";
		}else{
			$cktwo = array(
			'nip' => $kelas['nip'],
			'kelas' => $kelas['kelas'],
			'thn_ajaran' => $kelas['thn_ajaran']
			);
			$dtcktwo =  $this->db->get_where('kelas',$cktwo);
			if ($dtcktwo->num_rows() > 0) {
				$ck ="
				<div class='alert alert-danger alert-dismissable'>
		            <i class='fa fa-ban'></i>
		            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
		            <b>Perhatian!</b><br> Data Sudah Ada.
		        </div>
				";
			}else{
				$ckall = array(
				'nip' => $kelas['nip'],
				// 'kelas' => $kelas['kelas'],
				'ruang' => $kelas['ruang'],
				'thn_ajaran' => $kelas['thn_ajaran']
				);
				$dtckall = $this->db->get_where('kelas',$ckall);
				if ($dtckall-> num_rows() > 0) {
					$ck ="
					<div class='alert alert-danger alert-dismissable'>
			            <i class='fa fa-ban'></i>
			            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
			            <b>Perhatian!</b><br> Data Sudah Ada.
			        </div>
					";
				}else{
					$cktree = array(
					'nip' => $kelas['nip'],
					// 'kelas' => $kelas['kelas'],
					// 'ruang' => $kelas['ruang'],
					'thn_ajaran' => $kelas['thn_ajaran']
					);
					$dtcktree = $this->db->get_where('kelas',$cktree);
					if ($dtcktree->num_rows() > 0) {
						$ck ="
						<div class='alert alert-danger alert-dismissable'>
				            <i class='fa fa-ban'></i>
				            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				            <b>Perhatian!</b><br> Data Sudah Ada.
				        </div>
						";
					}else{
						$ck=NULL;
					}
				}

			}

						
		}
		echo $ck;
		// json_encode(array(
		// 	'valid' => $ck,
		// 	));
	}

	public function cekvalid($table,$filed)
	{
		$data=select::valid($table,$filed,$this->input->post($filed));
		
		echo json_encode(array(
		    'valid' => $data,
		));
	}

	function cknisn(){
		validasi::cekvalid('siswa','nisn');
	}

	function cknip(){
		validasi::cekvalid('guru','nip');
	}

}

/* End of file validasi.php */
/* Location: ./application/controllers/validasi.php */