<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h5 class="cart-title">District Add Form</h5>
		</div>
		<div class="card-body">
			<form action="<?= site_url('district/action-insert') ?>" method="POST">
				<div class="form-group">
					<label>Name of District</label>
					<input type="text" name="nama" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Country</label>
					<select name="country" class="form-control">
						<?php foreach ($country as $c) { ?>
							<option value="<?= $c->alpha_2?>"><?= $c->name?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Province</label>
					<select name="province" class="form-control">
						<?php foreach ($province as $p) { ?>
							<option value="<?= $p->id?>"><?= $p->nama?></option>
						<?php } ?>
					</select>
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
