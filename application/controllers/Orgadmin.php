<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Orgadmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('orgadmin_model');
		if($this->session->userdata('masuk')){
			$sessData = $this->session->userdata('masuk');
			$this->load->library('pdfgenerator');
			$data['level'] = $sessData['level'];
			$current_controller = $this->router->fetch_class();
			$this->load->library('acl');
			if(!$this->acl->is_public($current_controller))
			 {
			 	if(!$this->acl->is_allowed($current_controller, $data['level']))
			 	{
			 		redirect('orgadmin','refresh');
			 	}
			 }

		}else{
			redirect('login','refresh');
		}

		
	}

	public function index()
	{
		$this->load->view('organisasiadmin');
	}

	public function getOrganization(){
		$sessData = $this->session->userdata('masuk');
			$id = $sessData['id'];
		$result = $this->orgadmin_model->getOrganization($id); 
        header("Content-Type: application/json");
        echo json_encode($result);
	}


	public function random_password() 
	{
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $password = array(); 
    $alpha_length = strlen($alphabet) - 1; 
    for ($i = 0; $i < 8; $i++) 
    {
        $n = rand(0, $alpha_length);
        $password[] = $alphabet[$n];
    }
    return implode($password); 
	}

	public function addOrganization(){
		$sessData = $this->session->userdata('masuk');
			$id = $sessData['id'];
			$rand = $this->random_password();
        $this->orgadmin_model->addOrganization($id,$rand);
	}

	public function editOrganization(){
		$id = $this->input->post('id_organisasi');
    $this->orgadmin_model->editOrganization($id); 
	}
	
	public function deleteOrganization(){
		$this->orgadmin_model->deleteOrganization();
	}

		public function cetak(){
		$sessData = $this->session->userdata('masuk');
			$id = $sessData['id'];
		$data['organisasi'] = $this->orgadmin_model->getOrganization($id); 
		$html = $this->load->view('cetakorganisasi',$data,true);
		$this->pdfgenerator->generate($html,'hasil');
	}



}

/* End of file organisasi.php */
/* Location: ./application/controllers/organisasi.php */