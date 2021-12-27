<?php if (empty($total_data)) { ?>
	<script>
		alert("Tidak ada data yang ditampilkan");
		window.history.back();
	</script>
<?php die();
} ?>
<div class="container-fluid">
	<h4>Statistik</h4>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">
						Ringkasan Statistik
					</h5>
				</div>
				<div class="card-body">
					<div class="row d-flex justify-content-center align-item-center">
						<div class="col-md-2 text-center">
							<h4>Fishing Gear<br><small><?= count($fishing_gear) ?></small></h4>
						</div>
						<div class="col-md-2 text-center">
							<h4>Total Data<br><small><?= count($total_data) ?></small></h4>
						</div>
						<div class="col-md-2 text-center">
							<h4>Total Location<br><small><?= count($lokasi) ?></small></h4>
						</div>
						<div class="col-md-2 text-center">
							<h4>Type of Fish<br><small><?= count($jenis_ikan) ?></small></h4>
						</div>
						<div class="col-md-2 text-center">
							<h4>Total of Catch<br><small><?= $total_tangkap->total ?></small></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">
						Ikan yang paling banyak ditanggap
					</h5>
				</div>
				<div class="card-body">
					<canvas id="chartIkan" style="width:100%;"></canvas>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">
						Total Tangkapan Ikan
					</h5>
				</div>
				<div class="card-body">
					<canvas id="totalTangkapan" style="width:100%;"></canvas>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">
						Penggunaan alat tangkap
					</h5>
				</div>
				<div class="card-body">
					<canvas id="chartAlat" style="width:100%;"></canvas>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">
						Daerah dengan hasil tangkapan paling banyak
					</h5>
				</div>
				<div class="card-body">
					<canvas id="chartDaerah" style="width:100%;"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var ctxIkan = document.getElementById("chartIkan").getContext('2d');
	var ctxJumlahAlat = document.getElementById("chartAlat").getContext('2d');
	var ctxDaerah = document.getElementById("chartDaerah").getContext('2d');
	var ctxtotalTangkapan = document.getElementById("totalTangkapan").getContext('2d');
	var start = "<?= $this->input->get('start') ?>";
	var end = "<?= $this->input->get('end') ?>";

	$.get("<?= site_url('report/showStatisikIkan') ?>", {
		'start': start,
		'end': end
	}, function(res) {
		var total = res.total;
		var title = res.title;
		var colors = res.colors;
		var myChart = new Chart(ctxIkan, {
			type: "pie",
			data: {
				labels: title,
				datasets: [{
					data: total,
					borderColor: colors, //specify value for type line
					backgroundColor: colors,
				}]
			},
			options: {
				legend: {
					display: true
				},
				title: {
					display: true,
					text: "10 Jenis Ikan Tangkapan Terbesar (kg)"
				},
				plugins: {
					datalabels: {
						formatter: (value, ctx) => {
							let datasets = ctx.chart.data.datasets;
							console.log(datasets[0].data.reduce((a, b) => a + b, 0));
							console.log(value);
							let sum = datasets[0].data.reduce((a, b) => a + b, 0);
							let percentage = Math.round((value / sum) * 100) + '%';
							return percentage;
							//  if (datasets.indexOf(ctx.dataset) === datasets.length - 1) {
							//   let sum = datasets[0].data.reduce((a, b) => a + b, 0);
							//   let percentage = Math.round((value / sum) * 100) + '%';
							//   return percentage;
							//  } else {
							//   return percentage;
							//  }
						},
						color: '#fff',
					}
				}
			}
		});
	}, 'json');

	$.get("<?= site_url('report/statistikAlat') ?>", {
		'start': start,
		'end': end
	}, function(res) {
		var total = res.total;
		var title = res.title;
		var colors = res.colors;
		var myChart = new Chart(ctxJumlahAlat, {
			type: "bar",
			data: {
				labels: title,
				datasets: [{
					data: total,
					borderColor: colors, //specify value for type line
					backgroundColor: colors,
				}]
			},
			options: {
				legend: {
					display: false
				},
				title: {
					display: true,
					text: "Total Penggunaan Alat"
				},
				scales: {
					yAxes: [{
						ticks: {
							stepSize: 1
						},

					}]
				},
			}
		});
	}, 'json');

	$.get("<?= site_url('report/showDaerahPalingBanyakHasilnya') ?>", {
		'start': start,
		'end': end
	}, function(res) {
		var total = res.total;
		var title = res.title;
		var colors = res.colors;
		var myChart = new Chart(ctxDaerah, {
			type: "pie",
			data: {
				labels: title,
				datasets: [{
					data: total,
					borderColor: colors, //specify value for type line
					backgroundColor: colors,
				}]
			},
			options: {
				title: {
					display: true,
					text: "Daerah dengan Hasil Tangkapan Terbanyak (kg)"
				},
				plugins: {
					datalabels: {
						formatter: (value, ctx) => {
							let datasets = ctx.chart.data.datasets;
							console.log(datasets[0].data.reduce((a, b) => a + b, 0));
							console.log(value);
							let sum = datasets[0].data.reduce((a, b) => a + b, 0);
							let percentage = Math.round((value / sum) * 100) + '%';
							return percentage;
							//  if (datasets.indexOf(ctx.dataset) === datasets.length - 1) {
							//   let sum = datasets[0].data.reduce((a, b) => a + b, 0);
							//   let percentage = Math.round((value / sum) * 100) + '%';
							//   return percentage;
							//  } else {
							//   return percentage;
							//  }
						},
						color: '#fff',
					}
				}
			}
		});
	}, 'json')

	$.get("<?= site_url('report/totalTangkapan') ?>", {
		'start': start,
		'end': end
	}, function(res) {
		var total = res.total;
		var title = res.title;
		var colors = res.colors;
		var myChart = new Chart(ctxtotalTangkapan, {
			type: "line",
			data: {
				labels: title,
				datasets: [{
					data: total,
					fill: false,
					borderColor: 'rgb(75, 192, 192)',
					tension: 0.1
				}]
			},
			options: {
				title: {
					display: true,
					text: "Daerah dengan Hasil Tangkapan Terbanyak (kg)"
				},
				legend: {
					display: false
				},
			}
		});
	}, 'json')
</script>
