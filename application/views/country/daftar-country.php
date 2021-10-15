<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-6">
					<h5 class="card-title">
						List of Country
					</h5>
				</div>
				<!-- <div class="col-md-6 text-right">
					<a href="<?= site_url('country/form-add') ?>" class="btn btn-sm btn-primary">
						<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
						Add Country
					</a>
				</div> -->
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-sm table-bordered zero_config">
					<thead>
						<tr>
							<th>No</th>
							<th>ID</th>
							<th>Name</th>
							<th>Calling Code</th>
							<th>Currency</th>
							<th>ALPHA 3</th>
							<!-- <th>Action</th> -->
						</tr>
					</thead>
					<tbody>
						<?php foreach ($country as $key => $c) : ?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $c->alpha_2 ?></td>
								<td><?= $c->name ?></td>
								<td><?= $c->calling_code ?></td>
								<td><?= $c->currencies ?></td>
								<td><?= $c->alpha_3 ?></td>
								<!-- <td>
									<a href="<?= site_url('country/form-edit?id_negara=' . $c->alpha_2 ) ?>" class="btn btn-sm btn-warning">
										<i class="fas fa-pencil-alt"></i>
										Edit
									</a>

									<a href="<?= site_url('country/action-delete?id_negara=' . $c->alpha_2 ) ?>" onclick="return confirm('Are you sure to delete this country ?')" class="btn btn-sm btn-danger">
										<i class="fa fa-trash" aria-hidden="true"></i>
										Delete
									</a>
								</td> -->
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
