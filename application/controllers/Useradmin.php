<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Useradmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('useradmin_model');
		$this->load->library('pdfgenerator');
		if($this->session->userdata('masuk')){
			$sessData = $this->session->userdata('masuk');
			$data['level'] = $sessData['level'];
			$current_controller = $this->router->fetch_class();
			$this->load->library('acl');
			if(!$this->acl->is_public($current_controller))
			 {
			 	if(!$this->acl->is_allowed($current_controller, $data['level']))
			 	{
			 		redirect('useradmin','refresh');
			 	}
			 }

		}else{
			redirect('login','refresh');
		}

		
	}

	public function index()
	{
		$this->load->view('useradminview');
	}

	public function getOrganization(){
		$sessData = $this->session->userdata('masuk');
			$id = $sessData['id'];
		$result = $this->useradmin_model->getOrganization($id); 
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
        $this->useradmin_model->addOrganization($id,$rand);
	}

	public function editOrganization(){
		$id = $this->input->post('id_useradmin');
    $this->useradmin_model->editOrganization($id); 
	}
	
	public function deleteOrganization(){
		$this->useradmin_model->deleteOrganization();
	}

	public function cetak(){
		$sessData = $this->session->userdata('masuk');
			$id = $sessData['id'];
		$data['user'] = $this->useradmin_model->getOrganization($id); 
		$html = $this->load->view('cetakuser',$data,true);
		$this->pdfgenerator->generate($html,'hasil');
	}

	

}

/* End of file useradmin.php */
/* Location: ./application/controllers/useradmin.php */