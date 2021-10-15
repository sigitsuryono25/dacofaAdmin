<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h5 class="cart-title">Province Edit Form</h5>
		</div>
		<div class="card-body">
			<form action="<?= site_url('province/action-update') ?>" method="POST">
				<div class="form-group">
					<label>Name of Province</label>
					<input type="text" name="nama" class="form-control" required value="<?= $province->nama ?>">
				</div>
				<div class="form-group">
					<label>ID</label>
					<input type="text" name="id" class="form-control" required value="<?= $province->id ?>" readonly>
				</div>
				<div class="form-group">
					<label>Country</label>
					<input type="text" name="country" class="form-control" value="<?= $province->name ?>" />
				</div>
				<div class="form-group">
					<label>Country Code</label>
					<input type="text" name="country_code" class="form-control" value="<?= $province->country_code ?>" />
				</div>
				<div class="form-group">
					<label>State</label><br>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="state" id="aktif" value="Y" <?= ($province->state == 'Y') ? "checked" : "" ?>>
						<label class="form-check-label" for="aktif">Aktif</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="state" id="non-aktif" value="N" <?= ($province->state == 'N') ? "checked" : "" ?>>
						<label class="form-check-label" for="non-aktif">Non Aktif</label>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-sm btn-primary">
						<i class="fas fa-save"></i>&nbsp;&nbsp;&nbsp;
						Save Data
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
