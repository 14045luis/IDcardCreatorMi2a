<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PegawaiModel extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getAllPegawai()
    {
        $query = $this->db->get('user');
        if($query->num_rows()>0){
            return $query->result();
        }
    }

    public function save()
    {
        $data= $this->input->post();
        $this->db->insert('user', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
}

/* End of file PegawaiModel.php */

?>