<div class="container-fluid">
	<h4>Statistik</h4>
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h5 class="card-title">
						Ikan yang paling banyak ditanggap
					</h5>
				</div>
				<div class="card-body">
					<canvas id="chartIkan" style="width:100%;max-width:700px"></canvas>
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
					<canvas id="chartAlat" style="width:100%;max-width:700px"></canvas>
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
					<canvas id="chartDaerah" style="width:100%;max-width:700px"></canvas>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	var ctxIkan = document.getElementById("chartIkan").getContext('2d');
	var ctxJumlahAlat = document.getElementById("chartAlat").getContext('2d');
	var ctxDaerah = document.getElementById("chartDaerah").getContext('2d');

	$.get("<?= site_url('report/showStatisikIkan') ?>", function(res) {
		var total = res.total;
		var title = res.title;
		var colors = res.colors;
		var myChart = new Chart(ctxIkan, {
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
					text: "10 Jenis Ikan Tangkapan Terbesar (kg)"
				}
			}
		});
	}, 'json');

	$.get("<?= site_url('report/statistikAlat') ?>", function(res) {
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
				}
			}
		});
	}, 'json');

	$.get("<?= site_url('report/showDaerahPalingBanyakHasilnya') ?>", function(res) {
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
			}
		});
	}, 'json')


</script>
