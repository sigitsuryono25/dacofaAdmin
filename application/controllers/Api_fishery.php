<?php

include_once(dirname(__FILE__) . "/Baseapi.php");

class Api_fishery extends Baseapi 
{
	public function retrieveData()
	{
		$json = file_get_contents("php://input");
		$re = json_decode($json, true);


		$insDetail = $this->db->insert_batch('tb_detail_tangkapan', $re['detail']);
		$insHeader = $this->db->insert_batch('tb_lokasi', $re['lokasi']);

		if($insDetail && $insHeader){
			$this->success();
		}else{
			$this->internalError();
		}
	}

	public function getData()
	{
		$userid = $this->input->get('userid');
		$header = $this->db->query("SELECT tb_lokasi.*, tb_user.nama FROM tb_lokasi 
		INNER JOIN tb_user ON tb_lokasi.userid=tb_user.userid 
		WHERE tb_lokasi.userid in ('$userid')")->result();
		
		$data = [];
		foreach($header as $h){
			$tmp = [];
			$tmp['id'] = $h->id;
			$tmp['tanggal'] = $h->tanggal;
			$tmp['alat_tangkap'] = $h->alat_tangkap;
			$tmp['lainnya'] = $h->lainnya;
			$tmp['ukuran_jaring'] = $h->ukuran_jaring;
			$tmp['jumla_alat'] = $h->jumla_alat;
			$tmp['id_negara'] = $h->id_negara;
			$tmp['id_provinsi'] = $h->id_provinsi;
			$tmp['id_kabupaten'] = $h->id_kabupaten;
			$tmp['area'] = $h->area;
			$tmp['lokasi'] = $h->lokasi;
			$tmp['lama_operasi'] = $h->lama_operasi;
			$tmp['userid'] = $h->userid;
			$tmp['nama'] = $h->nama;
			$tmp['detail'] = $this->db->query("SELECT * FROM tb_detail_tangkapan WHERE id_header IN ('$h->id')")->result();

			array_push($data, $tmp);
		}

		echo json_encode(['data_fishery' =>$data]);
	}
}

