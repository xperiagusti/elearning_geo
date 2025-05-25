<?php

class Auth_model extends CI_Model{
	
	// Register
	public function register(){
		date_default_timezone_set('Asia/Jakarta');
		$time = date("Y/m/d H:i:s");
		$data = [
				'nama_depan' => $this->input->post('nama_depan'),
				'nama_belakang' => $this->input->post('nama_belakang'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
				'role_id' => 2,
				'date_created' => $time
			];
		$this->db->insert('users',$data);
	}

	public function tambah_akun(){
		date_default_timezone_set('Asia/Jakarta');
		$time = date("Y/m/d H:i:s");
		$data = [
				'nama_depan' => $this->input->post('nama_depan'),
				'nama_belakang' => $this->input->post('nama_belakang'),
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
				'role_id' => $this->input->post('role_id'),
				'date_created' => $time
			];
		$this->db->insert('users',$data);
	}

	public function ubah(){
		$data = [
				'nama_depan' => $this->input->post('nama_depan'),
				'nama_belakang' => $this->input->post('nama_belakang'),
				'email' => $this->input->post('email'),
			];
		$this->db->insert('users',$data);
	}


}