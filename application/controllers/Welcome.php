<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->view('auth');
	}

	public function authProc()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$md5Pass = md5($password);
		
		$user = $this->user->getUserWhere("*", ['userid' => $username, 'passwd' => $md5Pass])->row_array();
		if(!empty($user)){
			$this->session->set_userdata($user);
			echo json_encode(['message'=> "selamat datang,". $user['nama'], 'code' => 200]);
		}else{
			echo json_encode(['message'=> "Data Tidak ada", 'code' => 404]);
		}
		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url());
	}

}
