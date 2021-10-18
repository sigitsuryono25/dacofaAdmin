<?php

/**
 * include file Basecontroller
 * so we can extends into it.
 *  
 * */
include_once(dirname(__FILE__) . "/Basecontroller.php");

class Fish extends Basecontroller
{
	public function daftarFish()
	{
		$this->load->view('headfoot/header');
		$data['fish'] = $this->fish->getAllFish("*")->result();
		$this->load->view('fish/daftar-fish', $data);
		$this->load->view('headfoot/footer');
	}

	public function cariIkan()
	{
		$namaIkan = $this->input->get_post('q');
		$ikan = $this->fish->getFishWhere("nama_ikan as label, nama_ikan as value", "nama_ikan LIKE '%$namaIkan%'")->result();
		if(!empty($ikan)){
			echo json_encode($ikan);
		}else{
			echo json_encode(['message' => 'negara not found', 'code' => 404]);
		}
		
	}


	function add()
	{
		$this->load->view('headfoot/header');
		$this->load->view('fish/add-fish');
		$this->load->view('headfoot/footer');
	}

	public function addFish()
	{
		/* 
		 * i'm not using form validation. You can used that in here
		 * 
		 * */

		$namaIkan = $this->input->post('nama_ikan');
		$state = $this->input->post('state');


		$data = [
			'nama_ikan' => $namaIkan,
			'state' => $state
		];

		$ins = $this->crud->addData('tb_ikan', $data);
		if ($ins) {
			redirect('fish/list');
		} else {
			anchor(site_url('fish/form-add'));
		}
	}

	public function formEditFish()
	{
		$idIkan = $this->input->get('id_ikan');

		$this->load->view('headfoot/header');
		$data['fish'] = $this->fish->getFishWhere("*", ['id' => $idIkan])->row();
		$this->load->view('fish/edit-fish', $data);
		$this->load->view('headfoot/footer');
	}

	public function updateFish()
	{
		$idIkan = $this->input->post('id_ikan');
		$namaIkan = $this->input->post('nama_ikan');
		$state = $this->input->post('state');

		$data = [
			'nama_ikan' => $namaIkan,
			'state' => $state
		];
		$where = ['id' => $idIkan];

		$ins = $this->crud->updateData('tb_ikan', $data, $where);
		if ($ins) {
			redirect('fish/list');
		} else {
			//redirect to form edit
			redirect(site_url('fish/form-edit?id_ikan=' . $idIkan));
		}
	}

	public function deleteFish()
	{
		$idIkan = $this->input->get('id_ikan');
		$where = ['id' => $idIkan];
		$del = $this->crud->deleteData('tb_ikan', $where);
		if ($del) {
			redirect('fish/list');
		} else {
			//redirect to form edit
			echo "Deleting data failed. Go back " . anchor(site_url('fish/list'), "here.");
		}
	}
}
