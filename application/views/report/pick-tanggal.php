<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h5 class="card-title">
				Generate Report
			</h5>
		</div>
		<div class="card-body">
			<form action="<?= site_url('report/show-report') ?>" method="POST">
				<div class="form-group">
				    <label>Surveyor</label>
					<select name="userid" class="form-control" required>
						<?php foreach ($user as $u) { ?>
							<option value="<?= $u->userid?>"><?= $u->nama?></option>
						<?php } ?>
					</select>
				</div>
				<div class="row">
					<div class="col-md-6 col-12">
						<div class="form-group">
							<label>Start Date</label>
							<input type="text" name="start" class="form-control datepicker" required>
						</div>
					</div>
					<div class="col-md-6 col-12">
						<div class="form-group">
							<label>End Date</label>
							<input type="text" name="end" class="form-control datepicker" required>
						</div>
					</div>
				</div>
				<div class="form-group">
					<button class="btn btn-sm btn-primary">
						<i class="fas fa-eye "></i> &nbsp;&nbsp;
						Generate Report
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
