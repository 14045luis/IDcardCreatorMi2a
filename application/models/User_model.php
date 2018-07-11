<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getUserDetail($id){
		$this->db->select("nama,idcard,username,tgl_lahir,alamat,gambar");
		$query = $this->db->get_where('user', array('id' => $id))->result();
		return $query;
	}

	public function updateUser($id){

		$data = array('nama' => $this->input->post('nama'),'alamat' => $this->input->post('alamat'),'tgl_lahir' => $this->input->post('tgl_lahir'));
		$this->db->where('id',$id);
		$this->db->update('user',$data);
	}

	public function editFoto($id){
		$file = $this->upload->data();
		$data = array('gambar' => $file['file_name']);
		$this->db->where('id',$id);
		$this->db->update('user',$data);
	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */