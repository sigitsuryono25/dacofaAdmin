<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h5 class="card-title">
				Laporan Fishery Activity
			</h5>
		</div>
		<div class="card-body">
			<a onclick="fnExcelReport()" class="btn btn-success btn-sm text-white mb-2">
				<i class="fas fa-file-excel"></i>
				Download Report
			</a>
			<div class="table-responsive">
				<table class="table table-sm table-bordered" id="report">
					<thead>
						<tr>
							<td class="border-0 p-2" colspan="14">
								<h4 class="text-center" style="font-weight: bold; text-align: center;">DATA OF FISHING ACTIVITY</h4>
							</td>
						</tr>
						<tr>
							<td class="border-0" colspan="14">
								<b>Name of Fisher: <?= $lokasi[0]->nama ?></b>
							</td>
						</tr>

						<tr class="bg-primary text-white  font-weight-bold">
							<th rowspan="2" class="align-middle text-center">No</th>
							<th rowspan="2" class="align-middle text-center">Date</th>
							<th colspan="2" class="align-middle text-center">Fishing Gear</th>
							<th rowspan="2" class="align-middle text-center">Amount Of Fishing Gear (Unit)</th>
							<th rowspan="2" class="align-middle text-center">Fishing Ground</th>
							<th rowspan="2" class="align-middle text-center">Location</th>
							<th rowspan="2" class="align-middle text-center">Operation Time (Hours)</th>
							<th rowspan="2" class="align-middle text-center">Name of Fish</th>
							<th rowspan="2" class="align-middle text-center">Total Catch (KG)</th>
							<th colspan="2" class="align-middle text-center">Price(/KG)</th>
							<th rowspan="2" class="align-middle text-center">Used For</th>
							<th rowspan="2" class="align-middle text-center">Grand Total Catch (KG)</th>
						</tr>
						<tr class="bg-primary text-white font-weight-bold">
							<th class="align-middle text-center">Fishing Gear</th>
							<th class="align-middle text-center">Mesh Size (Inch)</th>
							<th class="align-middle text-center">Price</th>
							<th class="align-middle text-center">Currency</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($lokasi as $l) {
							$listIkan = $this->db->query("SELECT *, b.grand 
							FROM tb_detail_tangkapan
							CROSS JOIN (SELECT SUM(total_tangkapan) as grand FROM tb_detail_tangkapan WHERE id_header IN ('$l->id')) b
							WHERE id_header IN ('$l->id')")->result();
							if (!empty($listIkan)) {
								$rowSpan = count($listIkan) + 1;
							} else {
								$rowSpan = 2;
							}
						?>
							<tr>
								<td rowspan="<?= $rowSpan ?>" class="text-center align-middle"><?= $no ?></td>
								<td rowspan="<?= $rowSpan ?>" class="text-center align-middle"><?= $l->tanggal ?></td>
								<td rowspan="<?= $rowSpan ?>" class="text-center align-middle"><?= $l->alat_tangkap ?></td>
								<td rowspan="<?= $rowSpan ?>" class="text-center align-middle"><?= $l->ukuran_jaring ?></td>
								<td rowspan="<?= $rowSpan ?>" class="text-center align-middle"><?= $l->jumla_alat ?></td>
								<td rowspan="<?= $rowSpan ?>" class="text-center align-middle"><?= $l->area ?></td>
								<td rowspan="<?= $rowSpan ?>" class="text-center align-middle"><?= $l->lokasi ?></td>
								<td rowspan="<?= $rowSpan ?>" class="text-center align-middle"><?= $l->lama_operasi ?></td>
							</tr>
							<?php
							if (empty($listIkan)) { ?>
								<tr>
									<td colspan="6" class="align-middle text-center">-</td>
								</tr>
								<?php } else {
								$grand = 0;
								foreach ($listIkan as $key => $i) {
								?>
									<tr>
										<td class="text-center align-middle"><?= $i->id_ikan ?></td>
										<td class="text-center align-middle"><?= $i->total_tangkapan ?></td>
										<td class="text-center align-middle"><?= $i->harga ?></td>
										<td class="text-center align-middle"><?= $i->mata_uang ?></td>
										<td class="text-center align-middle"><?= $i->peruntukan ?></td>
										<?php if ($key == 0) { ?>
											<td rowspan="<?= $rowSpan - 1 ?>" class="text-center align-middle"><?= $i->grand ?></td>
										<?php } ?>
									<?php } ?>
									</tr>
								<?php
							} ?>
							<?php $no++;
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	// function html_table_to_excel(type) {
	// 	var startDate = "<?= $this->input->get_post('start'); ?>";
	// 	var endDate = "<?= $this->input->get_post('end'); ?>";
	// 	var name = "<?= $lokasi[0]->nama ?>";
	// 	var fileName = `DATA OF FISHING ACTIVITY ${startDate}-${endDate}__${name}`;
	// 	var data = document.getElementById('report');

	// 	var file = XLSX.utils.table_to_book(data, {
	// 		sheet: "sheet1"
	// 	});

	// 	XLSX.write(file, {
	// 		bookType: type,
	// 		bookSST: true,
	// 		type: 'base64'
	// 	});

	// 	XLSX.writeFile(file, `${fileName}.` + type);
	// }

	// const export_button = document.getElementById('export_button');

	// export_button.addEventListener('click', () => {
	// 	html_table_to_excel('xlsx');
	// });

	function fnExcelReport() {
		var startDate = "<?= $this->input->get_post('start'); ?>";
		var endDate = "<?= $this->input->get_post('end'); ?>";
		var name = "<?= $lokasi[0]->nama ?>";
		var fileName = `DATA OF FISHING ACTIVITY ${startDate}-${endDate}__${name}`;

		var tab_text = "<table border='2px'><tr >";
		var textRange;
		var j = 0;
		tab = document.getElementById('report'); // id of table

		for (j = 0; j < tab.rows.length; j++) {
			tab_text = tab_text + tab.rows[j].innerHTML + "</tr>";
			//tab_text=tab_text+"</tr>";
		}

		tab_text = tab_text + "</table>";
		tab_text = tab_text.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
		tab_text = tab_text.replace(/<img[^>]*>/gi, ""); // remove if u want images in your table
		tab_text = tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

		var ua = window.navigator.userAgent;
		var msie = ua.indexOf("MSIE");

		if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) // If Internet Explorer
		{
			txtArea1.document.open("txt/html", "replace");
			txtArea1.document.write(tab_text);
			txtArea1.document.close();
			txtArea1.focus();
			sa = txtArea1.document.execCommand("SaveAs", true, "Say Thanks to Sumit.xls");
		} else //other browser not tested on IE 11
			sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));
			sa.document.title = `DATA OF FISHING ACTIVITY ${startDate}-${endDate}__${name}`;
		return (sa);
	}
</script>
