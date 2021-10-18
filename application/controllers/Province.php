<?php

/**
 * include file Basecontroller
 * so we can extends into it.
 *  
 * */
include_once(dirname(__FILE__) . "/Basecontroller.php");

class Province extends Basecontroller
{
	public function daftarProvince()
	{
		$this->load->view('headfoot/header');
		$data['province'] = $this->province->getAllProvince("*")->result();
		$this->load->view('province/daftar-province', $data);
		$this->load->view('headfoot/footer');
	}


	function add()
	{
		$this->load->view('headfoot/header');
		$this->load->view('province/add-province');
		$this->load->view('headfoot/footer');
	}

	public function cariProvinsi()
	{
		$namaProvinsi = $this->input->get_post('q');
		$idNegara = $this->input->get_post('id');
		$provinsi = $this->province->getProvinceWhere("wilayah_provinsi.nama as label, wilayah_provinsi.id as value", "nama LIKE '%$namaProvinsi%' AND country_code IN ('$idNegara')")->result();
		if (empty($idNegara)) {
			die(json_encode(['label' => 'Please Select Country First', 'value' => '']));
		}

		if (!empty($provinsi)) {
			echo json_encode($provinsi);
		} 
	}


	public function addProvince()
	{
		/* 
		 * i'm not using form validation. You can used that in here
		 * 
		 * */

		$countryCode = $this->input->post('country_code');
		$nama = $this->input->post('nama');
		$state = $this->input->post('state');


		$data = [
			'country_code' => $countryCode,
			'nama' => $nama,
			'state' => $state
		];

		$ins = $this->crud->addData('wilayah_provinsi', $data);
		if ($ins) {
			redirect('province/list');
		} else {
			anchor(site_url('province/form-add'));
		}
	}

	public function formEditProvince()
	{
		$id = $this->input->get('id');

		$this->load->view('headfoot/header');
		$data['province'] = $this->province->getProvinceWhere("*", ['id' => $id])->row();
		$this->load->view('province/edit-province', $data);
		$this->load->view('headfoot/footer');
	}

	public function updateProvince()
	{
		$countryCode = $this->input->post('country_code');
		$nama = $this->input->post('nama');
		$state = $this->input->post('state');
		$id = $this->input->post('id');


		$data = [
			'country_code' => $countryCode,
			'nama' => $nama,
			'state' => $state
		];

		$where = ['id' => $id];

		$ins = $this->crud->updateData('wilayah_provinsi', $data, $where);
		if ($ins) {
			redirect('province/list');
		} else {
			//redirect to form edit
			redirect(site_url('province/form-edit?id=' . $id));
		}
	}

	public function deleteProvince()
	{
		$id = $this->input->get('id');
		$where = ['id' => $id];
		$del = $this->crud->deleteData('wilayah_provinsi', $where);
		if ($del) {
			redirect('province/list');
		} else {
			//redirect to form edit
			echo "Deleting data failed. Go back " . anchor(site_url('province/list'), "here.");
		}
	}
}
