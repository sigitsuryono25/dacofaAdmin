<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h5 class="card-title">
				Show Statistic
			</h5>
		</div>
		<div class="card-body">
			<form action="<?= site_url('report/statistik') ?>" method="GET">
				<div class="row">
					<div class="col-md-6 col-12">
						<div class="form-group">
							<label>Start Date</label>
							<input type="text" name="start" class="form-control datepicker" autocomplete="off" required>
						</div>
					</div>
					<div class="col-md-6 col-12">
						<div class="form-group">
							<label>End Date</label>
							<input type="text" name="end" class="form-control datepicker" autocomplete="off" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<button class="btn btn-sm btn-danger">
						<i class="fas fa-eye "></i> &nbsp;&nbsp;
						Show Statistic
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd"
	});
</script>
