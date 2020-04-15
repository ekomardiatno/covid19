<div class="card shadow mb-3">
  <div class="card-body">
    <div class="row">
      <div class="col-md">
        <div class="mb-2">
          <p class="mb-0 small text-muted">NIK</p>
          <p class="font-weight-bold mb-0"><?= $data['profile']['nik'] ?></p>
        </div>
        <div class="mb-2">
          <p class="mb-0 small text-muted">Nama</p>
          <p class="font-weight-bold mb-0"><?= $data['profile']['nama'] ?></p>
        </div>
        <div class="mb-2">
          <p class="mb-0 small text-muted">Kecamatan</p>
          <p class="font-weight-bold mb-0"><?= $data['profile']['nama_kecamatan'] ?></p>
        </div>
      </div>
      <div class="col-md">
        <div class="mb-2">
          <p class="mb-0 small text-muted">Umur</p>
          <p class="font-weight-bold mb-0"><?= $data['profile']['umur'] ?></p>
        </div>
        <div class="mb-2">
          <p class="mb-0 small text-muted">Nomor HP</p>
          <p class="font-weight-bold mb-0"><?= $data['profile']['hp'] ?></p>
        </div>
        <div class="mb-2">
          <p class="mb-0 small text-muted">Jenis kelamin</p>
          <p class="font-weight-bold mb-0"><?= $data['profile']['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan' ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="card-group-flex-row card-group-flex-row-md">
  <div class="card shadow mb-3">
    <div class="card-header border-0">
      <div class="flex-fill d-flex align-items-center">
        <h4 class="mb-0 text-uppercase fw-800">Riwayat kasus</h4>
      </div>
    </div>
    <div class="card-body">
      <?php
      if ($data['pantauan']) {
      ?>
        <div class="timeline">
          <?php
          foreach ($data['pantauan'] as $d) :
            $text = '-';
            $color = 'default';
            $d['status'] = explode('_', $d['status']);
            switch ($d['status'][0]) {
              case 'odp':
                $text = 'ODP';
                if ($d['status'][1] === 'proses') {
                  $text .= ': Proses pemantauan';
                } else {
                  $text .= ': Selesai pemantauan';
                }
                $color = 'success';
                break;
              case 'pdp':
                $text = 'PDP';
                if ($d['status'][1] === 'perawatan') {
                  $text .= ': Masih dirawat';
                  $color = 'warning';
                } else if ($d['status'][1] === 'sembuh') {
                  $text .= ': Pulang dan sehat';
                  $color = 'success';
                } else {
                  $text .= ': Meninggal';
                  $color = 'danger';
                }
                break;
              case 'positif':
                $text = 'Positif';
                if ($d['status'][1] === 'dirawat') {
                  $text .= ': Masih dirawat';
                  $color = 'warning';
                } else if ($d['status'][1] === 'sembuh') {
                  $text .= ': Pulang dan sehat';
                  $color = 'success';
                } else {
                  $text .= ': Meninggal';
                  $color = 'danger';
                }
                break;
            }
          ?>
            <div class="timeline-item">
              <div class="case-status-custom">
                <p class="small font-weight-light mb-0 font-italic"><?= Mod::dateID($d['tanggal']) ?></p>
                <span class="badge badge-<?= $color ?> mb-3"><?= $text ?></span>
                <?php
                if ($d['riwayat'] !== '') {
                ?>
                  <div class="details">
                    <h4 class="font-weight-normal mb-1">Riwayat perjalanan</h4>
                    <p class="text-details">
                      <?= $d['riwayat'] ?>
                    </p>
                  </div>
                <?php
                }
                if ($d['keterangan'] !== '') {
                ?>
                  <div class="details">
                    <h4 class="font-weight-normal mb-1">Keterangan</h4>
                    <p class="text-details">
                      <?= $d['keterangan'] ?>
                    </p>
                  </div>
                <?php
                }
                ?>
              </div>
            </div>
          <?php
          endforeach;
          ?>
        </div>
      <?php
      } else {
      ?>
        <div class="alert alert-secondary" role="alert">
          <strong>Kosong!</strong> Belum ada pantauan yang tercatat pada kasus ini!
        </div>
      <?php
      }
      ?>
    </div>
  </div>
  <div class="card bg-secondary shadow mb-3">
    <div class="card-header border-0">
      <div class="flex-fill d-flex align-items-center">
        <h4 class="mb-0 text-uppercase fw-800">Ada status terbaru?</h4>
      </div>
    </div>
    <div class="card-body">
      <form action="<?= Web::url('admin.kasus.status') ?>" method="post">
        <?= Web::key_field() ?>
        <input type="hidden" name="id_kasus" value="<?= $data['id_kasus'] ?>">
        <div class="form-group">
          <label class="small form-control-label" for="tanggal">Tanggal<span class="text-danger">*</span></label>
          <div class="input-group input-group-sm input-group-alternative">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
            </div>
            <input class="form-control datepicker" required name="tanggal" id="tanggal" placeholder="Select date" type="text">
          </div>
        </div>
        <div class="form-group">
          <h4 class="form-control-label">Status<span class="text-danger">*</span></h4>
          <p class="small mb-1 font-weight-medium">ODP (Orang dalam pemantauan)</p>
          <div class="d-flex flex-row flex-wrap mb-1">
            <div class="custom-control custom-radio mb-3 mr-3">
              <input name="status" required value="odp_proses" class="custom-control-input" id="odp_proses" type="radio">
              <label class="custom-control-label" for="odp_proses">Proses pemantauan</label>
            </div>
            <div class="custom-control custom-radio mb-3 mr-3">
              <input name="status" required value="odp_selesai" class="custom-control-input" id="odp_selesai" type="radio">
              <label class="custom-control-label" for="odp_selesai">Selesai pemantauan</label>
            </div>
          </div>
          <p class="small mb-1 font-weight-medium">PDP (Pasien dalam pengawasan)</p>
          <div class="d-flex flex-row flex-wrap mb-1">
            <div class="custom-control custom-radio mb-3 mr-3">
              <input name="status" required value="pdp_perawatan" class="custom-control-input" id="pdp_perawatan" type="radio">
              <label class="custom-control-label" for="pdp_perawatan">Masih dirawat</label>
            </div>
            <div class="custom-control custom-radio mb-3 mr-3">
              <input name="status" required value="pdp_sembuh" class="custom-control-input" id="pdp_sembuh" type="radio">
              <label class="custom-control-label" for="pdp_sembuh">Pulang dan sehat</label>
            </div>
            <div class="custom-control custom-radio mb-3 mr-3">
              <input name="status" required value="pdp_meninggal" class="custom-control-input" id="pdp_meninggal" type="radio">
              <label class="custom-control-label" for="pdp_meninggal">Meninggal</label>
            </div>
          </div>
          <p class="small mb-1 font-weight-medium">Positif Covid-19</p>
          <div class="d-flex flex-row flex-wrap mb-1">
            <div class="custom-control custom-radio mb-3 mr-3">
              <input name="status" required value="positif_dirawat" class="custom-control-input" id="positif_dirawat" type="radio">
              <label class="custom-control-label" for="positif_dirawat">Masih dirawat</label>
            </div>
            <div class="custom-control custom-radio mb-3 mr-3">
              <input name="status" required value="positif_meninggal" class="custom-control-input" id="positif_meninggal" type="radio">
              <label class="custom-control-label" for="positif_meninggal">Meninggal</label>
            </div>
            <div class="custom-control custom-radio mb-3 mr-3">
              <input name="status" required value="positif_sembuh" class="custom-control-input" id="positif_sembuh" type="radio">
              <label class="custom-control-label" for="positif_sembuh">Pulang dan sehat</label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="small form-control-label" for="riwayat">Riwayat perjalanan</label>
          <textarea class="form-control form-control-sm form-control-alternative" name="riwayat" col="3" placeholder="Masukkan riwayat kontak dan perjalanan"></textarea>
        </div>
        <div class="form-group">
          <label class="small form-control-label" for="keterangan">Keterangan</label>
          <textarea class="form-control form-control-sm form-control-alternative" name="keterangan" col="3" placeholder="Masukkan keterangan"></textarea>
        </div>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalSimpan">Simpan</button>
        <!-- Modal -->
        <div class="modal fade" id="modalSimpan" tabindex="-1" role="dialog" aria-labelledby="labelModalSimpan" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="labelModalSimpan">Peringatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h3 class="m-0 font-weight-bold">Yakin ingin menyimpan data?</h3>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Ubah</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>