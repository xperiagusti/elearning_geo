<?php

class Auth extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		//cek session
		if($this->session->userdata('login') == 'yes' && $this->session->userdata('role_id') == '1'){
			redirect('admin');
		}
		else if($this->session->userdata('login') == 'yes' && $this->session->userdata('role_id') == '2'){
			redirect('user');
		}
		$this->load->library('form_validation');
		$this->load->model('Auth_model');
		// $this->load->model('Info_model');

	}

	public function index(){
		// rules form validation
		// required, form harus diisi
		// trim untuk menghapus whitespace (spasi)
		// valid email untuk cek itu adalah format email yg valid (user@web.com)
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('password','Password','required|trim');
		
		if($this->form_validation->run() == false){
			//jika user pass salah
			$this->load->view('auth/login');
		}
		else{
			// jika user pass benar dikirim ke _login
			$this->_login();
		}
	}

	// function untuk proses login
	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('users',['email' => $email])->row_array();
		
		// cek jika user ada
		if($user){ 
			if(password_verify($password, $user['password'])){
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id'],
						'login'	 => 'yes'
					];
					$this->session->set_userdata($data);
					if($user['role_id'] == 1){
						redirect('admin');
					}
					else{
						redirect('user');
					}
				}
				else{
					$this->session->set_flashdata('message','<div class="alert alert-danger">Password salah!</div>');
					redirect('auth');
				}
		}
		else{
			// cek jika user tidak ada kasih pesan kesalahan
			$this->session->set_flashdata('message','<div class="alert alert-danger">Email tidak terdaftar.</div>');
			redirect('auth');
		}
	}

	public function register(){

		// rules form validation
		// required, form harus diisi
		// trim untuk menghapus whitespace (spasi)
		// valid email untuk cek itu adalah format email yg valid (user@web.com)
		// is_unique = email hanya satu, mengecek ke database apakah email sudah terdaftar
		// min_lenght[8] =  minimal password 8 karakter
		// mathces = menyamakan password
		$this->form_validation->set_rules('nama_depan','nama depan','required|trim');
		$this->form_validation->set_rules('nama_belakang', 'nama belakang', 'required|trim');
		$this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[users.email]',[
			'is_unique' => 'Email telah terdaftar!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]',[ 
			'matches' => 'Password tidak sama!'
		]);
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');

		if($this->form_validation->run() == false){
			$this->load->view('auth/register_siswa');
		}
		else{
			$this->Auth_model->register();
			$this->session->set_flashdata('message','<div class="alert alert-success">Selamat! anda telah terdaftar, silahkan login.</div>');
			redirect('auth');
		}
	}

	public function blocked(){
		$this->load->view('auth/blocked');
	}

	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'nakersemarang@gmail.com',
			'smtp_pass' => 'disnaker123',
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			//'newline' => '\r\n'
			//'charset'   => 'iso-8859-1'
		];

		//$this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n");

		$this->load->library('email', $config);

		$this->email->from('nakersemarang@gmail.com', 'Disnaker');
		$this->email->to($this->input->post('email'));

		if ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetPass?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

	public function forgotPass()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if ($this->form_validation->run() == false) {

			$data['title'] = 'Admin Dashboard';

			$this->load->view('auth/forgotPass');
		} else {
			$email = $this->input->post('email');
			$user = $this->db->get_where('users', ['email' => $email])->row_array();

			if ($user) {
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];
				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');

				$this->session->set_flashdata('message', '<div class="alert alert-success">Chek your Email.</div>');
				redirect('auth/forgotPass');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger">Email tidak terdaftar.</div>');
				redirect('auth/forgotPass');
			}
		}
	}


	public function resetPass()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('users', ['email' => $email])->row_array();

		if ($user) {
			$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

			if ($user_token) {
				$this->session->set_userdata('reset_email', $email);
				$this->changePass();
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
			redirect('auth');
		}
	}

	public function changePass()
	{
		if (!$this->session->userdata('reset_email')) {
			redirect('auth');
		}

		$this->form_validation->set_rules('password1', 'password', 'trim|required|min_length[8]|matches[password2]');
		$this->form_validation->set_rules('password2', 'repeat password', 'trim|required|min_length[8]|matches[password1]');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Admin Dashboard';

			$this->load->view('auth/changePass');
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email = $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('users');

			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil di ubah.</div>');
			redirect('auth');
		}
	}
}
?>