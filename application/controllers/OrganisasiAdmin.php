<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OrganisasiAdmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('organisasiadmin_model');
		if($this->session->userdata('masuk')){
			$sessData = $this->session->userdata('masuk');
			$data['level'] = $sessData['level'];
			$current_controller = $this->router->fetch_class();
			$this->load->library('acl');
			if(!$this->acl->is_public($current_controller))
			 {
			 	if(!$this->acl->is_allowed($current_controller, $data['level']))
			 	{
			 		redirect('OrganisasiAdmin','refresh');
			 	}
			 }

		}else{
			redirect('login','refresh');
		}

		
	}

	public function index()
	{
		$this->load->view('OrganisasiAdmin');
	}

	public function getOrganization(){
		$sessData = $this->session->userdata('masuk');
			$id = $sessData['id'];
		$result = $this->organisasi_model->getOrganization($id); 
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

	
	public function deleteOrganization(){
		$this->organisasi_model->deleteOrganization();
	}


}

/* End of file organisasi.php */
/* Location: ./application/controllers/organisasi.php */