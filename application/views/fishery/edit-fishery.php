<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h5 class="cart-title">Eishing Gear Edit Form</h5>
		</div>
		<div class="card-body">
			<form action="<?= site_url('fishing-gear/action-update') ?>" method="POST">
				<div class="form-group">
					<label>Name of Fishing Gear</label>
					<input type="text" name="nama_fishing_gear" class="form-control" value="<?= $fishing->nama_fishing_gear ?>">
				</div>
				<div class="form-group">
					<label>Id</label>
					<input type="text" name="id" class="form-control" readonly value="<?= $fishing->id ?>">
				</div>
				<div class="form-group">
					<label>Info</label>
					<textarea name="extras" class="form-control"><?= $fishing->extras ?></textarea>
				</div>
				<div class="form-group">
					<label>State</label><br>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="state" id="aktif" value="Y" <?= ($fishing->state == 'Y') ? "checked" : "" ?>>
						<label class="form-check-label" for="aktif">Aktif</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="state" id="non-aktif" value="N" <?= ($fishing->state == 'N') ? "checked" : "" ?>>
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
