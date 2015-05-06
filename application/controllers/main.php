<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->session->userdata("logged_in")==="true"){
			redirect("/dashboard");
		}
		else{
			$this->load->view("welcome");
		}
	}
}

//end of main controller