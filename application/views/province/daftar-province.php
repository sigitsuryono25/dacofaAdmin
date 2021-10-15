<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-6">
					<h5 class="card-title">
						List of Province
					</h5>
				</div>
				<div class="col-md-6 text-right">
					<a href="<?= site_url('province/form-add') ?>" class="btn btn-sm btn-primary">
						<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
						Add Province
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
							<th>Name</th>
							<th>Country</th>
							<th>State</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($province as $key => $p) : ?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $p->nama ?></td>
								<td><?= $p->name ?></td>
								<td><?= $p->state ?></td>
								<td>
									<a href="<?= site_url('province/form-edit?id=' . $p->id) ?>" class="btn btn-sm btn-warning">
										<i class="fas fa-pencil-alt"></i>
										Edit
									</a>

									<a href="<?= site_url('province/action-delete?id=' . $p->id) ?>" onclick="return confirm('Are you sure to delete this province ?')" class="btn btn-sm btn-danger">
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
