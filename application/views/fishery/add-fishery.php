<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h5 class="cart-title">Fishery Activity Add Form</h5>
		</div>
		<div class="card-body">
			<form action="<?= site_url('fishery-activity/action-insert') ?>" method="POST" autocomplete="off">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Surveyor</label>
							<input type="text" name="nama_user" placeholder="Search Surveyor" class="form-control" required>
							<input type="hidden" name="userid">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Country</label>
							<input type="text" name="id_negara" autocomplete="false" placeholder="Search Country" class="form-control" required>
							<input type="hidden" name="negara_id">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Date</label>
							<input type="date" name="tanggal" class="form-control" required>

						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Province</label>
							<input type="text" name="id_provinsi" placeholder="Search Province" class="form-control" required>
							<input type="hidden" name="provinsi_id">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Fishing Gear</label>
							<select name="alat_tangkap" class="form-control" required>
								<?php $alatTangkap = $this->fishing->getAllFishingGear()->result();
								foreach ($alatTangkap as $at) {
								?>
									<option value="<?= $at->nama_fishing_gear ?>"><?= $at->nama_fishing_gear ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>District</label>
							<input type="text" name="id_kabupaten" placeholder="Search District" class="form-control" required>
							<input type="hidden" name="kabupaten_id">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Other</label>
							<input type="text" name="lainnya" class="form-control" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Fishing Ground</label>
							<select name="area" class="form-control" required>
								<option value="Sungai">Sungai</option>
								<option value="Rawa">Rawa</option>
								<option value="Danau">Danau</option>
								<option value="Waduk">Waduk</option>
								<option value="Estuari">Estuari</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Location</label>
							<input type="text" name="lokasi" placeholder="Type name of Fishing Ground" class="form-control" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Mesh Size</label>
							<input type="text" name="ukuran_jaring" placeholder="Mesh Size" p class="form-control" required>
							<small class="text-danger">Gunakan titik (.) jika ukuran jaring bukan angka bulat </small>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Operation Hours</label>
							<input type="number" name="lama_operasi" class="form-control" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Amount of Fishing Gear</label>
							<input type="number" name="jumlah_alat" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="table-responsive">
					<h4>Hasil Tangkapan</h4>
					<table class="table table-sm table-bordered" id="detail">
						<thead>
							<tr>
								<th>Name of Fish</th>
								<th>Total Catch</th>
								<th>Currency</th>
								<th>Peruntukan</th>
								<th>Price</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr id="child-0">
								<td>
									<input type="text" name="id_ikan[]" id="ikan-0" onkeyup="cariIkan('ikan-0')" placeholder="Search Name of Fish" class="form-control">
								</td>
								<td>
									<input type="text" name="total_tangkapan[]" class="form-control">
								</td>
								<td>
									<input type="text" name="mata_uang[]" id="mata-uang-0" placeholder="Search by Country" onkeyup="cariMataUang(this)" class="form-control">
								</td>
								<td>
									<select name="peruntukan[]" class="form-control" id="untuk-0" onchange="enableHarga(this, 'harga-0')">
										<option value="Pribadi">Pribadi</option>
										<option value="Dijual">Dijual</option>
									</select>
								</td>
								<td>
									<input type="text" name="harga[]" value="0" id="harga-0" readonly placeholder="Search Name of Fish" class="form-control">
								</td>
								<td>
									<a href="javascript:void(0)" onclick="removeColom('0')" class="btn btn-danger">
										<i class="fas fa-trash "></i>&nbsp;&nbsp;&nbsp;
										Delete
									</a>
								</td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="6">
									<a href="javascript:void(0)" onclick="addColom()" class="btn btn-sm btn-success">
										<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
										Add Item
									</a>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
				<div class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-primary btn-sm">
							<i class="fas fa-save "></i>&nbsp;&nbsp;&nbsp;
							Save Data
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	var initKolom = 1;

	function addColom() {
		var str = `<tr id='child-${initKolom}'>
								<td>
									<input type="text" name="id_ikan[]" id="ikan-${initKolom}" onkeyup="cariIkan('ikan-${initKolom}')" placeholder="Search Name of Fish" class="form-control">
								</td>
								<td>
									<input type="text" name="total_tangkapan[]" class="form-control">
								</td>
								<td>
									<input type="text" name="mata_uang[]"  id="mata-uang-${initKolom}" placeholder="Search Name of Fish" onkeyup="cariMataUang(this)" class="form-control">
								</td>
								<td>
									<select name="peruntukan[]" class="form-control" onchange="enableHarga(this, 'harga-${initKolom}')">
										<option value="Pribadi">Pribadi</option>
										<option value="Dijual">Dijual</option>
									</select>
								</td>
								<td>
									<input type="text" name="harga[]" value="0" id="harga-${initKolom}" readonly placeholder="Search Name of Fish" class="form-control">
								</td>
								<td>
									<a href="javascript:void(0)" onclick="removeColom('${initKolom}')" class="btn btn-danger">
										<i class="fas fa-trash "></i>&nbsp;&nbsp;&nbsp;
										Delete
									</a>
								</td>
							</tr>`;
		$("#detail tbody").append(str);
		initKolom++;
	}

	function removeColom(initKolom) {
		if (confirm("Delete this row?")) {
			$(`#child-${initKolom}`).remove();
		}
	}
	$('[name="id_negara"]').autocomplete({
		source: function(req, res) {
			$.post('<?= site_url('country/action-search') ?>', {
				q: req.term
			}, function(data) {
				res(data);
			}, 'json')
		},
		select: function(ev, ui) {
			$('[name="id_negara"]').val(ui.item.label);
			$('[name="negara_id"]').val(ui.item.value);
			return false;
		},
		focus: function(ev, ui) {
			$('[name="id_negara"]').val(ui.item.label);
			return false;
		}
	});
	$('[name="id_provinsi"]').autocomplete({
		source: function(req, res) {
			$.post('<?= site_url('province/action-search') ?>', {
				q: req.term,
				id: $('[name="negara_id"]').val()
			}, function(data) {
				res(data);
			}, 'json')
		},
		select: function(ev, ui) {
			if (ui.item.value != "") {
				$('[name="id_provinsi"]').val(ui.item.label);
				$('[name="provinsi_id"]').val(ui.item.value);
			}
			return false;
		},
		focus: function(ev, ui) {
			if (ui.item.value != "") {
				$('[name="id_provinsi"]').val(ui.item.label);
				$('[name="provinsi_id"]').val(ui.item.value);
			}
			return false;
		}
	});

	$('[name="id_kabupaten"]').autocomplete({
		source: function(req, res) {
			$.post('<?= site_url('district/action-search') ?>', {
				q: req.term,
				id: $('[name="provinsi_id"]').val()
			}, function(data) {
				res(data);
			}, 'json')
		},
		select: function(ev, ui) {
			if (ui.item.value != "") {
				$('[name="id_kabupaten"]').val(ui.item.label);
				$('[name="kabupaten_id"]').val(ui.item.value);
			}
			return false;
		},
		focus: function(ev, ui) {
			if (ui.item.value != "") {
				$('[name="id_kabupaten"]').val(ui.item.label);
				$('[name="kabupaten_id"]').val(ui.item.value);
			}
			return false;
		}
	});
	$('[name="nama_user"]').autocomplete({
		source: function(req, res) {
			$.post('<?= site_url('user/action-search') ?>', {
				q: req.term,
			}, function(data) {
				res(data);
			}, 'json')
		},
		select: function(ev, ui) {
			if (ui.item.value != "") {
				$('[name="nama_user"]').val(ui.item.label);
				$('[name="userid"]').val(ui.item.value);
			}
			return false;
		},
		focus: function(ev, ui) {
			if (ui.item.value != "") {
				$('[name="nama_user"]').val(ui.item.label);
				$('[name="userid"]').val(ui.item.value);
			}
			return false;
		}
	});

	function enableHarga(e, idHarga) {
		console.log(e);
		if (e.value == "Dijual") {
			$(`#${idHarga}`).prop("readonly", false);
			$(`#${idHarga}`).focus();
			$(`#${idHarga}`).val("");
			$(`#${idHarga}`).prop("placeholder", "0");
		} else {
			$(`#${idHarga}`).prop("readonly", true);
			$(`#${idHarga}`).val("0");
		}
	}

	function cariIkan(idSearchIkan) {
		$(`#${idSearchIkan}`).autocomplete({
			source: function(req, res) {
				$.post('<?= site_url('fish/action-search') ?>', {
					q: req.term,
				}, function(data) {
					res(data);
				}, 'json')
			},
			select: function(ev, ui) {
				if (ui.item.value != "") {
					$(`#${idSearchIkan}`).val(ui.item.label);
				}
				return false;
			},
			focus: function(ev, ui) {
				if (ui.item.value != "") {
					$(`#${idSearchIkan}`).val(ui.item.label)
				}
				return false;
			}
		});
	}

	function cariMataUang(elm){
		var id = elm.id;
		var q = elm.value;
		$(`#${id}`).autocomplete({
			source: function(req, res) {
				$.post('<?= site_url('country/action-search-currencies') ?>', {
					q: req.term,
				}, function(data) {
					res(data);
				}, 'json')
			},
			select: function(ev, ui) {
				if (ui.item.value != "") {
					$(`#${id}`).val(ui.item.label);
				}
				return false;
			},
			focus: function(ev, ui) {
				if (ui.item.value != "") {
					$(`#${id}`).val(ui.item.label)
				}
				return false;
			}
		});

	}
</script>
