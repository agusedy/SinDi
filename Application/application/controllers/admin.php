<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('session','tadmin','pagination'));
		$this->load->model(array('crud','table','select','join'));
	}

	public function index()
	{	if($this->session->userdata('group') == 'admin')
		{
			redirect('admin/siswa/0');
		}else{
			redirect('home');
		}
	}

	public function siswa(){
		if($this->session->userdata('group') == 'admin')
		{
			$config['base_url'] = site_url('admin/siswa');
			$config['total_rows'] = table::limitdata('siswa')->num_rows();
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

			$data['siswa'] = table::limitdata('siswa',$config['per_page'],$offset,'nama_siswa','asc')->result_array();
			$data['pagination'] = $this->pagination->create_links();

			$data['title']	= 'Menu Siswa';
			$data['theader']	= 'Siswa';
			$data['tform']	= 'Tambah Siswa';
			$data['ttable']	= 'Data Siswa';

			$this->tadmin->display('main/admin/siswa',$data);
		}else{
			redirect('home');
		}
	}

	public function carisiswa()
	{	if($this->session->userdata('group') == 'admin')
		{
			$filed = $this->input->post('carisiswa');
			// print_r($filed);
			if ($filed == "") {
				// echo 'tes';
				redirect('admin/siswa/0');
			}else{
				// echo 'cari';
			

			/*Data Ini Di Pasing Untuk Menghilangkan Error*/
		    $data['pagination'] = ' ';
			$data['no'] = 0;
			

			$data['siswa'] = table::cari('siswa','nisn','nama_siswa','thn_masuk',$filed);
			$data['title']	= 'Menu Siswa';
			$data['theader']	= 'Siswa';
			$data['tform']	= 'Tambah Siswa';
			$data['ttable']	= 'Data Siswa';
			$this->tadmin->display('main/admin/siswa',$data);
			}
		}else{
			redirect('home');
		}
	}

	public function addsiswa()
	{
		if($this->session->userdata('group') == 'admin')
		{
			$input = $this->input->post();
			$user = array(
				'group' => 'wali',
				'password' => md5($input['nisn'].$input['thn_masuk']), 
				);
			crud::insert('users',$user);


			$data=select::max('users','id_user');
			foreach ($data as $row)
				// print_r($row['id_user']);

			$siswa = array(
				'id_user' => $row['id_user'],
				'nisn' => $input['nisn'], 
				'nama_siswa' => $input['nama_siswa'], 
				'alamat_siswa' => $input['alamat_siswa'], 
				'ortu' => $input['ortu'], 
				'thn_masuk' => $input['thn_masuk']
				);

			crud::insert('siswa',$siswa);

			/*echo "<pre>";
			print_r($input['nisn'].$input['thn_masuk']);
			print_r($user);
			print_r($siswa);
			echo "</pre>";*/

			redirect('admin/siswa/0');
		}else{
			redirect('home');
		}
	}

	public function deluser(){
		if($this->session->userdata('group') == 'admin')
		{
			$id_user = $this->uri->segment(3);
			crud::delete('users','id_user',$id_user);
			$group = $this->uri->segment(4);
			redirect('admin/'.$group.'/0');
		}else{
			redirect('home');
		}
	}

	public function editsiswa()
	{
		if($this->session->userdata('group') == 'admin')
		{
			if (!empty($this->input->post())) {
				
				$edtsiswa = $this->input->post();
				// print_r($edtsiswa['nisn']);
				crud::update('siswa','nisn',$edtsiswa['nisn'],$edtsiswa);
				redirect('admin/siswa/0');
			}else{
				$data['edtsiswa']=crud::select('siswa','nisn',$this->uri->segment(3));
				$data['title'] = 'Edit Data Siswa';
				$data['theader']	= 'Siswa';
				$this->tadmin->display('main/admin/editsiswa',$data);	
			}
		}else{
			redirect('home');
		}	
	}

	public function guru()
	{
		if($this->session->userdata('group') == 'admin')
		{
			$config['base_url'] = site_url('admin/guru');
			$config['total_rows'] = table::limitdata('guru')->num_rows();
			$config['per_page'] = 5;
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

			$data['guru'] = table::limitdata('guru',$config['per_page'],$offset,'nama_guru','asc')->result_array();
			$data['pagination'] = $this->pagination->create_links();

			$data['title']	= 'Menu Guru';
			$data['theader']	= 'Guru';
			$data['tform']	= 'Tambah Guru';
			$data['ttable']	= 'Data Guru';

			$this->tadmin->display('main/admin/guru',$data);
		}else{
			redirect('home');
		}
	}

	public function cariguru()
	{
		if($this->session->userdata('group') == 'admin')
		{
			$filed = $this->input->post('cariguru');
			// print_r($filed);
			if ($filed == "") {
				// echo 'tes';
				redirect('admin/guru/0');
			}else{
				// echo 'cari';
			

			/*Data Ini Di Pasing Untuk Menghilangkan Error*/
		    $data['pagination'] = ' ';
			$data['no'] = 0;
			

			$data['guru'] = table::cari('guru','nip','nama_guru','gol',$filed);
			$data['title']	= 'Menu Guru';
			$data['theader']	= 'Guru';
			$data['tform']	= 'Tambah Guru';
			$data['ttable']	= 'Data Guru';
			$this->tadmin->display('main/admin/guru',$data);
			}
		}else{
			redirect('home');
		}	
	}

	public function addguru()
	{
		if($this->session->userdata('group') == 'admin')
		{
			$user = array(
				'group' => 'guru',
				'password' => md5($this->input->post('pass_guru')), 
				);
			crud::insert('users',$user);


			$data=select::max('users','id_user');
			foreach ($data as $row)
				// print_r($row['id_user']);

			$guru = array(
				'id_user' => $row['id_user'],
				'nip' => $this->input->post('nip'), 
				'nama_guru' => $this->input->post('nama_guru'), 
				'alamat_guru' => $this->input->post('alamat_guru'), 
				'gol' => $this->input->post('gol'), 
				);

			crud::insert('guru',$guru);

			redirect('admin/guru/0');
		}else{
			redirect('home');
		}
	}

	public function editguru()
	{
		if($this->session->userdata('group') == 'admin')
		{
			if (!empty($this->input->post())) {
				$post = $this->input->post();
				$guru = array(
					'nip' => $post['nip'],
					'nama_guru' => $post['nama_guru'],
					'alamat_guru' => $post['alamat_guru'],
					'gol' => $post['gol']
					);
				crud::update('guru','nip',$post['nip'],$guru);

				/*echo "<pre>";
				print_r($post);
				print_r($guru);
				echo "</pre>";*/
				if ($post['pass_guru'] == '') {
					
				}else{
					$user = array(
						'id_user' => $post['id_user'],
						'password' => md5($post['pass_guru']) 
						);
					crud::update('users','id_user',$post['id_user'],$user);
				}
				
				redirect('admin/guru/0');
			}else{
				$data['editguru']=crud::select('guru','nip',$this->uri->segment(3));
				$data['id_user'] = $this->uri->segment(4);
				$data['title'] = 'Edit Data Guru';
				$data['theader']	= 'Guru';
				$this->tadmin->display('main/admin/editguru',$data);	
			}
		}else{
			redirect('home');
		}
	}

	public function selectguru(){
		if($this->session->userdata('group') == 'admin')
		{
			$nip = $this->input->post('nip');
			if ($nip=='') {
				$out = NULL;
			}else{
			$data['selectguru'] = crud::select('guru','nip',$nip);
			foreach ($data['selectguru'] as $gru) {
					// $out = $gru['nama_guru'];
				$out = "
				<label class='control-label'>Nama Guru</label>
				<input type='text' class='form-control' name='nama_guru' value='".$gru['nama_guru']."' disabled>";
				}	
			}
				echo $out;
		}else{
			redirect('home');
		}
	}

	public function walikls(){
		if($this->session->userdata('group') == 'admin')
		{
			// $data['nisn'] = select::select_inverse('siswa','nilai','nisn');
			$config['base_url'] = site_url('admin/walikls');
			$config['total_rows'] = table::limitdata('kelas')->num_rows();
			$config['per_page'] = 8;
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

			$data['dtwalikel'] = table::limitdata('kelas',$config['per_page'],$offset,'thn_ajaran','desc')->result_array();
			$data['pagination'] = $this->pagination->create_links();		


			$data['nip'] = crud::read('guru');
			$data['title']	= 'Data Kelas';
			$data['theader']	= 'Data Kelas';
			$this->tadmin->display('main/admin/walikls',$data);	


			/*echo "<pre>";
			
			print_r($user);
			print_r($guru);
			echo "</pre>";*/
		}else{
			redirect('home');
		}
	}

	public function delkls(){
		if($this->session->userdata('group') == 'admin')
		{
			$id_kelas = $this->uri->segment(3);
			crud::delete('kelas','id_kelas',$id_kelas);
			redirect('admin/walikls/0');
		}else{
			redirect('home');
		}
	}

	public function dtkls(){
		if($this->session->userdata('group') == 'admin')
		{
			$id_kelas = $this->uri->segment(3);
			$data['dtkls'] = join::tigatablewhere('nilai','id_kelas','nisn','kelas','id_kelas','siswa','nisn','nilai.id_kelas',$id_kelas);
			/*echo "<pre>";
			print_r($data['dtkls']);
			// print_r($guru);
			echo "</pre>";*/

			$data['title']	= 'Detil Kelas';
			$data['theader']	= 'Detil Kelas';
			$data['ttable']	= 'Data Detil Kelas';
			$this->tadmin->display('main/admin/dtakls',$data);
		}else{
			redirect('home');
		}
	}

	public function delsiswadikelas(){
		if($this->session->userdata('group') == 'admin')
		{
			$id_kelas = $this->uri->segment(4);
			$id_nilai = $this->uri->segment(3);
			crud::delete('nilai','id_nilai',$id_nilai);
			redirect('admin/dtkls/'.$id_kelas);
		}else{
			redirect('home');
		}
	}

	public function addlistsiswa(){
		if($this->session->userdata('group') == 'admin')
		{
			$klsdt = array(
				'id_kelas' => $this->uri->segment(3)
				);
			$data['wali'] =  $this->db->get_where('kelas',$klsdt);
			foreach ($data['wali']->result_array() as $key) {
				$kelas=$key['kelas']-1;
				$thajr=$key['thn_ajaran'];
				
			}
			$id_kelas = $key['id_kelas'];
			$thn = $thajr - $kelas;
			// $nisn= select::pilih('nilai','id_kelas',$key['id_kelas']);
			// $nisn= $this->db->query("select nisn from nilai where id_kelas=$id_kelas");
			$nisn= $this->db->query("
				select nilai.nisn from nilai
				LEFT JOIN kelas ON kelas.id_kelas = nilai.id_kelas
				LEFT JOIN siswa ON siswa.nisn = nilai.nisn
				where thn_ajaran = $thajr
				");

			$test = $nisn->result_array();

			$x = $nisn->num_rows()-1;
			for($i=0;$i<=$x; $i++)

			$siswa[$i] = $test[$i]['nisn'];
			/*echo "<pre>";
			print_r($id_kelas);
			echo "<br>";
			print_r($x);
			echo "</pre>";*/

			if ($nisn->num_rows() == '0') {
				// echo "Select ALL";
				$data['siswa'] = select::siswa('siswa','thn_masuk',$thn,'nisn');
			}else{
				// echo "Select Dengan Kondisi";
				$data['siswa'] = select::siswa('siswa','thn_masuk',$thn,'nisn',$siswa);
			}

			
			// $siswa = $a;//array('9988776601','9988776602','9988776604');
			// $data['siswa'] = select::siswa('siswa','thn_masuk',$thn,'nisn',$siswa);
			
			/*$pe = array(
				'thn_masuk' => $thn
				);
			$data['siswa'] = $this->db->get_where('siswa',$pe)->result_array();//crud::read('siswa');*/

			$data['title']	= 'Input Data Kelas';
			$data['theader']	= 'Input Data Kelas';
			$this->tadmin->display('main/admin/isikelas',$data);
		}else{
			redirect('home');
		}
	}

	public function addwalikls(){
		if($this->session->userdata('group') == 'admin')
		{
			$kelas  = $this->input->post();

			$dtakelas = array(
				'nip' => $kelas['nip'],
				'kelas' => $kelas['kelas'],
				'ruang' => $kelas['ruang'],
				'thn_ajaran' => $kelas['thn_ajaran']
				);
			
			/*echo "Sebelum Kondisi";
			echo "<pre>";
			
			print_r($dtakelas);
			echo "</pre>";*/
			$kls =  $this->db->get_where('kelas',$dtakelas);
			// $adagru = $kls->num_rows();
			// Jika Data Ada
			if ($kls->num_rows() > 0) {

				$jml_siswa = count($kelas['nisn']);
				$klid = $kls->result_array();
				foreach ($klid as $id_kls);
				$idk = $id_kls['id_kelas'];

				//input Banyak SISwa
				$idkelas = array_fill(0, $jml_siswa, $idk);
				for($i=0; $i<$jml_siswa; $i++)
				$dtasiswa[$i] = array(
					'id_kelas' => $idkelas[$i],
					'nisn' => $kelas['nisn'][$i] 
					);
				
				crud::insert_batch('nilai',$dtasiswa);
				redirect('admin/walikls/0');
				
				
				/*echo "Masukan Siswa Dalam kelas";
				echo "<br>";
				echo "Data Kelas";
				echo "<pre>";
				print_r($id_kls);
				echo "</pre>";

				echo "Data Siswa [Yang dimasuksn]";
				echo "<pre>";
				print_r($dtasiswa);
				echo "</pre>";*/

			}else{
				$dtawali = $this->input->post();
				//Ketika Tidak Ada Data  Kelas
				crud::insert('kelas',$dtawali);
				redirect('admin/walikls/0');

				/*echo "Masuksn add Wali Kelas";
				echo "<pre>";
				print_r($dtawali);
				echo "</pre>";*/
			}
		}else{
			redirect('home');
		}
	}

	public function datawalikls(){
		if($this->session->userdata('group') == 'admin')
		{

			// $data['dtwalikel'] = crud::
			

			$data['title']	= 'Menu Guru';
			$data['theader']	= 'Guru';
			$data['tform']	= 'Tambah Guru';
			$data['ttable']	= 'Data Guru';

			$this->tadmin->display('main/admin/guru',$data);
		}else{
			redirect('home');
		}
	}

	public function dtakls()
	{
		if($this->session->userdata('group') == 'admin')
		{
			$kls = $this->input->post('kelas');
			
			$data['title']	= 'Data Per Kelas';
			$data['theader']= 'Data Kelas';
			$data['ttable']	= 'Data Siswa';
			$this->tadmin->display('main/admin/dtakls',$data);
		}else{
			redirect('home');
		}
	}




	public function prosentase()
	{
		if($this->session->userdata('group') == 'admin')
		{
			if (!empty($this->input->post())) {
				
				$editpros = $this->input->post();
				crud::update('prosentase','id_pros',$editpros['id_pros'],$editpros);
				redirect('admin/prosentase');
			}else{
				$data['pros']=crud::select('prosentase','id_pros','1');

				$data['title']	= 'Prosentase Nilai';
				$data['theader']	= 'Prosentase Nilai';
				$data['tform']	= 'Prosentase Nilai';
				$this->tadmin->display('main/admin/prosentase',$data);
			}
		}else{
			redirect('home');
		}
	}

	public function addprosentase()
	{
		if($this->session->userdata('group') == 'admin')
		{
			if (!empty($this->input->post())) {
				
				$editpros = $this->input->post();
				crud::update('prosentase','nip',$editguru['nip'],$editguru);
				redirect('admin/guru');
			}else{
				$data['editguru']=crud::select('prosentase','id_pros','1');
				$data['title'] = 'Edit Data Guru';
				$data['theader']	= 'Guru';
				$this->tadmin->display('admin/prosentase',$data);	
			}



			$data = $this->input->post();
			crud::insert('prosentase',$data);
			redirect('admin/prosentase');
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

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */