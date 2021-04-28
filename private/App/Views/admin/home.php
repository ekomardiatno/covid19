<?php
function crease($int)
{
	if ($int >= 50) {
		return ['text-danger', 'fas fa-arrow-up'];
	} else if ($int > 0) {
		return ['text-warning', 'fas fa-arrow-up'];
	} else if ($int === 0) {
		return ['text-success', 'fas fa-arrows-alt-h'];
	} else {
		return ['text-success', 'fas fa-arrow-down'];
	}
}
?>
<div class="row mx--2">
	<div class="col-xl-3 col-md-6 px-2">
		<div class="card card-stats mb-3">
			<!-- Card body -->
			<div class="card-body px-3">
				<div class="row">
					<div class="col">
						<h5 class="card-title text-uppercase text-muted mb-0">TOTAL ODP</h5>
						<span class="h2 font-weight-bold mb-0"><?= $data['total_odp'] ?></span>
					</div>
					<div class="col-auto">
						<div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
							<i class="fas fa-first-aid"></i>
						</div>
					</div>
				</div>
				<p class="mt-3 mb-0 text-sm">
					<span class="<?= crease($data['persentase_odp'])[0] ?> mr-1"><i class="<?= crease($data['persentase_odp'])[1] ?>"></i> <?= number_format($data['persentase_odp'], 2, ',', '.') ?>%</span>
					<?php if ($data['tanggal'] !== '') : ?>
						<span class="text-nowrap small font-italic text-muted">Sejak tanggal <?= Mod::dateID($data['tanggal']) ?></span>
					<?php endif; ?>
				</p>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6 px-2">
		<div class="card card-stats mb-3">
			<!-- Card body -->
			<div class="card-body px-3">
				<div class="row">
					<div class="col">
						<h5 class="card-title text-uppercase text-muted mb-0">TOTAL PDP</h5>
						<span class="h2 font-weight-bold mb-0"><?= $data['total_pdp'] ?></span>
					</div>
					<div class="col-auto">
						<div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
							<i class="fas fa-first-aid"></i>
						</div>
					</div>
				</div>
				<p class="mt-3 mb-0 text-sm">
					<span class="<?= crease($data['persentase_pdp'])[0] ?> mr-1"><i class="<?= crease($data['persentase_pdp'])[1] ?>"></i> <?= number_format($data['persentase_pdp'], 2, ',', '.') ?>%</span>
					<?php if ($data['tanggal'] !== '') : ?>
						<span class="text-nowrap small font-italic text-muted">Sejak tanggal <?= Mod::dateID($data['tanggal']) ?></span>
					<?php endif; ?>
				</p>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6 px-2">
		<div class="card card-stats mb-3">
			<!-- Card body -->
			<div class="card-body px-3">
				<div class="row">
					<div class="col">
						<h5 class="card-title text-uppercase text-muted mb-0">Positif</h5>
						<span class="h2 font-weight-bold mb-0"><?= $data['total_positif'] ?></span>
					</div>
					<div class="col-auto">
						<div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
							<i class="fas fa-first-aid"></i>
						</div>
					</div>
				</div>
				<p class="mt-3 mb-0 text-sm">
					<span class="<?= crease($data['persentase_positif'])[0] ?> mr-1"><i class="<?= crease($data['persentase_positif'])[1] ?>"></i> <?= number_format($data['persentase_positif'], 2, ',', '.') ?>%</span>
					<?php if ($data['tanggal'] !== '') : ?>
						<span class="text-nowrap small font-italic text-muted">Sejak tanggal <?= Mod::dateID($data['tanggal']) ?></span>
					<?php endif; ?>
				</p>
			</div>
		</div>
	</div>
	<div class="col-xl-3 col-md-6 px-2">
		<div class="card card-stats mb-3">
			<!-- Card body -->
			<div class="card-body px-3">
				<div class="row">
					<div class="col">
						<h5 class="card-title text-uppercase text-muted mb-0">Total Kasus</h5>
						<span class="h2 font-weight-bold mb-0"><?= $data['total_kasus'] ?></span>
					</div>
					<div class="col-auto">
						<div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
							<i class="fas fa-first-aid"></i>
						</div>
					</div>
				</div>
				<p class="mt-3 mb-0 text-sm">
					<span class="<?= crease($data['persentase_kasus'])[0] ?> mr-1"><i class="<?= crease($data['persentase_kasus'])[1] ?>"></i> <?= number_format($data['persentase_kasus'], 2, ',', '.') ?>%</span>
					<?php if ($data['tanggal'] !== '') : ?>
						<span class="text-nowrap small font-italic text-muted">Sejak tanggal <?= Mod::dateID($data['tanggal']) ?></span>
					<?php endif; ?>
				</p>
			</div>
		</div>
	</div>
</div>

<div class="table-responsive mb-3">
	<table class="table align-items-center table-striped table-flush bg-white">
		<thead class="thead-light">
			<tr>
				<th class="text-center" scope="col">#</th>
				<th scope="col">Kecamatan</th>
				<th class="text-center" scope="col">ODP</th>
				<th class="text-center" scope="col">PDP</th>
				<th class="text-center" scope="col">Positif</th>
				<th class="text-center" scope="col">Total</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			$total_kasus_all = 0;
			foreach ($data['kecamatan'] as $k) :
				$odp_proses = isset($k['odp_proses']) ? intval($k['odp_proses']) : 0;
				$odp_selesai = isset($k['odp_selesai']) ? intval($k['odp_selesai']) : 0;
				$pdp_rawat = isset($k['pdp_rawat']) ? intval($k['pdp_rawat']) : 0;
				$pdp_sehat = isset($k['pdp_sehat']) ? intval($k['pdp_sehat']) : 0;
				$pdp_meninggal = isset($k['pdp_meninggal']) ? intval($k['pdp_meninggal']) : 0;
				$positif_rawat = isset($k['positif_rawat']) ? intval($k['positif_rawat']) : 0;
				$positif_sehat = isset($k['positif_sehat']) ? intval($k['positif_sehat']) : 0;
				$positif_meninggal = isset($k['positif_meninggal']) ? intval($k['positif_meninggal']) : 0;
				$total_odp = $odp_proses + $odp_selesai;
				$total_pdp = $pdp_rawat + $pdp_sehat + $pdp_meninggal;
				$total_positif = $positif_rawat + $positif_sehat + $positif_meninggal;
				$total_kasus = $total_odp + $total_pdp + $total_positif;
				$total_kasus_all += $total_kasus;
			?>
				<tr>
					<td class="text-center"><?= $no ?></td>
					<td class=""><?= $k['nama_kecamatan'] ?></td>
					<td class="text-center"><?= $total_odp ?></td>
					<td class="text-center"><?= $total_pdp ?></td>
					<td class="text-center"><?= $total_positif ?></td>
					<td class="text-center"><?= $total_kasus ?></td>
				</tr>
			<?php
				$no++;
			endforeach;
			?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="5" class="text-right font-weight-bold">Total</td>
				<td class="text-center" colspan="5"><?= $total_kasus_all ?></td>
			</tr>
		</tfoot>
	</table>
</div>