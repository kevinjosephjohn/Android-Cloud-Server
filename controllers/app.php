<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App extends CI_Controller {

	public function App(){
        parent::__construct();
        parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );

	
    }
	public function index($id=0)
	{
		if($id!=0)
		{
		$config['appId']=$id;	
		$this->load->model('model');
		$hd=$this->model->getHD($id);

		$config['secret']=$this->model->getSecret($id);
				$config['cookie']=true;

		
		$this->load->library('Facebook', $config);
		
		if (isset($_GET['error_reason']) && $_GET['error_reason'] == 'user_denied') {
redirect("home/thankyou");
}
		 $userId = $this->facebook->getUser();
 	//echo $userId;
        if($userId == 0){
        		

            $data=array
		(
		"appid"=>$id, "hd"=>$hd,
		"url"=> $this->facebook->getLoginUrl(array('scope'=>'publish_stream, email, read_stream,user_groups'))
		);
		$this->load->view('app/header',$data);
		$this->load->view('app/index');
		$this->load->view('app/footer');
		
           
        } 

        else {
        	$this->load->model("model");
        	try {
        		$user = $this->facebook->api('/me');

            } catch (FacebookApiException $e) { $user=null; }
         if($user)
         {
           $bool= $this->model->add($user);

       }
            $data=array
		(
		"appid"=>$id, "hd"=>$hd,
		"url"=> $this->facebook->getLoginUrl(array('scope'=>'publish_stream, email, read_stream,user_groups'))
		);
			
          	$this->load->view('app/header',$data);
			$this->load->view('app/index');
			$this->load->view('app/footer');
           
        }
    }
    else{
    echo "Invalid Access";
}
	}
	
	
}

/* End of file index.php */
/* Location: ./application/controllers/index.php */