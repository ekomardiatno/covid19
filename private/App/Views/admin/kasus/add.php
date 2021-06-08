<form action="<?= Web::url('admin.kasus.post') ?>" method="POST">
  <div class="card-group-flex-row card-group-flex-row-md">
    <div class="card bg-secondary shadow mb-3">
      <div class="card-body">
        <?php
        $data_flasher = Flasher::data();
        ?>
        <?= Web::key_field() ?>
        <div class="form-group">
          <label class="small form-control-label" for="tanggal">Tanggal<span class="text-danger">*</span></label>
          <input type="date" value="<?= $data_flasher ? $data_flasher['tanggal'] : date('Y-m-d') ?>" maxlength="50" placeholder="Masukkan tanggal" required name="tanggal" id="tanggal" class="form-control form-control-sm">
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <h4 class="m-0 fw-800 text-uppercase mb-2">Spesimen</h4>
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label class="small form-control-label" for="odp_proses">Hasil Negatif<span class="text-danger">*</span></label>
                  <input type="number" value="<?= $data_flasher ? $data_flasher['odp_proses'] : '' ?>" min="0" placeholder="Hasil Negatif" required name="odp_proses" id="odp_proses" class="form-control form-control-sm">
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label class="small form-control-label" for="odp_selesai">Hasil Positif<span class="text-danger">*</span></label>
                  <input type="number" value="<?= $data_flasher ? $data_flasher['odp_selesai'] : '' ?>" min="0" placeholder="Hasil Positif" required name="odp_selesai" id="odp_selesai" class="form-control form-control-sm">
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <h4 class="m-0 fw-800 text-uppercase mb-2">Suspek</h4>
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label class="small form-control-label" for="pdp_rumah">Isolasi Mandiri<span class="text-danger">*</span></label>
                  <input type="number" value="<?= $data_flasher ? $data_flasher['pdp_rumah'] : '' ?>" min="0" placeholder="Isolasi Mandiri" required name="pdp_rumah" id="pdp_rumah" class="form-control form-control-sm">
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label class="small form-control-label" for="pdp_rawat">Isolasi di RS<span class="text-danger">*</span></label>
                  <input type="number" value="<?= $data_flasher ? $data_flasher['pdp_rawat'] : '' ?>" min="0" placeholder="Isolasi di RS" required name="pdp_rawat" id="pdp_rawat" class="form-control form-control-sm">
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label class="small form-control-label" for="pdp_sehat">Selesai Isolasi<span class="text-danger">*</span></label>
                  <input type="number" value="<?= $data_flasher ? $data_flasher['pdp_sehat'] : '' ?>" min="0" placeholder="Selesai Isolasi" required name="pdp_sehat" id="pdp_sehat" class="form-control form-control-sm">
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label class="small form-control-label" for="pdp_meninggal">Meninggal<span class="text-danger">*</span></label>
                  <input type="number" value="<?= $data_flasher ? $data_flasher['pdp_meninggal'] : '' ?>" min="0" placeholder="Meninggal" required name="pdp_meninggal" id="pdp_meninggal" class="form-control form-control-sm">
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <h4 class="m-0 fw-800 text-uppercase mb-2">Terkonfirmasi</h4>
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label class="small form-control-label" for="positif_rumah">Isolasi Mandiri<span class="text-danger">*</span></label>
                  <input type="number" value="<?= $data_flasher ? $data_flasher['positif_rumah'] : '' ?>" min="0" placeholder="Isolasi Mandiri" required name="positif_rumah" id="positif_rumah" class="form-control form-control-sm">
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label class="small form-control-label" for="positif_rawat">Isolasi di RS<span class="text-danger">*</span></label>
                  <input type="number" value="<?= $data_flasher ? $data_flasher['positif_rawat'] : '' ?>" min="0" placeholder="Isolasi di RS" required name="positif_rawat" id="positif_rawat" class="form-control form-control-sm">
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label class="small form-control-label" for="positif_sehat">Selesai Isolasi<span class="text-danger">*</span></label>
                  <input type="number" value="<?= $data_flasher ? $data_flasher['positif_sehat'] : '' ?>" min="0" placeholder="Selesai Isolasi" required name="positif_sehat" id="positif_sehat" class="form-control form-control-sm">
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label class="small form-control-label" for="positif_meninggal">Meninggal<span class="text-danger">*</span></label>
                  <input type="number" value="<?= $data_flasher ? $data_flasher['positif_meninggal'] : '' ?>" min="0" placeholder="Meninggal" required name="positif_meninggal" id="positif_meninggal" class="form-control form-control-sm">
                </div>
              </div>
            </div>
          </div>
        </div>

        <h2 class="fw-800">Detail kasus kecamatan</h2>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead class="bg-secondary">
              <tr>
                <th rowspan="2" class="text-center align-middle">#</th>
                <th rowspan="2" class="text-center align-middle">Kecamatan</th>
                <th colspan="2" class="text-center">Spesimen</th>
                <th colspan="4" class="text-center">Suspek</th>
                <th colspan="4" class="text-center">Terkonfirmasi</th>
              </tr>
              <tr>
                <th class="text-center">Hasil Negatif</th>
                <th class="text-center">Hasil positif</th>
                <th class="text-center">Isolasi Mandiri</th>
                <th class="text-center">Isolasi di RS</th>
                <th class="text-center">Selesai Isolasi</th>
                <th class="text-center">Meninggal</th>
                <th class="text-center">Isolasi Mandiri</th>
                <th class="text-center">Isolasi di RS</th>
                <th class="text-center">Selesai Isolasi</th>
                <th class="text-center">Meninggal</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $kecamatan = $data_flasher ? $data_flasher['data_kecamatan'] : $data['kecamatan'];
              foreach ($kecamatan as $k) :
              ?>
                <tr>
                  <td class="text-center align-middle"><?= $no ?></td>
                  <td class="align-middle">
                    <?= $k['nama_kecamatan'] ?>
                    <input type="hidden" value="<?= $k['nama_kecamatan'] ?>" name="data_kecamatan[<?= $no - 1 ?>][nama_kecamatan]">
                  </td>
                  <td>
                    <input type="number" value="<?= $k['odp_proses'] ?? '' ?>" min="0" placeholder="" name="data_kecamatan[<?= $no - 1 ?>][odp_proses]" class="form-control form-control-sm">
                  </td>
                  <td>
                    <input type="number" value="<?= $k['odp_selesai'] ?? '' ?>" min="0" placeholder="" name="data_kecamatan[<?= $no - 1 ?>][odp_selesai]" class="form-control form-control-sm">
                  </td>
                  <td>
                    <input type="number" value="<?= $k['pdp_rumah'] ?? '' ?>" min="0" placeholder="" name="data_kecamatan[<?= $no - 1 ?>][pdp_rumah]" class="form-control form-control-sm">
                  </td>
                  <td>
                    <input type="number" value="<?= $k['pdp_rawat'] ?? '' ?>" min="0" placeholder="" name="data_kecamatan[<?= $no - 1 ?>][pdp_rawat]" class="form-control form-control-sm">
                  </td>
                  <td>
                    <input type="number" value="<?= $k['pdp_sehat'] ?? '' ?>" min="0" placeholder="" name="data_kecamatan[<?= $no - 1 ?>][pdp_sehat]" class="form-control form-control-sm">
                  </td>
                  <td>
                    <input type="number" value="<?= $k['pdp_meninggal'] ?? '' ?>" min="0" placeholder="" name="data_kecamatan[<?= $no - 1 ?>][pdp_meninggal]" class="form-control form-control-sm">
                  </td>
                  <td>
                    <input type="number" value="<?= $k['positif_rumah'] ?? '' ?>" min="0" placeholder="" name="data_kecamatan[<?= $no - 1 ?>][positif_rumah]" class="form-control form-control-sm">
                  </td>
                  <td>
                    <input type="number" value="<?= $k['positif_rawat'] ?? '' ?>" min="0" placeholder="" name="data_kecamatan[<?= $no - 1 ?>][positif_rawat]" class="form-control form-control-sm">
                  </td>
                  <td>
                    <input type="number" value="<?= $k['positif_sehat'] ?? '' ?>" min="0" placeholder="" name="data_kecamatan[<?= $no - 1 ?>][positif_sehat]" class="form-control form-control-sm">
                  </td>
                  <td>
                    <input type="number" value="<?= $k['positif_meninggal'] ?? '' ?>" min="0" placeholder="" name="data_kecamatan[<?= $no - 1 ?>][positif_meninggal]" class="form-control form-control-sm">
                  </td>
                </tr>
              <?php
                $no++;
              endforeach;
              ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="card shadow mb-3 bg-secondary">
        <div class="card-body p-3">
          <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
          <button type="reset" class="btn btn-warning btn-sm">Reset</button>
        </div>
      </div>
    </div>
  </div>
</form>