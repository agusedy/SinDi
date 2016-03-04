<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Thome
{
  protected $_CI;

	public function __construct()
	{
        $this->_CI =& get_instance();
	}

    function display($template,$data=null){
        $data['_navbar']=$this->_CI->load->view('templates/home/homenav',$data,true);
        
        // $data['_sidebar']=$this->_CI->load->view('templates/main/admin/adminside',$data,true);
        
        $data['_content']=$this->_CI->load->view($template,$data,true);

        // $data['_footer']=$this->_CI->load->view('template/footer',$data,true);
               
        $this->_CI->load->view('templates/home/thome',$data);
    }

	

}

/* End of file thome.php */
/* Location: ./application/libraries/thome.php */
