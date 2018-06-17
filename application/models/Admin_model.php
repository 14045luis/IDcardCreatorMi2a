<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getUserDetail($id){
		$this->db->select("nama,username,tgl_lahir,alamat,gambar");
		$query = $this->db->get_where('user', array('id' => $id))->result();
		return $query;
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */