<?
defined('BASEPATH') OR exit('No direct script access allowed');

class ajax extends CI_Controller {
	
	function __construct() 
	{
	parent :: __construct();
	}
	public function ajaxsender()
	{
		
		$this->load->view('ajaxsender');
	}
}
?>