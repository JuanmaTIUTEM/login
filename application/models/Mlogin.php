<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model 
{
	
	public function init($dataBase){

		$this->db = $this->load->database($dataBase, TRUE);
	
	}
	

	public function index(){
		$this->init('mongo');
		
		
	}


}

 ?>