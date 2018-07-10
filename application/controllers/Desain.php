<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Desain extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->Model('desain_model');
		$this->load->Model('User_model');
		if($this->session->userdata('masuk')){
			$sessData = $this->session->userdata('masuk');
			$data['level'] = $sessData['level'];
			$current_controller = $this->router->fetch_class();
			$this->load->library('acl');
			if(!$this->acl->is_public($current_controller))
			 {
			 	if(!$this->acl->is_allowed($current_controller, $data['level']))
			 	{
			 		redirect('desain','refresh');
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
			$data['user'] = $this->User_model->getUserDetail($id);	
			$data['organisasi'] = $this->desain_model->getOrganisasi($id);
		$this->load->view('desain',$data);
	}

	public function pencarian(){
		$data['id'] = $this->input->post('organisasi');
		$data['desain'] = $this->desain_model->showDesain(); 
		$this->load->view('desain_detail',$data);
	}

	public function update_desain(){
		$sessData = $this->session->userdata('masuk');
			$config['upload_path']			='./assets/img/';
			$config['allowed_types']		='jpg|png';
				$config['max_width']			= 10240;
			$config['max_height']			= 7680;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('gambar'))
			{
					$data['error'] = array('error' => $this->upload->display_errors());
				
			}else{
			$ido = $this->input->post('id_organisasi');
		$idd = $this->input->post('id_desain');
		$this->desain_model->updateDesain($ido,$idd); 
		redirect('organisasi','refresh');
			}
		
	}
	

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */