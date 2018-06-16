<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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
			 		redirect('dashboard','refresh');
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
			$data['user'] = $this->user_model->getUserDetail($id);	
		$this->load->view('dashboard',$data);
	}

	public function editProfil(){
		$sessData = $this->session->userdata('masuk');
		$id = $sessData['id'];
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamt', 'trim|required');	
		if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_message('Update Profil', "Update Profil Gagal");
			$data['user'] = $this->user_model->getUserDetail($id);	
		$this->load->view('dashboard',$data);
		} else {
			$this->user_model->updateUser($id);
			redirect('dashboard','refresh');
		}
	}

	public function editFoto(){
		$sessData = $this->session->userdata('masuk');
		$id = $sessData['id'];
			$config['upload_path']			='./assets/img/';
			$config['allowed_types']		='jpg|png';
				$config['max_width']			= 10240;
			$config['max_height']			= 7680;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('gambar'))
			{
					$data['error'] = array('error' => $this->upload->display_errors());
					$data['user'] = $this->user_model->getUserDetail($id);	
				$this->load->view('dashboard',$data);

			}else{
				
				$this->user_model->editFoto($id);
			redirect('dashboard','refresh');
			}

	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */