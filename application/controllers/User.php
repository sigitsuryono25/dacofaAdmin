<?php

/**
 * include file Basecontroller
 * so we can extends into it.
 *  
 * */
include_once(dirname(__FILE__) . "/Basecontroller.php");

class User extends Basecontroller
{

	public function daftaruser()
	{
		$this->load->view('headfoot/header');
		$data['user'] = $this->user->getAllUser("*")->result();
		$this->load->view('user/daftar-user', $data);
		$this->load->view('headfoot/footer');
	}

	public function cariUser()
	{
		$namaUser = $this->input->get_post('q');
		$user = $this->user->getUserWhere("nama as label, userid as value", "nama LIKE '$namaUser%'")->result();
		if (!empty($user)) {
			echo json_encode($user);
		}
	}


	function add()
	{
		$this->load->view('headfoot/header');
		$this->load->view('user/add-user');
		$this->load->view('headfoot/footer');
	}

	public function addUser()
	{
		/* 
		 * i'm not using form validation. You can used that in here
		 * 
		 * */

		$username = $this->input->post('userid');
		$password = $this->input->post('passwd');
		$nama = $this->input->post('nama');
		$phone = $this->input->post('phone');
		$role = $this->input->post('role');
		$state = $this->input->post('state');


		$data = [
			'userid' => $username,
			'passwd' => md5($password),
			'nama' => $nama,
			'phone' => $phone,
			'role' => $role,
			'state' => $state
		];

		$ins = $this->crud->addData('tb_user', $data);
		if ($ins) {
			redirect('user/user-list');
		} else {
			anchor(site_url('user/form-add'));
		}
	}

	public function formEditUser()
	{
		$userid = $this->input->get('userid');

		$this->load->view('headfoot/header');
		$data['user'] = $this->user->getUserWhere("*", ['userid' => $userid])->row();
		$this->load->view('user/edit-user', $data);
		$this->load->view('headfoot/footer');
	}

	public function updateUser()
	{
		$username = $this->input->post('userid');
		$password = $this->input->post('passwd');
		$nama = $this->input->post('nama');
		$phone = $this->input->post('phone');
		$role = $this->input->post('role');
		$state = $this->input->post('state');

		$data = [
			'userid' => $username,
			'nama' => $nama,
			'phone' => $phone,
			'role' => $role,
			'state' => $state
		];
		$where = ['userid' => $username];

		//if password not empty, update password too.
		if (!empty($password)) {
			$data['passwd'] = md5($password);
		}

		$ins = $this->crud->updateData('tb_user', $data, $where);
		if ($ins) {
			redirect('user/user-list');
		} else {
			//redirect to form edit
			redirect(site_url('user/form-edit?userid=' . $username));
		}
	}

	public function deleteUser()
	{
		$userid = $this->input->get('userid');
		$where = ['userid' => $userid];
		$del = $this->crud->deleteData('tb_user', $where);
		if ($del) {
			redirect('user/user-list');
		} else {
			//redirect to form edit
			echo "Deleting data failed. Go back " . anchor(site_url('user/user-list'), "here.");
		}
	}
}
