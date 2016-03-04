<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('session','thome'));
		$this->load->model(array('join','select'));
		if ($this->session->userdata('logged_in')=='1')
        	
        {
            //Setelah Login... Dashboard Masing Masing Level
            //redirect('home/cek_level');
            if ($this->session->userdata('group') == 'admin')
	    	{
				redirect('admin');
			}
			elseif($this->session->userdata('group') == 'guru')
			{
				redirect('guru');
			}
			else
			{
				redirect('wali');
			}
            
	    }
	}

	public function index()
	{
		$data['title'] = 'Home';
		$this->thome->display('home/home',$data);
		// echo "Haloo";
	}

	public function login()
	{
		$data['title'] = 'Login';
		$this->thome->display('home/login',$data);
	}

	public function auth(){
		$user=$this->input->post('user');
        $password=$this->input->post('password');
        $jmluser = strlen($user);
        if ($jmluser == '10') {
        	$filed = 'nisn';
        }else{
        	$filed = 'nip';
        }
        $cek = select::userpass('users','id_user','id_user','guru','id_user','siswa','id_user',$filed,$user,'password',md5($password));
        
        if ($cek->num_rows() == '1') {
        	$data = $cek->result_array();
        	//Login Berhasil, Buat Session
        	foreach ($data as $row) {
        		$session = array(
        			'logged_in' => 1,
        			'id_user' => $row['id_user'],
        			'nisn' => $row['nisn'],
        			'nama_siswa' => $row['nama_siswa'],
        			'nip' => $row['nip'],
        			'nama_guru' => $row['nama_guru'],
        			'group' => $row['group']
        			);
        	}

        	$this->session->set_userdata($session);
            redirect('home');
        	

        	// echo "<pre>";
	        // print_r($session);
	        // echo "</pre>";

        }else{
        	//login gagal
        	//buat peringatan
        	$this->session->set_flashdata('login', 'NIP/NISN / Password Salah');
        	redirect('home/login');
        }

	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */