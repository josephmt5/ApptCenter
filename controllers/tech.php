<?
defined('BASEPATH') OR exit('No direct script access allowed');

class tech extends CI_Controller {
	
	function __construct() 
	{
	parent :: __construct();
	
		
		$user = "josephmt5";
	$pass = "thompson01";
	$db = new PDO('mysql:host=198.71.225.53:3306;dbname=apptcenterdb', $user, $pass);
		
	$email = trim($this->session->userdata("activeEmail"));
	$query = $db->query("SELECT email FROM tech WHERE email= '".$email."'");
	$row = $query->fetch(PDO::FETCH_ASSOC);
		
	if($row==null)
	{
		//$message = "you are not authorized to access this page.";
			//echo "<script type='text/javascript'>alert('$message');</script>";
		redirect("Welcome/index");
	}
	
		
		
	}
	
	
	

	public function claim()
	{
		
		$this->load->view('claim');
	}
	public function day()
	{
		
		$this->load->view('myday');
	}
	public function admin()
		{

		$this->data['view'] = "options/tech";
			$this->load->view('admin', $this->data);



		}
	public function adminmenu()
		{
		$this->load->helper('url');	
		$this->load->view('adminmenu');
		}
	public function addtech()
	{
		
		$this->data['view'] = "options/addtech";
		$this->load->view('admin', $this->data);		
	}
	public function add()
	{
		
		$this->data['view'] = "options/settime";
		$this->load->view('admin', $this->data);		
	}
	public function techs()
	{
		
		$this->data['view'] = "options/tech";
		$this->load->view('admin', $this->data);		
	}
	
	public function email()
	{
		
		$this->load->view('email');
	}
	public function unfinished()
	{
		
		$this->data['view'] = "options/unfinished";
		$this->load->view('admin', $this->data);		
	}
	public function unclaimed()
	{
		
		$this->data['view'] = "options/unclaimed";
		$this->load->view('admin', $this->data);		
	}
	public function unpaid()
	{
		
		$this->data['view'] = "options/unpaid";
		$this->load->view('admin', $this->data);		
	}
	public function search()
	{
		
		$this->data['view'] = "options/search";
		$this->load->view('admin', $this->data);		
	}
	
	


















}
?>