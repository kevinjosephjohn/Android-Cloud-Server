<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function Home(){
        parent::__construct();
        parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );
        if($this->session->userdata('isLogged')==1)
    	{
			
				redirect("user");

		}

	
    }
	public function register()
	{
		$data=array('breadCrumbs'=>'Sign Up');
		
		$this->load->view('home/header',$data);
		$this->load->view('home/buy');
		$this->load->view('home/footer');


	}

	
	
	public function index()
	{
	redirect('home/login');
	}
	
	
	public function login()
  	{
  		$data=array("breadCrumbs"=>"Login","msg"=>"");

  		if($this->input->post('login')) {
  			$this->load->model("model");
		    $this->load->library('form_validation');

			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');
        
            if($this->form_validation->run()) {
            	$this->load->model("model");
            	$bool=$this->model->login($this->input->post('username'),md5($this->input->post('password')));
			 	if($bool==2) { //success
			 		$data=array("isLogged"=>1,"username"=>$this->input->post('username'));
        			$this->session->set_userdata($data);   
                	redirect("user");    
                }
                else if($bool=='1'){ //account expired
                	$data=array("breadCrumbs"=>"Login","msg"=>"Account not active");

                }
        		else if($bool==0) {
               		$data=array("breadCrumbs"=>"Login","msg"=>"Authentication failed");
               	}
			}
        	


		}

  		$this->load->view('home/header',$data);
		$this->load->view('home/login');
		$this->load->view('home/footer');


  	}

  
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */