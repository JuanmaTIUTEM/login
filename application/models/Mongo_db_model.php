<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mongo_db_model extends CI_Model 
{
	
	public function init($dataBase){

		$this->db = $this->load->database($dataBase, TRUE);
	
	}
	

	public function insertData($data){
		$this->init('mongo');
		$archivo = $data['archivo'];
		return $archivo;
		
	}


}

 ?>