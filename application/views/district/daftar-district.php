<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-6">
					<h5 class="card-title">
						List of District
					</h5>
				</div>
				<div class="col-md-6 text-right">
					<a href="<?= site_url('district/form-add') ?>" class="btn btn-sm btn-primary">
						<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
						Add District
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
							<th>Province</th>
							<th>Country</th>
							<th>State</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($district as $key => $p) : ?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $p->kab ?></td>
								<td><?= $p->nama ?></td>
								<td><?= $p->name ?></td>
								<td><?= $p->kab_state ?></td>
								<td>
									<a href="<?= site_url('district/form-edit?id_district=' . $p->id_kab) ?>" class="btn btn-sm btn-warning">
										<i class="fas fa-pencil-alt"></i>
										Edit
									</a>

									<a href="<?= site_url('district/action-delete?id_district=' . $p->id_kab) ?>" onclick="return confirm('Are you sure to delete this district ?')" class="btn btn-sm btn-danger">
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
