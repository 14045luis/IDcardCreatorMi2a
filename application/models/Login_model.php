<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function login($username,$password)
	{
		$this->db->select('id,nama,username,password,tgl_lahir,alamat,gambar,level');
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->where('password', MD5($password));
		$q = $this->db->get();
		if($q->num_rows()==1){
			return $q->result_array();
		}else{
			return false;
		}
	}

public function register()
	{
		$nama = $this->input->post('nama');
		$uname = $this->input->post('username');
		$pass = $this->input->post('password');

		$data = array(
			'nama' => $nama,'username' => $uname, 'password' => MD5($pass), 'level' => 'user', 'alamat' => 'null', 'tgl_lahir' => 'null', 'gambar' => 'null'
		);

		$this->db->insert('user', $data);
	}

	public function ambilUsername($username)
	{
		$this->db->select('username');
		$this->db->from('user');
		$this->db->where('username', $username);
		$q = $this->db->get();
		if($q->num_rows()==1){
			return $q->result_array();
		}else{
			return false;
		}
	}
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */