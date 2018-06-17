<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
       $this->load->view('HomeView');
    }

    public function gridDinamis()
    {
        $this->load->view('GridDinamisView');
    }

    public function getAllPegawai()
    {
        $this->load->model('PegawaiModel');
        $result = $this->PegawaiModel->getAllPegawai(); 
        header("Content-Type: application/json");
        echo json_encode($result);
    }

    public function addPegawai(){
        $this->load->model('PegawaiModel');
        $this->PegawaiModel->save();
    }

    public function deletePegawai()
    {
        $this->load->model('PegawaiModel');
        $id = $this->input->post('idpegawai'); 
        $this->PegawaiModel->delete($id);
    }
}

/* End of file Home.php */

?>