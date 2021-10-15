<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-6">
					<h5 class="card-title">
						List of Country
					</h5>
				</div>
				<div class="col-md-6 text-right">
					<a href="<?= site_url('fish/form-add') ?>" class="btn btn-sm btn-primary">
						<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
						Add Fish
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
							<th>Nama Ikan</th>
							<th>State</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($fish as $key => $f) : ?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $f->nama_ikan ?></td>
								<td><?= $f->state ?></td>
								<td>
									<a href="<?= site_url('fish/form-edit?id_ikan=' . $f->id ) ?>" class="btn btn-sm btn-warning">
										<i class="fas fa-pencil-alt"></i>
										Edit
									</a>

									<a href="<?= site_url('fish/action-delete?id_ikan=' . $f->id ) ?>" onclick="return confirm('Are you sure to delete this fish ?')" class="btn btn-sm btn-danger">
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
