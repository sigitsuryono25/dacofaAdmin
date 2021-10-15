<?php

class Api_lokasi extends Baseapi
{
	public function tambahLokasi()
	{
		//receive json input
		$in = file_get_contents("php://input");

		//decode to array
		$json = json_decode($in);

		//print using print_r

		print_r($json);
	}

	public function getListLokasi()
	{
		$userid = $this->input->get('userid');
		$daftarLokasi = $this->db->query("SELECT * FROM tb_lokasi WHERE userid IN ('$userid')")->result();
		if (!empty($daftarLokasi)) {
			$this->success("data ditemukan", 'data_lok', $daftarLokasi);
		} else {
			$this->notFound();
		}
	}
}
