<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
		{
			parent::__construct();
			$this->load->model('login_model');
		}

	public function index()
	{
		$this->load->view('login');
	}

		public function cekLogin()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required|callback_cekDb');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		} else {
			
			$sessData = $this->session->userdata('masuk');
			$data['level'] = $sessData['level']; 
		
			if($data['level'] == "admin"){
			redirect('admin','refresh');
			}else{
				redirect('dashboard','refresh');
			}
		}
	}

	public function cekDb($password)
	{
		$username = $this->input->post('username');
		$hasil = $this->login_model->login($username,$password);
		if($hasil){
			$sess_arr = array();
			foreach ($hasil as $row) {
				$sess_arr = array(
					'id' => $row['id'],
					'username' => $row['username'],
					'level' => $row['level']
				);
				$this->session->set_userdata('masuk',$sess_arr);
			}
			return true;
		}else{
			$this->form_validation->set_message('cekDb', "Login Gagal");
			return false;
		}

	}

	public function logout()
	{
		$this->session->unset_userdata('masuk');
		$this->session->sess_destroy();
		redirect('login','refresh');
	}

	public function register(){
		$this->load->view('register');
	}

	
	public function registrasi()
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required|callback_cekUsername');
		$this->form_validation->set_rules('password', 'password', 'trim|required');	
		$this->form_validation->set_rules('cpass', 'cpass', 'trim|required|callback_cekPassword');
		if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_message('registrasi', "Pendaftaran Gagal");
			$this->load->view('register');
		} else {
			
			$this->login_model->register();
			redirect('login','refresh');
		}
	}

	public function cekUsername($username)
	{
		$hasil = $this->login_model->ambilUsername($username);
		if($hasil){
			$this->form_validation->set_message('cekUsername',"Username Sudah Ada");
			return false;
		}else{
			return true;
		}

	}

	public function cekPassword($cpass)
	{
		$password = $this->input->post('password');
		
		if($cpass!=$password){
			$this->form_validation->set_message('cekPassword',"Password Tidak sama");
			return false;
		}else{
			return true;
		}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */