<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 
	 
	 
	 */
	
	
	
	
	
	function __construct() 
	{
	parent :: __construct();
	
		
	}
	
	
	
	public function index()
	{
		
		$this->load->view('Home');
	}
	public function schedule()
		
	{
		$user = "josephmt5";
		$pass = "thompson01";
		$db = new PDO('mysql:host=198.71.225.53:3306;dbname=apptcenterdb', $user, $pass);
		
	$sess_id = $this->session->userdata('activeEmail');
	if(empty($sess_id))
		
   {
		$message = "please sign in before accessing this page";
			echo "<script type='text/javascript'>alert('$message');</script>";
        redirect("Welcome/index");

   }
	 
		if($this->input->post("submit_x"))
		{
			
			$this->form_validation->set_rules("phone","phone","required|regex_match[/^[0-9]{10}$/]");
			$this->form_validation->set_rules("address","address","trim|required");
			$this->form_validation->set_rules("state","state","trim|required");
			$this->form_validation->set_rules("zip","zip","trim|required");
		}
		if ($this-> form_validation->run()===false)
		{}
		else{
			$name =$this->session->userdata("activeName");
            $email=$this->session->userdata("activeEmail");
            $phone=$_POST['phone'];
            $city=$_POST['city'];
            $address=$_POST['address'];
            $state=$_POST['state'];
            $zip=$_POST['zip'];
            $prob=$_POST['problem'];
            $date=$_POST['date'];
			$time=$_POST['time'];
		
            $this->email->from('DoNotReply@apptcenter.com', 'new appt');
            $this->email->to('7065254076@mypixmessages.com');

            $this->email->subject('new appt on '.$_POST['date']);
            $this->email->message('\n
            You have a new appointment that needs to be claimed.
            '."\n" .$date." ".$time."\n".$name."\n".$email."\n".$phone."\n".$address."\n".$city." ".$state.", ".$zip."\n".$prob);
            $this->email->send();		
		
			//print_r($db);
			
		
			$insert = $db->prepare("INSERT INTO users (name, email, phone, address , state , zip , problem) VALUES (?, ?, ?, ?, ?, ?, ?)");
			$insert->bindParam(1, $name);
			$insert->bindParam(2, $email);
			$insert->bindParam(3, $phone);
			$insert->bindParam(4, $address);
			$insert->bindParam(5, $state);
			$insert->bindParam(6, $zip);
			$insert->bindParam(7, $problem);
						//print_r($insert);
			$insert->execute();

			
			
			
			$userid = $db->lastInsertId(); 	
		
		
			
		
			$PUT = $db->prepare("INSERT INTO `datetime` (date, time, userid) VALUES (?, ?, ?)");
			$PUT->bindParam(1, $date);
			$PUT->bindParam(2, $time);
			$PUT->bindParam(3, $userid);

		
			$PUT->execute();
            $message = "Thank you ".$name." Your appointment has been scheduled.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			redirect("Welcome/index");
		}
			
	
		
		$this->load->view('schedule');
	}
	public function Login()
	{
		$sess_id = $this->session->userdata('activeEmail');
	if(!empty($sess_id))
		
   {
		
        redirect("tech/claim");

   }
		
		$this->load->view('login');
	}
	
	public function logout()
	{
		
		$this->load->view('logout');
	}
	

    
    
    
    
    
    public function myappt()
		
	{
		$user = "josephmt5";
		$pass = "thompson01";
		$db = new PDO('mysql:host=198.71.225.53:3306;dbname=apptcenterdb', $user, $pass);
		
	$sess_id = $this->session->userdata('activeEmail');
	if(empty($sess_id))
		
   {
		$message = "please sign in before accessing this page";
			echo "<script type='text/javascript'>alert('$message');</script>";
        redirect("Welcome/index");

   }
	 
		
	
		
		$this->load->view('myappt');
	}
	
	
}