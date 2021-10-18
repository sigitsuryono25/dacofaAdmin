<?php

/**
 * include file Basecontroller
 * so we can extends into it.
 *  
 * */
include_once(dirname(__FILE__) . "/Basecontroller.php");

class District extends Basecontroller
{
	public function daftarDistrict()
	{
		$this->load->view('headfoot/header');
		$data['district'] = $this->district->getAllDistrict("*, wilayah_kabupaten.id as id_kab, wilayah_kabupaten.nama as kab, wilayah_kabupaten.state as kab_state")->result();
		$this->load->view('district/daftar-district', $data);
		$this->load->view('headfoot/footer');
	}

	public function cariKabupaten()
	{
		$namaKabupaten = $this->input->get_post('q');
		$idProvinsi = $this->input->get_post('id');
		$kabupaten = $this->district->getDistrictWhere("wilayah_kabupaten.nama as label, wilayah_kabupaten.id as value", "wilayah_kabupaten.nama LIKE '%$namaKabupaten%' AND provinsi_id IN ('$idProvinsi')")->result();
		if (empty($idProvinsi)) {
			die(json_encode(['label' => 'Please Select Country First', 'value' => '']));
		}

		if (!empty($kabupaten)) {
			echo json_encode($kabupaten);
		} 
	}


	function add()
	{
		$this->load->view('headfoot/header');
		$data['country'] = $this->country->getCountryWhere("*", "alpha_2 IN ('ID','MY','TH')")->result();
		$data['province'] = $this->province->getAllProvince()->result();
		$this->load->view('district/add-district', $data);
		$this->load->view('headfoot/footer');
	}

	public function addDistrict()
	{
		/* 
		 * i'm not using form validation. You can used that in here
		 * 
		 * */

		$province = $this->input->post('province');
		$nama = $this->input->post('nama');
		$state = $this->input->post('state');


		$data = [
			'provinsi_id' => $province,
			'nama' => $nama,
			'state' => $state
		];

		$ins = $this->crud->addData('wilayah_kabupaten', $data);
		if ($ins) {
			redirect('district/list');
		} else {
			anchor(site_url('district/form-add'));
		}
	}

	public function formEditDistrict()
	{
		$idDistrict = $this->input->get('id_district');

		$this->load->view('headfoot/header');
		$data['district'] = $this->district->getDistrictWhere("*, wilayah_kabupaten.id as id_kab, wilayah_kabupaten.nama as kab, wilayah_kabupaten.state as kab_state", ['wilayah_kabupaten.id' => $idDistrict])->row();
		$data['country'] = $this->country->getAllCountry()->result();
		$data['province'] = $this->province->getProvinceWhere("*", ['country_code' => $data['district']->alpha_2])->result();
		$this->load->view('district/edit-district', $data);
		// print_r($data['province']);
		$this->load->view('headfoot/footer');
	}

	public function updateDistrict()
	{
		$idDistrict = $this->input->post('id_district');
		$nama = $this->input->post('nama');
		$province = $this->input->post('province');
		$state = $this->input->post('state');

		$data = [
			'provinsi_id' => $province,
			'nama' => $nama,
			'state' => $state
		];
		$where = ['wilayah_kabupaten.id' => $idDistrict];

		$ins = $this->crud->updateData('wilayah_kabupaten', $data, $where);
		if ($ins) {
			redirect('district/list');
		} else {
			//redirect to form edit
			redirect(site_url('district/form-edit?id_district=' . $idDistrict));
		}
	}

	public function deleteDistrict()
	{
		$idDistrict = $this->input->get('id_district');
		$where = ['wilayah_kabupaten.id' => $idDistrict];
		$del = $this->crud->deleteData('wilayah_kabupaten', $where);
		if ($del) {
			redirect('district/list');
		} else {
			//redirect to form edit
			echo "Deleting data failed. Go back " . anchor(site_url('district/list'), "here.");
		}
	}
}
