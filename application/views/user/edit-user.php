<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h5 class="cart-title">User Edit Form</h5>
		</div>
		<div class="card-body">
			<form action="<?= site_url('user/action-update') ?>" method="POST">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" value="<?= $user->nama ?>">
				</div>
				<div class="form-group">
					<label>User Name</label>
					<input type="text" name="userid" class="form-control" readonly value="<?= $user->userid ?>">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="passwd" class="form-control">
				</div>
				<div class="form-group">
					<label>Telepon</label>
					<input type="tel" name="phone" class="form-control" value="<?= $user->phone ?>">
				</div>
				<div class="form-group">
					<label>Role</label>
					<select name="role" class="form-control">
						<option value="admin" <?= ($user->role == 'admin') ? "selected" : "" ?>>Administrator</option>
						<option value="surveyor" <?= ($user->role == 'surveyor') ? "selected" : "" ?>>Surveyor</option>
					</select>
				</div>
				<div class="form-group">
					<label>State</label><br>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="state" id="aktif" value="Y" <?= ($user->state == 'Y') ? "checked" : "" ?>>
						<label class="form-check-label" for="aktif">Aktif</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="state" id="non-aktif" value="N" <?= ($user->state == 'N') ? "checked" : "" ?>>
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
