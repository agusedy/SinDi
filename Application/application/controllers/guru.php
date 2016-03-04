<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->library(array('tguru','session','pagination'));
		$this->load->helper(array('form', 'url'));
		$this->load->model(array('join','crud','select','table'));
	} 

	public function index()
	{
		if($this->session->userdata('group') == 'guru')
		{
			$nip = $this->session->userdata('nip');
			$data['tajar'] = crud::select('kelas','nip',$nip);
			$data['title']	= 'Data Kelas';
			$data['theader']	= 'Daftar Kelas';
			$data['tform']	= 'Daftar Kelas ';
			$this->tguru->display('main/guru/daftarkelas',$data);
		}else{
			redirect('home');
		}
	}

	public function rankkelas()
	{
		$id_kelas = $this->uri->segment(3);
		$config['base_url'] = site_url('guru/rankkelas/'.$id_kelas);
		$config['total_rows'] = join::tigatablewherelim('nilai','id_kelas','nisn','kelas','id_kelas','siswa','nisn','nilai.id_kelas',$id_kelas)->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;
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

		$uri = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
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
		$data['rkls'] = join::tigatablewherelim('nilai','id_kelas','nisn','kelas','id_kelas','siswa','nisn','nilai.id_kelas',$id_kelas,$lim,$off)->result_array();
		$data['pagination'] = $this->pagination->create_links();
		$data['title'] = "Peringkat Kelas";
		$data['htitle'] = "Peringkat Kelas";
		$data['btitle'] = NULL;
		$this->tguru->display('main/wali/rankkelas',$data);
		
	}

	public function rankpararel()
	{
		$thn_ajaran = $this->uri->segment(3);
		$config['base_url'] = site_url('guru/rankpararel/'.$thn_ajaran);
		$config['total_rows'] = $dt = join::tigatablewherelim('nilai','id_kelas','nisn','kelas','id_kelas','siswa','nisn','thn_ajaran',$thn_ajaran)->num_rows();
		$config['per_page'] = 10;
		$config['uri_segment'] = 4;
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

		$uri = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
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
		$data['rprl'] = join::tigatablewherelim('nilai','id_kelas','nisn','kelas','id_kelas','siswa','nisn','thn_ajaran',$thn_ajaran,$lim,$off)->result_array();
		$data['pagination'] = $this->pagination->create_links();
		$data['title'] = "Peringkat Kelas";
		$data['htitle'] = "Peringkat Kelas";
		$data['btitle'] = NULL;
		
		$this->tguru->display('main/wali/rankpararel',$data);
		
	}

	public function addnilai()
	{
		if($this->session->userdata('group') == 'guru')
		{
			$id_kelas = $this->uri->segment(3);
			$data['unilai'] = join::tigatablewhere('nilai','id_kelas','nisn','kelas','id_kelas','siswa','nisn','nilai.id_kelas',$id_kelas);

			$data['title']	= 'Input Nilai';
			$data['theader']	= 'Masukan Nilai';
			$data['tform']	= 'Form Nilai Siswa';
			$this->tguru->display('main/guru/addnilai',$data);
			
			/*echo "<pre>";
			// print_r($this->session->userdata('nip'));
			print_r($data['unilai']);
			echo "</pre>";*/
		}else{
			redirect('home');
		}
	}

	public function updatenilai()
	{
		if($this->session->userdata('group') == 'guru')
		{
			$unilai = $this->input->post();
			foreach ($unilai as $row){
				$jml_data = count($row);
			}
			$prosentase = crud::select('prosentase','id_pros','1');
			foreach ($prosentase as $pros) {
				$sikp = $pros['sikap'];
				$tauan = $pros['pengetahuan'];
				$trampil = $pros['ketrampilan'];
			}
			//Update Banyak
			for($i=0; $i<$jml_data; $i++)
			$dtunil[$i] = array(
				'id_nilai' => $unilai['id_nilai'][$i],
				'observa' => $unilai['observa'][$i],
				'pdiri' => $unilai['pdiri'][$i],
				'pteman' => $unilai['pteman'][$i],
				'cttnguru' => $unilai['cttnguru'][$i],
				'ntulis' => $unilai['ntulis'][$i],
				'nlisan' => $unilai['nlisan'][$i],
				'pnguasaan' => $unilai['pnguasaan'][$i],
				'kinerja' => $unilai['kinerja'][$i],
				'project' => $unilai['project'][$i],
				'pfolio' => $unilai['pfolio'][$i],
				'sikp' => $tsikp = (($unilai['observa'][$i]+$unilai['pdiri'][$i]+$unilai['pteman'][$i]+$unilai['cttnguru'][$i])/4)
				*($sikp),
				'ptauan' => $tptauan = (($unilai['ntulis'][$i]+$unilai['nlisan'][$i]+$unilai['pnguasaan'][$i])/3)
				*($tauan),
				'trampilan' => $ttrampil = (($unilai['kinerja'][$i]+$unilai['project'][$i]+$unilai['pfolio'][$i])/3)
				*($trampil),
				'total' => ($tsikp+$tptauan+$ttrampil),
				);
		
			crud::updatebatch('nilai',$dtunil,'id_nilai');

			/*Merangking Siswa*/
			$id_kelas = $unilai['id_kelas'];
			$nil = $this->db->query("
				select id_nilai,rankkls,total from nilai where id_kelas=$id_kelas
				order by total desc
				");
			$jml_nil = $nil->num_rows();
			$nildesc = $nil->result_array();
			// $jml_nil = $nildesc->num_rows();
			for($x=0; $x<$jml_nil; $x++)
			$urank[$x] = array(
				'id_nilai' => $nildesc[$x]['id_nilai'],
				// 'total' => $nildesc[$x]['total'],
				'rankkls' => $x+1, 
				);
			crud::updatebatch('nilai',$urank,'id_nilai');
			redirect('guru');
			/*echo "<pre>";
			print_r($dtunil);
			echo "<br>";
			print_r($unilai);
			echo "<br>";
			print_r($urank);
			echo "</pre>";*/
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

/* End of file guru.php */
/* Location: ./application/controllers/guru.php */