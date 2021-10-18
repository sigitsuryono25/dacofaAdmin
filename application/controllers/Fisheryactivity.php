<?php

/**
 * include file Basecontroller
 * so we can extends into it.
 *  
 * */
include_once(dirname(__FILE__) . "/Basecontroller.php");

class Fisheryactivity extends Basecontroller
{
	function index()
	{
		$data['fishery'] = $this->db->query("SELECT * FROM tb_lokasi INNER JOIN tb_user ON tb_lokasi.userid=tb_user.userid")->result();
		$this->load->view('headfoot/header');
		$this->load->view('fishery/daftar-fishery', $data);
		$this->load->view('headfoot/footer');
	}

	public function add()
	{
		$this->load->view('headfoot/header');
		$this->load->view('fishery/add-fishery');
		$this->load->view('headfoot/footer');
	}

	public function addFisheryActivity()
	{
		$headerId = time();

		$userid = $this->input->post('userid');
		$idNegara = $this->input->post('id_negara');
		$tanggal = $this->input->post('tanggal');
		$id_provinsi = $this->input->post('id_provinsi');
		$alat_tangkap = $this->input->post('alat_tangkap');
		$id_kabupaten = $this->input->post('id_kabupaten');
		$lainnya = $this->input->post('lainnya');
		$area = $this->input->post('area');
		$lokasi = $this->input->post('lokasi');
		$ukuran_jaring = $this->input->post('ukuran_jaring');
		$lama_operasi = $this->input->post('lama_operasi');
		$jumlah_alat = $this->input->post('jumlah_alat');

		$idIkan = $this->input->post('id_ikan');
		$total_tangkapan = $this->input->post('total_tangkapan');
		$mata_uang = $this->input->post('mata_uang');
		$peruntukan= $this->input->post('peruntukan');
		$harga = $this->input->post('harga');

		$dataDetail = [];
		foreach($idIkan as $key=>$ik){
			$tmp = [];
			$tmp['id_detail '] = time() * ($key + 5);
			$tmp['id_header'] = $headerId;
			$tmp['id_ikan'] = $ik;
			$tmp['total_tangkapan'] = $total_tangkapan[$key];
			$tmp['mata_uang'] = $mata_uang[$key];
			$tmp['harga'] = $harga[$key];
			$tmp['peruntukan'] = $peruntukan[$key];
			array_push($dataDetail, $tmp);
		}

		$dataHeader = [
			'id' => $headerId,
			'tanggal' => $tanggal,
			'alat_tangkap' => $alat_tangkap,
			'lainnya' => $lainnya,
			'ukuran_jaring' => $ukuran_jaring,
			'jumla_alat' => $jumlah_alat,
			'id_negara' => $idNegara,
			'id_provinsi' => $id_provinsi,
			'id_kabupaten' => $id_kabupaten,
			'area' => $area,
			'lokasi' => $lokasi,
			'lama_operasi' => $lama_operasi,
			'userid' => $userid,
		];

		//insert header
		$insHeader = $this->db->insert('tb_lokasi', $dataHeader);

		//insert batch
		$insertDetail = $this->db->insert_batch('tb_detail_tangkapan', $dataDetail);

		if($insHeader && $insertDetail){
			redirect('fishery-activity');
		}else{
			echo "something wrong";
		}
	}

	function hasilTangkapan($idLokasi)
	{
		$data['fishery'] = $this->db->query("SELECT * FROM tb_lokasi INNER JOIN tb_user ON tb_lokasi.userid=tb_user.userid WHERE id IN ('$idLokasi')")->row();
		$data['hasil'] = $this->db->query("SELECT * FROM tb_detail_tangkapan WHERE id_header IN ('$idLokasi')")->result();
		$this->load->view('headfoot/header');
		$this->load->view('fishery/detail-tangkapan', $data);
		$this->load->view('headfoot/footer');
	}

	public function deleteActivity($id)
	{
		//delete fishery and detail
		$header = $this->db->delete('tb_lokasi', ['id' => $id]);
		$detail = $this->db->delete('tb_detail_tangkapan', ['id_header' => $id]);

		redirect('fishery-activity');
	}
}
