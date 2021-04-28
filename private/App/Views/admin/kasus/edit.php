<form action="<?= Web::url('admin.kasus.update.' . $data['id_kasus']) ?>" method="POST">
  <div class="card-group-flex-row card-group-flex-row-md">
    <div class="card bg-secondary shadow mb-3">
      <div class="card-body">
        <?php
        $data_flasher = Flasher::data();
        ?>
        <?= Web::key_field() ?>
        <div class="form-group">
          <label class="small form-control-label" for="tanggal">Tanggal<span class="text-danger">*</span></label>
          <input type="date" value="<?= $data_flasher ? $data_flasher['tanggal'] : $data['tanggal'] ?>" maxlength="50" placeholder="Masukkan tanggal" required name="tanggal" id="tanggal" class="form-control form-control-sm form-control-alternative">
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <div class="card mx-0 mb-3">
              <div class="card-header">
                <h5 class="m-0 fw-800 text-uppercase">ODP (Orang Dalam Pemantauan)</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md">
                    <div class="form-group">
                      <label class="small form-control-label" for="odp_proses">Proses pemantauan<span class="text-danger">*</span></label>
                      <input type="number" value="<?= $data_flasher ? $data_flasher['odp_proses'] : $data['odp_proses'] ?>" min="0" placeholder="Jumlah proses pemantauan" required name="odp_proses" id="odp_proses" class="form-control form-control-sm form-control-alternative">
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <label class="small form-control-label" for="odp_selesai">Selesai pemantauan<span class="text-danger">*</span></label>
                      <input type="number" value="<?= $data_flasher ? $data_flasher['odp_selesai'] : $data['odp_selesai'] ?>" min="0" placeholder="Jumlah selesai pemantauan" required name="odp_selesai" id="odp_selesai" class="form-control form-control-sm form-control-alternative">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="card mx-0 mb-3">
              <div class="card-header">
                <h5 class="m-0 fw-800 text-uppercase">PDP (Pasien Dalam Pengawasan)</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md">
                    <div class="form-group">
                      <label class="small form-control-label" for="pdp_rawat">Masih dirawat<span class="text-danger">*</span></label>
                      <input type="number" value="<?= $data_flasher ? $data_flasher['pdp_rawat'] : $data['pdp_rawat'] ?>" min="0" placeholder="Jumlah masih dirawat" required name="pdp_rawat" id="pdp_rawat" class="form-control form-control-sm form-control-alternative">
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <label class="small form-control-label" for="pdp_sehat">Pulang dan sehat<span class="text-danger">*</span></label>
                      <input type="number" value="<?= $data_flasher ? $data_flasher['pdp_sehat'] : $data['pdp_sehat'] ?>" min="0" placeholder="Jumlah pulang dan sehat" required name="pdp_sehat" id="pdp_sehat" class="form-control form-control-sm form-control-alternative">
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <label class="small form-control-label" for="pdp_meninggal">Meninggal<span class="text-danger">*</span></label>
                      <input type="number" value="<?= $data_flasher ? $data_flasher['pdp_meninggal'] : $data['pdp_meninggal'] ?>" min="0" placeholder="Jumlah meninggal" required name="pdp_meninggal" id="pdp_meninggal" class="form-control form-control-sm form-control-alternative">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="card mx-0 mb-3">
              <div class="card-header">
                <h5 class="m-0 fw-800 text-uppercase">KASUS POSITIF COVID-19/CORONA</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md">
                    <div class="form-group">
                      <label class="small form-control-label" for="positif_rawat">Masih dirawat<span class="text-danger">*</span></label>
                      <input type="number" value="<?= $data_flasher ? $data_flasher['positif_rawat'] : $data['positif_rawat'] ?>" min="0" placeholder="Jumlah masih dirawat" required name="positif_rawat" id="positif_rawat" class="form-control form-control-sm form-control-alternative">
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <label class="small form-control-label" for="positif_sehat">Pulang dan sehat<span class="text-danger">*</span></label>
                      <input type="number" value="<?= $data_flasher ? $data_flasher['positif_sehat'] : $data['positif_sehat'] ?>" min="0" placeholder="Jumlah pulang dan sehat" required name="positif_sehat" id="positif_sehat" class="form-control form-control-sm form-control-alternative">
                    </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <label class="small form-control-label" for="positif_meninggal">Meninggal<span class="text-danger">*</span></label>
                      <input type="number" value="<?= $data_flasher ? $data_flasher['positif_meninggal'] : $data['positif_meninggal'] ?>" min="0" placeholder="Jumlah meninggal" required name="positif_meninggal" id="positif_meninggal" class="form-control form-control-sm form-control-alternative">
                    </div>
                  </div>
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
                <th colspan="2" class="text-center">ODP</th>
                <th colspan="3" class="text-center">PDP</th>
                <th colspan="3" class="text-center">Positif</th>
              </tr>
              <tr>
                <th class="text-center">Proses</th>
                <th class="text-center">Selesai</th>
                <th class="text-center">Dirawat</th>
                <th class="text-center">Sehat</th>
                <th class="text-center">Meninggal</th>
                <th class="text-center">Dirawat</th>
                <th class="text-center">Sembuh</th>
                <th class="text-center">Meninggal</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $kecamatan = $data_flasher ? $data_flasher['data_kecamatan'] : $data['data_kecamatan'];
              foreach($kecamatan as $k) :
              ?>
                <tr>
                  <td class="text-center align-middle"><?= $no ?></td>
                  <td class="align-middle">
                    <?= $k['nama_kecamatan'] ?>
                    <input type="hidden" value="<?= $k['nama_kecamatan'] ?>" name="data_kecamatan[<?= $no - 1 ?>][nama_kecamatan]">
                  </td>
                  <td>
                    <input type="number" value="<?= $k['odp_proses'] ?? '' ?>" min="0" placeholder="" name="data_kecamatan[<?= $no - 1 ?>][odp_proses]" class="form-control form-control-sm form-control-alternative">
                  </td>
                  <td>
                    <input type="number" value="<?= $k['odp_selesai'] ?? '' ?>" min="0" placeholder="" name="data_kecamatan[<?= $no - 1 ?>][odp_selesai]" class="form-control form-control-sm form-control-alternative">
                  </td>
                  <td>
                    <input type="number" value="<?= $k['pdp_rawat'] ?? '' ?>" min="0" placeholder="" name="data_kecamatan[<?= $no - 1 ?>][pdp_rawat]" class="form-control form-control-sm form-control-alternative">
                  </td>
                  <td>
                    <input type="number" value="<?= $k['pdp_sehat'] ?? '' ?>" min="0" placeholder="" name="data_kecamatan[<?= $no - 1 ?>][pdp_sehat]" class="form-control form-control-sm form-control-alternative">
                  </td>
                  <td>
                    <input type="number" value="<?= $k['pdp_meninggal'] ?? '' ?>" min="0" placeholder="" name="data_kecamatan[<?= $no - 1 ?>][pdp_meninggal]" class="form-control form-control-sm form-control-alternative">
                  </td>
                  <td>
                    <input type="number" value="<?= $k['positif_rawat'] ?? '' ?>" min="0" placeholder="" name="data_kecamatan[<?= $no - 1 ?>][positif_rawat]" class="form-control form-control-sm form-control-alternative">
                  </td>
                  <td>
                    <input type="number" value="<?= $k['positif_sehat'] ?? '' ?>" min="0" placeholder="" name="data_kecamatan[<?= $no - 1 ?>][positif_sehat]" class="form-control form-control-sm form-control-alternative">
                  </td>
                  <td>
                    <input type="number" value="<?= $k['positif_meninggal'] ?? '' ?>" min="0" placeholder="" name="data_kecamatan[<?= $no - 1 ?>][positif_meninggal]" class="form-control form-control-sm form-control-alternative">
                  </td>
                </tr
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
        </div>
      </div>
    </div>
  </div>
</form>