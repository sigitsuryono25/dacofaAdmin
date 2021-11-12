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
		$data['lokasi'] = $this->db->query("SELECT * FROM `tb_lokasi` 
		INNER JOIN tb_user ON tb_lokasi.userid=tb_user.userid
		WHERE tanggal BETWEEN '$start' AND '$end' AND tb_lokasi.userid IN ('$username')")->result();
		$this->load->view('headfoot/header');
		$this->load->view('report/report', $data);
		$this->load->view('headfoot/footer');
	}
		public function statistik()
	{
		// $data['ikan'] = ;
		$this->load->view('headfoot/header');
		$this->load->view('report/statistik');
		$this->load->view('headfoot/footer');
	}

	function showStatisikIkan()
	{
		$ikan = $this->db->query("SELECT SUM(total_tangkapan) as total, id_ikan FROM `tb_detail_tangkapan` GROUP BY id_ikan")->result();
		$randwarna = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
		foreach ($ikan as $key => $ii) {
			if ($key <= 9) {
				$title[] = $ii->id_ikan;
				$total[] = $ii->total;
				$warna[] = $randwarna;
			}
		}

		echo json_encode(['title' => $title, 'total' => $total, 'colors' => $warna]);
	}

	function showDaerahPalingBanyakHasilnya()
	{
		$daerah = $this->db->query("SELECT DISTINCT (id_kabupaten) as kab FROM `tb_lokasi` INNER JOIN tb_detail_tangkapan ON tb_lokasi.id=tb_detail_tangkapan.id_header LIMIT 10")->result();
		foreach ($daerah as $dd) {
			$namaDaerah[] = $dd->kab;
			$warna[] = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
				$ikan = $this->db->query("SELECT SUM(total_tangkapan) as total FROM `tb_detail_tangkapan` INNER JOIN tb_lokasi ON tb_lokasi.id=tb_detail_tangkapan.id_header WHERE id_kabupaten IN ('$dd->kab') ")->result();
				foreach ($ikan as $key => $iik) {
					if ($key <= 9) {
						$total[] = $iik->total;
					}
				}
		}
		
		echo json_encode(['title' => $namaDaerah, 'total' => $total, 'colors' => $warna]);
	}

	public function statistikAlat()
	{
		$alat = $this->db->query("SELECT * FROM `tb_fishing_gear`")->result();
		$randwarna = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
		foreach ($alat as $aa) {
			$namaAlat[] = $aa->nama_fishing_gear;
			$warna[] = $randwarna;

			$jumlahAlat = $this->db->query("SELECT COUNT(alat_tangkap) as total FROM tb_lokasi WHERE alat_tangkap LIKE '%$aa->nama_fishing_gear%'")->row();
			if (!empty($jumlahAlat)) {
				$data[] = $jumlahAlat->total;
			} else {
				$data[] = 0;
			}
		}

		echo json_encode(['title' => $namaAlat, 'total' => $data, 'colors' => $warna]);
	}
}
