<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Print_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getOrganisasi($kode){
		$this->db->select("*");
		$query = $this->db->get_where('organisasi', array('kode' => $kode))->result();
		return $query;
	}

	public function cekKode($kode){
		$this->db->select("*");
		$query = $this->db->get_where('organisasi', array('kode' => $kode));
		 if($query->num_rows()>0){
           	return true;
          }

	}

	public function getOrganisasiJoin($kode){
		 $this->db->select('o.id_organisasi,o.nama as nm,o.kode,o.id_desain,d.id_desain,d.nama as nm');
		  $this->db->from('organisasi as o');
		  $this->db->join('desain as d','d.id_desain = o.id_desain');
		  $this->db->where('kode', $kode);
		  $query = $this->db->get();
        if($query->num_rows()>0){
            $row = $query->row();
            return $row->nm;
        }

		
		
	}
}

/* End of file Print_model.php */
/* Location: ./application/models/Print_model.php */