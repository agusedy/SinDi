<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wali extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('twali','session','pagination'));
		$this->load->helper(array('form', 'url'));
		$this->load->model(array('join','crud','select','table'));
	}


	public function index()
	{	
		if($this->session->userdata('group') == 'wali')
		{
			$nisn = $this->session->userdata('nisn');
			$data['rpt'] = join::tigatablewhere('nilai','id_kelas','nisn','kelas','id_kelas','siswa','nisn','nilai.nisn',$nisn);

			$data['title'] = "Data Nilai Siswa";
			$this->twali->display('main/wali/datasiswa',$data);
		}else{
			redirect('home');
		}
	}	

	public function rkelas()
	{
		if($this->session->userdata('group') == 'wali')
		{
			/*Ambil Data terbaru*/
			$nisn = $this->session->userdata('nisn');
			$sql  = $this->db->query("
				select kelas,ruang,thn_ajaran from nilai
				LEFT JOIN kelas ON kelas.id_kelas = nilai.id_kelas
				LEFT JOIN siswa ON siswa.nisn = nilai.nisn
				where nilai.nisn=$nisn
				order by kelas desc
				");
			$ambil = $sql->result_array();
			$kls = $ambil[0]['kelas'];
			$rom = $ambil[0]['ruang'];
			$th_ajr = $ambil[0]['thn_ajaran'];
			/*Passing Hasil Query*/
			
			 /*Paging*/
			 $rkkl= $this->db->query("
				select * from nilai
				LEFT JOIN kelas ON kelas.id_kelas = nilai.id_kelas
				LEFT JOIN siswa ON siswa.nisn = nilai.nisn
				where thn_ajaran=$th_ajr and kelas=$kls and ruang='$rom'
				");
			$config['base_url'] = site_url('wali/rkelas');
			$config['total_rows'] = $rkkl->num_rows();
			$config['per_page'] = 10;
			$config['uri_segment'] = 3;
			$config['num_links'] = 3;
			$config['use_page_numbers'] = TRUE;
			$config['full_tag_open'] = "<ul class='pagination pagination-sm no-margin pull-right'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

			$this->pagination->initialize($config);

			$uri = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$offset = ($uri*$config['per_page'])-$config['per_page'];
			if ($offset<0) {
				$offset=0;
			}else{
				$offset;
			}

		    if ($uri==0) {
		    	$uri=1;
		    }else{
		    	$nomor=0;
		    }
		    $nomor=($uri*$config['per_page'])-$config['per_page'];

		    $data['no'] = $nomor;
		    $lim = $config['per_page'];
		    $off = $offset;
			// $data['guru'] = table::limitdata('guru',$config['per_page'],$offset,'nama_guru','asc')->result_array();
			

			$data['rkls'] = $this->db->query("
				select * from nilai
				LEFT JOIN kelas ON kelas.id_kelas = nilai.id_kelas
				LEFT JOIN siswa ON siswa.nisn = nilai.nisn
				where thn_ajaran=$th_ajr and kelas=$kls and ruang='$rom'
				ORDER by nama_siswa asc
				LIMIT $lim OFFSET $off
				")->result_array();
			$data['pagination'] = $this->pagination->create_links();
			
			$data['title'] = "Peringkat Kelas";
			$data['htitle'] = "Peringkat Kelas";
			$data['btitle'] = "Peringkat Kelas ".$kls." ".$rom." Tahun Ajaran ".$th_ajr;
			$this->twali->display('main/wali/rankkelas',$data);
		}else{
			redirect('home');
		}
	}

	public function rpararel()
	{
		if($this->session->userdata('group') == 'wali')
		{
			/*Ambil Data terbaru*/
			$nisn = $this->session->userdata('nisn');
			$sql  = $this->db->query("
				select kelas,ruang,thn_ajaran from nilai
				LEFT JOIN kelas ON kelas.id_kelas = nilai.id_kelas
				LEFT JOIN siswa ON siswa.nisn = nilai.nisn
				where nilai.nisn=$nisn
				order by kelas desc
				");
			$ambil = $sql->result_array();
			$kls = $ambil[0]['kelas'];
			// $rom = $ambil[0]['ruang'];
			$th_ajr = $ambil[0]['thn_ajaran'];

			$rkprl = $this->db->query("
				select * from nilai
				LEFT JOIN kelas ON kelas.id_kelas = nilai.id_kelas
				LEFT JOIN siswa ON siswa.nisn = nilai.nisn
				where thn_ajaran=$th_ajr and kelas=$kls
				");

			$config['base_url'] = site_url('wali/rpararel');
			$config['total_rows'] = $rkprl->num_rows();
			$config['per_page'] = 10;
			$config['uri_segment'] = 3;
			$config['num_links'] = 3;
			$config['use_page_numbers'] = TRUE;
			$config['full_tag_open'] = "<ul class='pagination pagination-sm no-margin pull-right'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

			$this->pagination->initialize($config);

			$uri = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$offset = ($uri*$config['per_page'])-$config['per_page'];
			if ($offset<0) {
				$offset=0;
			}else{
				$offset;
			}

		    if ($uri==0) {
		    	$uri=1;
		    }else{
		    	$nomor=0;
		    }
		    $lim = $config['per_page'];
		    $off = $offset;
		    $nomor=($uri*$config['per_page'])-$config['per_page'];

		    $data['no'] = $nomor;
		    
		    /*print_r($lim);
		    print_r($off);*/
			$data['rprl'] = $this->db->query("
				select * from nilai
				LEFT JOIN kelas ON kelas.id_kelas = nilai.id_kelas
				LEFT JOIN siswa ON siswa.nisn = nilai.nisn
				where thn_ajaran=$th_ajr and kelas=$kls
				ORDER by nama_siswa asc
				LIMIT $lim OFFSET $off
				")->result_array();
			$data['pagination'] = $this->pagination->create_links();

			$data['title'] = "Peringkat Pararel";
			$data['htitle'] = "Peringkat Pararel";
			$data['btitle'] = "Peringkat Pararel Tahun Ajaran ".$th_ajr;

			/*==*Merangking Pararel Siswa*==*/
			$nilp = $this->db->query("
				select * from nilai
				LEFT JOIN kelas ON kelas.id_kelas = nilai.id_kelas
				LEFT JOIN siswa ON siswa.nisn = nilai.nisn
				where thn_ajaran=$th_ajr and kelas=$kls
				order by total desc
				");
			$jml_nil = $nilp->num_rows();
			$nildesc = $nilp->result_array();
			// $jml_nil = $nildesc->num_rows();
			for($x=0; $x<$jml_nil; $x++)
			$urank[$x] = array(
				'id_nilai' => $nildesc[$x]['id_nilai'],
				// 'total' => $nildesc[$x]['total'],
				'rankpar' => $x+1, 
				);
			crud::updatebatch('nilai',$urank,'id_nilai');
			/*==*Selesai Merangking Siswa*==*/
			$this->twali->display('main/wali/rankpararel',$data);
		}else{
			redirect('home');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}

}

/* End of file wali.php */
/* Location: ./application/controllers/wali.php */