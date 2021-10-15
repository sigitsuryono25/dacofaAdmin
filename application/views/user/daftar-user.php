<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-6">
					<h5 class="card-title">
						List of User
					</h5>
				</div>
				<div class="col-md-6 text-right">
					<a href="<?= site_url('user/form-add') ?>" class="btn btn-sm btn-primary">
						<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
						Add User
					</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-sm table-bordered zero_config">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Role</th>
							<th>State</th>
							<th>Phone</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($user as $key => $u) : ?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $u->nama ?></td>
								<td><?= $u->userid ?></td>
								<td><?= $u->role ?></td>
								<td><?= $u->state ?></td>
								<td><?= $u->phone ?></td>
								<td>
									<a href="<?= site_url('user/form-edit?userid=' . $u->userid) ?>" class="btn btn-sm btn-warning">
										<i class="fas fa-pencil-alt"></i>
										Edit
									</a>

									<a href="<?= site_url('user/action-delete?userid=' . $u->userid) ?>" onclick="return confirm('Are you sure to delete this user ?')" class="btn btn-sm btn-danger">
										<i class="fa fa-trash" aria-hidden="true"></i>
										Delete
									</a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
