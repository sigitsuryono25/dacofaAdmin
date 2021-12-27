<?php

/**
 * include file Basecontroller
 * so we can extends into it.
 *  
 * */
include_once(dirname(__FILE__) . "/Basecontroller.php");

class Report extends Basecontroller
{

	public function index()
	{
		$this->load->view('headfoot/header');
		$data['user'] = $this->user->getAllUser()->result();
		$this->load->view('report/pick-tanggal', $data);
		$this->load->view('headfoot/footer');
	}

	function showReport()
	{
		$start = $this->input->get_post('start');
		$end = $this->input->get_post('end');
		$username = $this->input->get_post('userid');
		if ($username == "all") {
			redirect(site_urL("report/showReportAllUser?start=$start&end=$end"));
			return;
		}
		$data['lokasi'] = $this->db->query("SELECT * FROM `tb_lokasi` 
		INNER JOIN tb_user ON tb_lokasi.userid=tb_user.userid
		WHERE tanggal BETWEEN '$start' AND '$end' AND tb_lokasi.userid IN ('$username')")->result();
		$this->load->view('headfoot/header');
		$this->load->view('report/report', $data);
		$this->load->view('headfoot/footer');
	}

	function showReportAllUser()
	{
		$data['start'] = $this->input->get_post('start');
		$data['end'] = $this->input->get_post('end');
		$data['user'] = $this->db->query("SELECT * FROM tb_user")->result();
		$this->load->view('headfoot/header');
		$this->load->view('report/all-report', $data);
		$this->load->view('headfoot/footer');
	}

	public function showPickStatistic()
	{
		$this->load->view('headfoot/header');
		$this->load->view('report/statistic-pick-date');
		$this->load->view('headfoot/footer');
	}

	public function statistik()
	{
		$start = $this->input->get('start');
		$end = $this->input->get('end');

		$this->load->view('headfoot/header');
		$data['fishing_gear'] = $this->db->query("SELECT alat_tangkap FROM `tb_lokasi` WHERE DATE(tanggal) BETWEEN '$start' AND '$end' GROUP BY alat_tangkap")->result();
		
		$data['total_data'] = $this->db->query("SELECT SUM(total_tangkapan) as 
		total, id_ikan FROM `tb_detail_tangkapan` INNER JOIN tb_lokasi ON tb_detail_tangkapan.id_header=tb_lokasi.id
		 WHERE DATE(tanggal) BETWEEN '$start' AND '$end' GROUP BY id_ikan")->row_array();
		
		$data['lokasi'] = $this->db->query("SELECT DISTINCT id_kabupaten FROM `tb_lokasi` WHERE DATE(tanggal) BETWEEN '$start' AND '$end'")->result();
			
		$data['jenis_ikan'] = $this->db->query("SELECT SUM(total_tangkapan) as 
		total, id_ikan FROM `tb_detail_tangkapan` INNER JOIN tb_lokasi ON tb_detail_tangkapan.id_header=tb_lokasi.id
		 WHERE DATE(tanggal) BETWEEN '$start' AND '$end' GROUP BY id_ikan")->result();
		
		$data['total_tangkap'] = $this->db->query("SELECT SUM(total_tangkapan) as 
		 total, id_ikan FROM `tb_detail_tangkapan` INNER JOIN tb_lokasi ON tb_detail_tangkapan.id_header=tb_lokasi.id
		  WHERE DATE(tanggal) BETWEEN '$start' AND '$end'")->row();
		$this->load->view('report/statistik', $data);
		$this->load->view('headfoot/footer');
	}

	function showStatisikIkan()
	{
		$start = $this->input->get('start');
		$end = $this->input->get('end');

		$ikan = $this->db->query("SELECT SUM(total_tangkapan) as 
		total, id_ikan FROM `tb_detail_tangkapan` INNER JOIN tb_lokasi ON tb_detail_tangkapan.id_header=tb_lokasi.id
		 WHERE DATE(tanggal) BETWEEN '$start' AND '$end' GROUP BY id_ikan")->result();
		foreach ($ikan as $key => $ii) {
			$randwarna = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
			if ($key <= 9) {
				$title[] = $ii->id_ikan;
				$total[] = round($ii->total, 2);
				$warna[] = $randwarna;
			}
		}

		echo json_encode(['title' => $title, 'total' => $total, 'colors' => $warna]);
	}

	function showDaerahPalingBanyakHasilnya()
	{
		$start = $this->input->get('start');
		$end = $this->input->get('end');
		$daerah = $this->db->query("SELECT DISTINCT (id_kabupaten) as kab FROM `tb_lokasi` INNER JOIN tb_detail_tangkapan ON tb_lokasi.id=tb_detail_tangkapan.id_header 
		WHERE DATE(tanggal) BETWEEN '$start' AND '$end' LIMIT 10")->result();
		foreach ($daerah as $dd) {
			$namaDaerah[] = $dd->kab;
			$warna[] = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
			$ikan = $this->db->query("SELECT SUM(total_tangkapan) as total FROM `tb_detail_tangkapan` INNER JOIN tb_lokasi ON tb_lokasi.id=tb_detail_tangkapan.id_header WHERE id_kabupaten IN ('$dd->kab') ")->result();
			foreach ($ikan as $key => $iik) {
				if ($key <= 9) {
					$total[] = round($iik->total, 2);
				}
			}
		}

		echo json_encode(['title' => $namaDaerah, 'total' => $total, 'colors' => $warna]);
	}

	public function statistikAlat()
	{
		$start = $this->input->get('start');
		$end = $this->input->get('end');
		$alat = $this->db->query("SELECT * FROM `tb_fishing_gear`")->result();
		$randwarna = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
		foreach ($alat as $aa) {
			$namaAlat[] = $aa->nama_fishing_gear;
			$warna[] = $randwarna;

			$jumlahAlat = $this->db->query("SELECT COUNT(alat_tangkap) as total FROM tb_lokasi WHERE alat_tangkap LIKE '%$aa->nama_fishing_gear%' 
			AND DATE(tanggal) BETWEEN '$start' AND '$end'")->row();
			if (!empty($jumlahAlat)) {
				$data[] = $jumlahAlat->total;
			} else {
				$data[] = 0;
			}
		}

		echo json_encode(['title' => $namaAlat, 'total' => $data, 'colors' => $warna]);
	}

	public function totalTangkapan()
	{
		$tgl = [];
		$total = [];
		$start = $this->input->get('start');
		$end = $this->input->get('end');
		$tangkapan = $this->db->query("SELECT * FROM `tb_lokasi` WHERE DATE(tanggal) BETWEEN '$start' AND '$end'")->result();
		foreach($tangkapan as $tkp){
			$sum = $this->db->query("SELECT SUM(total_tangkapan) as total FROM tb_detail_tangkapan WHERE id_header IN ('$tkp->id')")->row();
			if(!empty($sum) && $sum->total > 0){
				$tgl[] = $tkp->tanggal;
				$total[] = $sum->total; 
			}
		}

		echo json_encode(['title' => $tgl, 'total' => $total]);
	}
}
