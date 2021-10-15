<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h5 class="cart-title">Country Add Form</h5>
		</div>
		<div class="card-body">
			<form action="<?= site_url('country/action-insert') ?>" method="POST">
				<div class="form-group">
					<label>Name of Country</label>
					<input type="text" name="nama_negara" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Info</label>
					<textarea name="extras" class="form-control" ></textarea>
				</div>
				<div class="form-group">
					<label>Currency</label>
					<input type="text" name="currency" class="form-control" required />
				</div>
				<div class="form-group">
					<label>State</label><br>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="state" id="aktif" value="Y">
						<label class="form-check-label" for="aktif">Aktif</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="state" id="non-aktif" value="N" checked>
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
