<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('MLogin');
	}

	public function index() {
		$this->load->view('login/index');
	}

	public function process() {
		
		$this->form_validation->set_rules('user_username', 'user_username', 'trim|required');
		$this->form_validation->set_rules('user_password', 'user_password', 'trim|required');

		$username = $this->input->post('user_username');
		$password = $this->input->post('user_password');
		$role 	  = $this->input->post('role');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('layout/index');
			}else{
				$this->load->view('login/index');
			}
		} else {
			$data = array(
				'user_username' => $username,
				'user_password' => md5($password)
			);


			//split role here
			if ($role == 1) {

			$result = $this->MLogin->login_backoffice($data);
			if ($result == TRUE) {

				$username = $this->input->post('user_username');
				$result = $this->MLogin->read_user_information($username);

				if ($result != false) {
					$session_data = array(
						'user_id' 		=> $result[0]->id,
						'user_username' => $result[0]->username,
						'user_password' => $result[0]->password,
						'user_email' 	=> $result[0]->email,
						'role' 			=> 'Administrator'
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);

					redirect('welcome/index',$data);
				} else {
					echo "string";
				}
			} else {
				$data = array(
					'error_message' => '<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Invalid Username or Password.
                                </div>'
				);
				$this->load->view('login/index', $data);
			}
			// split
			} else {
			$result = $this->MLogin->login_backoffice_panitia($data);
			if ($result == TRUE) {

				$username = $this->input->post('user_username');
				$result = $this->MLogin->read_user_information_panitia($username);

				if ($result != false) {
					$session_data = array(
						'user_id' 		=> $result[0]->kdPanitia,
						'user_username' => $result[0]->nip,
						'user_password' => $result[0]->password,
						'user_nama' 	=> $result[0]->nama,
						'role'			=> 'Panitia'
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);

					redirect('welcome/index',$data);
				} else {
					echo "string";
				}
			} else {
				$data = array(
					'error_message' => '<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Invalid Username or Password.
                                </div>'
				);
				$this->load->view('login/index', $data);
			}
			}

		}
	}

	public function log_out() {
	// Hapus semua data pada session
    $this->session->sess_destroy();
 	$data = array(
					'logout_message' => 'Logout successfully'
				);
    // redirect ke halaman login	
    redirect('login/index',$data);
	}

}


