<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Desain_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getOrganisasi($id){
		 $this->db->select('id_organisasi,nama');
		  $this->db->from('organisasi');
		  $this->db->where('id_user', $id);
		  $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result();
        }
	}

	public function showDesain(){
		$this->db->select('id_desain,nama,desain');
		$this->db->from('desain');
		$query = $this->db->get();
		return $query->result();
	}

	public function updateDesain($ido,$idd){
		$this->db->where('id_organisasi',$ido);
		 $data = array('id_desain' => $idd);
        $this->db->update('organisasi',$data);
	}

}

/* End of file Desain_model.php */
/* Location: ./application/models/Desain_model.php */