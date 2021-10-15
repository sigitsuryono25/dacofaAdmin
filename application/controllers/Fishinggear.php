<?php

/**
 * include file Basecontroller
 * so we can extends into it.
 *  
 * */
include_once(dirname(__FILE__) . "/Basecontroller.php");

class Fishinggear extends Basecontroller
{
	public function daftarFishinggear()
	{
		$this->load->view('headfoot/header');
		$data['fishing'] = $this->fishing->getAllFishingGear("*")->result();
		$this->load->view('fishing-gear/daftar-fishing-gear', $data);
		$this->load->view('headfoot/footer');
	}


	public function add()
	{
		$this->load->view('headfoot/header');
		$this->load->view('fishing-gear/add-fishing-gear');
		$this->load->view('headfoot/footer');
	}

	public function addFishinggear()
	{
		/* 
		 * i'm not using form validation. You can used that in here
		 * 
		 * */
		$name = $this->input->post('nama_fishing_gear');
		$extras = $this->input->post('extras');
		$state = $this->input->post('state');


		$data = [
			'nama_fishing_gear' => $name,
			'extras' =>$extras,
			'state' => $state
		];

		$ins = $this->crud->addData('tb_fishing_gear', $data);
		if ($ins) {
			redirect('fishing-gear/list');
		} else {
			anchor(site_url('fishing-gear/form-add'));
		}
	}

	public function formEditFishinggear()
	{
		$id = $this->input->get('id');

		$this->load->view('headfoot/header');
		$data['fishing'] = $this->fishing->getFishingGearWhere("*", ['id' => $id])->row();
		$this->load->view('fishing-gear/edit-fishing-gear', $data);
		$this->load->view('headfoot/footer');
	}

	public function updateFishinggear()
	{
		$name = $this->input->post('nama_fishing_gear');
		$extras = $this->input->post('extras');
		$state = $this->input->post('state');
		$id = $this->input->post('id');
		
		$data = [
			'nama_fishing_gear' => $name,
			'extras' =>$extras,
			'state' => $state
		];

		$where = ['id' => $id];

		$ins = $this->crud->updateData('tb_fishing_gear', $data, $where);
		if ($ins) {
			redirect('fishing-gear/list');
		} else {
			//redirect to form edit
			redirect(site_url('fishing-gear/form-edit?id=' . $id));
		}
	}

	public function deleteFishinggear()
	{
		$id = $this->input->get('id');
		$where = ['id' => $id];
		$del = $this->crud->deleteData('tb_fishing_gear', $where);
		if ($del) {
			redirect('fishing-gear/list');
		} else {
			//redirect to form edit
			echo "Deleting data failed. Go back " . anchor(site_url('fishing-gear/list'), "here.");
		}
	}
}
