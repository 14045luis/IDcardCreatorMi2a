<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organisasi_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getOrganization($id){
		  $this->db->select('o.id_organisasi,o.nama as nm,o.kode,o.id_desain,d.id_desain,d.nama as mm');
		  $this->db->from('organisasi as o');
		  $this->db->join('desain as d','d.id_desain = o.id_desain');
		  $this->db->where('id_user', $id);
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

	public function addOrganization($id,$rand){
		 $data = array('nama' => $this->input->post('nm') ,'kode' => $rand,'id_desain' => 1,'id_user' =>$id);
        $this->db->insert('organisasi', $data);
	}

	public function editOrganization($id){
		 $this->db->where('id_organisasi',$id);
		 $data = array('nama' => $this->input->post('nm'));
        $this->db->update('organisasi',$data);
	}

	public function deleteOrganization(){
		$id = $this->input->post('id_organisasi');
		 $this->db->where('id_organisasi',$id);
        $this->db->delete('organisasi');
	}

}

/* End of file Organisasi_model.php */
/* Location: ./application/models/Organisasi_model.php */