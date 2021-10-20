<?php

class Report extends CI_Controller
{

	public function index()
	{
		$this->load->view('headfoot/header');
		$data['user'] = $this->user->getAllUser()->result();
		$this->load->view('report/pick-tanggal', $data);
		$this->load->view('headfoot/footer');
	}

	function report()
	{
		$start = $this->input->get_post('start');
		$end = $this->input->get_post('end');
		$username = $this->input->get_post('userid');		
		$data['lokasi'] = $this->db->query("SELECT * FROM `tb_lokasi` 
		INNER JOIN tb_user ON tb_lokasi.userid=tb_user.userid
		WHERE tanggal BETWEEN '$start' AND '$end' AND tb_lokasi.userid IN ('$username')")->result();
		$this->load->view('headfoot/header');
		$this->load->view('report/report', $data);
		$this->load->view('headfoot/footer');
	}
}
