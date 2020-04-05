<?php
function crease($int) {
	if($int >= 50) {
		return ['text-danger', 'fas fa-arrow-up'];
	} else if($int > 0) {
		return ['text-warning', 'fas fa-arrow-up'];
	} else if($int === 0) {
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
						<span class="h2 font-weight-bold mb-0"><?= $data['total_status_kasus_sekarang']['total_odp'] ?></span>
					</div>
					<div class="col-auto">
						<div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
							<i class="fas fa-first-aid"></i>
						</div>
					</div>
				</div>
				<?php
				$odp_persen = 0;
				if ($data['total_status_kasus_sekarang']['total_odp']) {
					$odp_persen = ($data['total_status_kasus_sekarang']['total_odp'] - $data['total_status_kasus_bulan_lalu']['total_odp']) / $data['total_status_kasus_sekarang']['total_odp'] * 100;
				}
				?>
				<p class="mt-3 mb-0 text-sm">
					<span class="<?= crease($odp_persen)[0] ?> mr-1"><i class="<?= crease($odp_persen)[1] ?>"></i><?= number_format($odp_persen, 2, ',', '.') ?>%</span>
					<span class="text-nowrap small font-italic text-muted">Sejak 1 bulan terakhir</span>
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
						<span class="h2 font-weight-bold mb-0"><?= $data['total_status_kasus_sekarang']['total_pdp'] ?></span>
					</div>
					<div class="col-auto">
						<div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
							<i class="fas fa-first-aid"></i>
						</div>
					</div>
				</div>
				<?php
				$pdp_persen = 0;
				if ($data['total_status_kasus_sekarang']['total_pdp']) {
					$pdp_persen = ($data['total_status_kasus_sekarang']['total_pdp'] - $data['total_status_kasus_bulan_lalu']['total_pdp']) / $data['total_status_kasus_sekarang']['total_pdp'] * 100;
				}
				?>
				<p class="mt-3 mb-0 text-sm">
					<span class="<?= crease($pdp_persen)[0] ?> mr-1"><i class="<?= crease($pdp_persen)[1] ?>"></i> <?= number_format($pdp_persen, 2, ',', '.') ?>%</span>
					<span class="text-nowrap small font-italic text-muted">Sejak 1 bulan terakhir</span>
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
						<span class="h2 font-weight-bold mb-0"><?= $data['total_status_kasus_sekarang']['total_positif'] ?></span>
					</div>
					<div class="col-auto">
						<div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
							<i class="fas fa-first-aid"></i>
						</div>
					</div>
				</div>
				<?php
				$positif_persen = 0;
				if ($data['total_status_kasus_sekarang']['total_positif']) {
					$positif_persen = ($data['total_status_kasus_sekarang']['total_positif'] - $data['total_status_kasus_bulan_lalu']['total_positif']) / $data['total_status_kasus_sekarang']['total_positif'] * 100;
				}
				?>
				<p class="mt-3 mb-0 text-sm">
					<span class="<?= crease($positif_persen)[0] ?> mr-1"><i class="<?= crease($positif_persen)[1] ?>"></i> <?= number_format($positif_persen, 2, ',', '.') ?>%</span>
					<span class="text-nowrap small font-italic text-muted">Sejak 1 bulan terakhir</span>
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
						<?php
						$total_status_kasus_sekarang = $data['total_status_kasus_sekarang']['total_odp'] + $data['total_status_kasus_sekarang']['total_pdp'] + $data['total_status_kasus_sekarang']['total_positif'];
						$total_status_kasus_bulan_lalu = $data['total_status_kasus_bulan_lalu']['total_odp'] + $data['total_status_kasus_bulan_lalu']['total_pdp'] + $data['total_status_kasus_bulan_lalu']['total_positif'];
						?>
						<h5 class="card-title text-uppercase text-muted mb-0">Total Kasus</h5>
						<span class="h2 font-weight-bold mb-0"><?= $total_status_kasus_sekarang ?></span>
					</div>
					<div class="col-auto">
						<div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
							<i class="fas fa-first-aid"></i>
						</div>
					</div>
				</div>
				<?php
				$total_persen = 0;
				if ($total_status_kasus_sekarang > 0) {
					$total_persen = ($total_status_kasus_sekarang - $total_status_kasus_bulan_lalu) / $total_status_kasus_sekarang * 100;
				}
				?>
				<p class="mt-3 mb-0 text-sm">
					<span class="<?= crease($total_persen)[0] ?> mr-1"><i class="<?= crease($total_persen)[1] ?>"></i> <?= number_format($total_persen, 2, ',', '.') ?>%</span>
					<span class="text-nowrap small font-italic text-muted">Sejak 1 bulan terakhir</span>
				</p>
			</div>
		</div>
	</div>
</div>

<div class="table-responsive mb-3">
	<table class="table align-items-center table-striped table-flush bg-white">
		<thead class="thead-light">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Kecamatan</th>
				<th scope="col">ODP</th>
				<th scope="col">PDP</th>
				<th scope="col">Positif</th>
				<th scope="col">Total</th>
			</tr>
		</thead>
		<?php
		$total_end = 0;
		?>
		<tbody>
			<?php
			$no = 1;
			foreach ($data['kasus_kecamatan'] as $d) :
				$total_odp = $d['odp_proses'] + $d['odp_selesai'];
				$total_pdp = $d['pdp_perawatan'] + $d['pdp_sembuh'] + $d['pdp_meninggal'];
				$total_positif = $d['positif_dirawat'] + $d['positif_sembuh'] + $d['positif_meninggal'];
				$total_kasus = $total_odp + $total_pdp + $total_positif;
				$total_end += $total_kasus;
			?>
			<tr>
				<td><?= $no ?></td>
				<td><?= $d['nama_kecamatan'] ?></td>
				<td><?= $total_odp ?></td>
				<td><?= $total_pdp ?></td>
				<td><?= $total_positif ?></td>
				<td><?= $total_kasus ?></td>
			</tr>
			<?php
				$no++;
			endforeach
			?>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="5" class="text-right font-weight-bold">Total</td>
				<td colspan="5"><?= $total_end ?></td>
			</tr>
		</tfoot>
	</table>
</div>