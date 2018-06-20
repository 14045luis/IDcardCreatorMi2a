<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PrintCard extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
		$this->load->Model('print_model');
				$this->load->library('pdfgenerator');
		$this->load->Model('user_model');
		if($this->session->userdata('masuk')){
			$sessData = $this->session->userdata('masuk');
			$data['level'] = $sessData['level'];
			$current_controller = $this->router->fetch_class();
			$this->load->library('acl');
			if(!$this->acl->is_public($current_controller))
			 {
			 	if(!$this->acl->is_allowed($current_controller, $data['level']))
			 	{
			 		redirect('printCard','refresh');
			 	}
			 }

		}else{
			redirect('login','refresh');
		}

		
	}


	public function index()
	{
		$sessData = $this->session->userdata('masuk');
			$id = $sessData['id'];
		$this->load->view('print');
	}

	public function cetak(){
		$kode = $this->input->post('kode');
		$cek = $this->print_model->cekKode($kode);
		if($cek==TRUE){
		$sessData = $this->session->userdata('masuk');
		$id = $sessData['id'];
		$data['user'] = $this->user_model->getUserDetail($id);	
		
		$data['organisasi'] = $this->print_model->getOrganisasi($kode);	
		$nama = $this->print_model->getOrganisasiJoin($kode);
		$html = $this->load->view('card/'.$nama,$data,true);
		$this->pdfgenerator->generate($html,'hasil');
	}else{
		redirect('printCard','refresh');
	}
	
	}


}

/* End of file printCard.php */
/* Location: ./application/controllers/printCard.php */