<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-6">
					<h5 class="card-title">
						Fishery Activity
					</h5>
				</div>
				<div class="col-md-6 text-right">
					<a href="<?= site_url('fishery-activity/form-add') ?>" class="btn btn-sm btn-primary">
						<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
						Add Fishery Activity
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
							<th>Surveyor</th>
							<th>Date</th>
							<th>Country</th>
							<th>Province</th>
							<th>District</th>
							<th>Fishing Ground</th>
							<th>Fishing Gear</th>
							<th>Operation Hours</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($fishery as $key => $f) : ?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $f->nama ?></td>
								<td><?= $f->tanggal ?></td>
								<td><?= $f->id_negara ?></td>
								<td><?= $f->id_provinsi ?></td>
								<td><?= $f->id_kabupaten ?></td>
								<td><?= $f->area ?></td>
								<td><?= $f->alat_tangkap ?></td>
								<td><?= $f->lama_operasi ?></td>
								<td>
									<a href="<?= site_url('fishery-activity/detail/' . $f->id) ?>" class="btn btn-sm btn-success">
										<i class="fa fa-eye" aria-hidden="true"></i>
										View
									</a>
									<a href="" class="btn btn-sm btn-info">
										<i class="fas fa-pencil-alt    "></i>
										Edit
									</a>
									<a href="<?= site_url('fishery-activity/action-delete/' . $f->id) ?>" onclick="return confirm('delete this data?')" class="btn btn-sm btn-danger">
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
