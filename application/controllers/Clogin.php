<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clogin extends CI_Controller {
	public function __construct(){
		parent::__construct(); 
		$this->load->model('Mlogin');
	}

	public function index()
	{
		$this->load->view('login/vwlogin');
	}

	public function login()
	{
		$this->load->view('login/vwlogin');
	}
}

?>
