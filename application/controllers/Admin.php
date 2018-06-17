<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('Admin_model');
		if($this->session->userdata('masuk')){
			$sessData = $this->session->userdata('masuk');
			$data['level'] = $sessData['level'];
			$current_controller = $this->router->fetch_class();
			$this->load->library('acl');
			if(!$this->acl->is_public($current_controller))
			 {
			 	if(!$this->acl->is_allowed($current_controller, $data['level']))
			 	{
			 		redirect('dashboardadmin','refresh');
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
			$data['user'] = $this->Admin_model->getUserDetail($id);	
		$this->load->view('dashboardadmin',$data);
	}

}