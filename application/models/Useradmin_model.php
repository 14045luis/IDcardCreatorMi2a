<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Useradmin_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getOrganization($id){
		  $this->db->select('id,nama,username,tgl_lahir,alamat');
		  $this->db->from('user');
		  $this->db->where('level','user');
		  $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }
	}

	public function getDesain(){
		 $this->db->select('id_desain,nama');
		  $query = $this->db->get('desain');
        if($query->num_rows()>0){
            return $query->result_array();
        }
	}


	public function deleteOrganization(){
		$id = $this->input->post('username');
		 $this->db->where('username',$id);
        $this->db->delete('user');
	}

}

/* End of file Organisasi_model.php */
/* Location: ./application/models/Organisasi_model.php */