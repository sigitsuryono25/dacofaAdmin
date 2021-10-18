<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-6 mb-2">
					<h5 class="card-title">
						Fishery Activity
					</h5>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-6 mb-2">
					<span class="font-weight-bold">Surveyor</span><br>
					<span><?= $fishery->nama ?></span>
				</div>
				<div class="col-md-6 mb-2">
					<span class="font-weight-bold">Country</span><br>
					<span><?= $fishery->id_negara ?></span>
				</div>
				<div class="col-md-6 mb-2">
					<span class="font-weight-bold">Date</span><br>
					<span><?= $fishery->tanggal ?></span>
				</div>
				<div class="col-md-6 mb-2">
					<span class="font-weight-bold">Province</span><br>
					<span><?= $fishery->id_provinsi ?></span>
				</div>
				<div class="col-md-6 mb-2">
					<span class="font-weight-bold">Fishing Gear</span><br>
					<span><?= $fishery->alat_tangkap ?></span>
				</div>
				<div class="col-md-6 mb-2">
					<span class="font-weight-bold">District</span><br>
					<span><?= $fishery->id_kabupaten ?></span>
				</div>
				<div class="col-md-6 mb-2">
					<span class="font-weight-bold">Mesh Size</span><br>
					<span><?= $fishery->ukuran_jaring ?></span>
				</div>
				<div class="col-md-6 mb-2">
					<span class="font-weight-bold">Location</span><br>
					<span><?= $fishery->lokasi ?></span>
				</div>
				<div class="col-md-6 mb-2">
					<span class="font-weight-bold">Amount of Fishing Gear</span><br>
					<span><?= $fishery->jumla_alat ?></span>
				</div>
				<div class="col-md-6 mb-2">
					<span class="font-weight-bold">Operation Hours</span><br>
					<span><?= $fishery->lama_operasi ?></span>
				</div>
			</div>
			<div class="table-responsive mt-5">
				<table class="table table-sm table-bordered zero_config">
					<thead>
						<tr>
							<th class="font-weight-bold">No</th>
							<th class="font-weight-bold">Name of Fish</th>
							<th class="font-weight-bold">Total Catch</th>
							<th class="font-weight-bold">Used for</th>
							<th class="font-weight-bold">Price</th>
							<th class="font-weight-bold">Currency</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($hasil as $key => $h) : ?>
							<tr>
								<td><?= $key + 1 ?></td>
								<td><?= $h->id_ikan ?></td>
								<td><?= $h->total_tangkapan ?></td>
								<td><?= $h->peruntukan ?></td>
								<td><?= $h->harga ?></td>
								<td><?= $h->mata_uang ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
