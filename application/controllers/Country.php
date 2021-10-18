<?php

/**
 * include file Basecontroller
 * so we can extends into it.
 *  
 * */
include_once(dirname(__FILE__) . "/Basecontroller.php");

class Country extends Basecontroller
{
	public function daftarCountry()
	{
		$this->load->view('headfoot/header');
		$data['country'] = $this->country->getAllCountry("*")->result();
		$this->load->view('country/daftar-country', $data);
		$this->load->view('headfoot/footer');
	}

	public function cariNegara()
	{
		$namaNegara = $this->input->get_post('q');
		$negara = $this->country->getCountryWhere("name as label, alpha_2 as value", "name LIKE '$namaNegara%'")->result();
		if (!empty($negara)) {
			echo json_encode($negara);
		} else {
			echo json_encode(['message' => 'negara not found', 'code' => 404]);
		}
	}
	public function cariMataUang()
	{
		$namaNegara = $this->input->get_post('q');
		$negara = $this->country->getCountryWhere("*", "name LIKE '$namaNegara%'")->result();

		if (!empty($negara)) {
			$mataUang = [];
			foreach ($negara as $n) {
				$tmp = [];
				$tmp['label'] = $n->name . " ($n->currencies)";
				$tmp['value'] = $n->name . " ($n->currencies)";
				array_push($mataUang, $tmp);
			}
			echo json_encode($mataUang);
		}
	}


	function add()
	{
		$this->load->view('headfoot/header');
		$this->load->view('country/add-country');
		$this->load->view('headfoot/footer');
	}

	public function addCountry()
	{
		/* 
		 * i'm not using form validation. You can used that in here
		 * 
		 * */

		$idNegara = $this->input->post('id_negara');
		$namaNegara = $this->input->post('nama_negara');
		$extras = $this->input->post('extras');
		$currency = $this->input->post('currency');
		$state = $this->input->post('state');


		$data = [
			'id_negara' => $idNegara,
			'nama_negara' => $namaNegara,
			'extras' => $extras,
			'currency' => $currency,
			'state' => $state
		];

		$ins = $this->crud->addData('tb_negara', $data);
		if ($ins) {
			redirect('country/list');
		} else {
			anchor(site_url('country/form-add'));
		}
	}

	public function formEditCountry()
	{
		$idNegara = $this->input->get('id_negara');

		$this->load->view('headfoot/header');
		$data['country'] = $this->country->getCountryWhere("*", ['id_negara' => $idNegara])->row();
		$this->load->view('country/edit-country', $data);
		$this->load->view('headfoot/footer');
	}

	public function updateCountry()
	{
		$idNegara = $this->input->post('id_negara');
		$namaNegara = $this->input->post('nama_negara');
		$extras = $this->input->post('extras');
		$currency = $this->input->post('currency');
		$state = $this->input->post('state');

		$data = [
			'nama_negara' => $namaNegara,
			'extras' => $extras,
			'currency' => $currency,
			'state' => $state
		];
		$where = ['id_negara' => $idNegara];

		$ins = $this->crud->updateData('tb_negara', $data, $where);
		if ($ins) {
			redirect('country/list');
		} else {
			//redirect to form edit
			redirect(site_url('country/form-edit?id_negara=' . $idNegara));
		}
	}

	public function deleteCountry()
	{
		$idNegara = $this->input->get('id_negara');
		$where = ['id_negara' => $idNegara];
		$del = $this->crud->deleteData('tb_negara', $where);
		if ($del) {
			redirect('country/list');
		} else {
			//redirect to form edit
			echo "Deleting data failed. Go back " . anchor(site_url('country/list'), "here.");
		}
	}
}
