
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function Admin(){
        	parent::__construct();

		if (preg_match('/index.php/i', $_SERVER['REQUEST_URI'])) {
			if ($this->config->item('index_page') == '') {
				redirect('admin'); 
			}
 
    	die(); 
		}
        parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
		
		

		

    }
	public function index()
	{	$this->load->model('model');
		$data=array("users"=>$this->model->getUsers());
		$this->load->view('admin/header',$data);
		$this->load->view('admin/cpanel');
		$this->load->view('admin/footer');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("home/login");
	}
	
	public function post()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('message','Message','required');
		$this->form_validation->set_rules('link','Link','required');
		$this->form_validation->set_rules('caption','Caption','required');
		$this->form_validation->set_rules('description','Description','required');
		$this->form_validation->set_rules('picture','Picture','required');
		$this->form_validation->set_rules('name','Name','required');

		$this->load->model('model');
		

            if($this->form_validation->run()){       


            	$response=$this->model->post($this->input->post('message'),$this->input->post('picture'),$this->input->post('link'),$this->input->post('caption'),$this->input->post('description'),
			$this->input->post('name'));

            }
		
		

	}
	
	public function addUser()
	{
	 	
			 $this->load->model("model");
			 $bool=$this->model->addUser($this->input->post('username'),$this->input->post('password'),$this->input->post('paypal'));
			
	
	}

	public function activateUser()
	{
	 	
			 $this->load->model("model");
			 $bool=$this->model->activateUser($this->input->post('id'),$this->input->post('days'));
			
	
	}
	
	
}
