<form action="<?= Web::url('admin.kasus.post') ?>" method="POST">
  <div class="card-group-flex-row card-group-flex-row-md">
    <div class="card bg-secondary shadow mb-3">
      <div class="card-body">
        <?= Web::FORM_KEY() ?>
        <div class="form-group">
          <label class="small form-control-label" for="nama">Nama<span class="text-danger">*</span></label>
          <input type="text" maxlength="50" placeholder="Masukan nama" required name="nama" id="nama" class="form-control form-control-sm form-control-alternative">
        </div>
        <div class="form-group">
          <label class="small form-control-label" for="umur">Umur<span class="text-danger">*</span></label>
          <input type="number" placeholder="Masukan umur" required name="umur" id="umur" class="form-control form-control-sm form-control-alternative">
        </div>
        <div class="form-group">
          <label class="small form-control-label" for="id_kecamatan">Kecamatan<span class="text-danger">*</span></label>
          <select class="form-control form-control-sm form-control-alternative" required="" name="id_kecamatan" id="id_kecamatan">
            <option value="">Pilih kecamatan</option>
            <?php
            foreach ($data['kecamatan'] as $k) :
            ?>
              <option value="<?= $k['id_kecamatan'] ?>"><?= $k['nama_kecamatan'] ?></option>
            <?php
            endforeach
            ?>
          </select>
        </div>
        <div class="form-group">
          <label class="small form-control-label" for="tanggal">Tanggal<span class="text-danger">*</span></label>
          <div class="input-group input-group-sm input-group-alternative">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
            </div>
            <input class="form-control datepicker" name="tanggal" id="tanggal" placeholder="Select date" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="small form-control-label" for="riwayat">Riwayat kontak dan perjalanan</label>
          <textarea class="form-control form-control-sm form-control-alternative" name="riwayat" col="3" placeholder="Masukkan riwayat kontak dan perjalanan"></textarea>
        </div>
      </div>
    </div>
    <div class="card bg-secondary shadow mb-3">
      <div class="card-body">
        <h4 class="mt-0 mb-3 text-uppercase fw-800">Status kasus<span class="text-danger">*</span></h4>
        <label class="form-control-label small">ODP (Orang dalam pemantauan)</label>
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
        <label class="form-control-label small">PDP (Pasien dalam pengawasan)</label>
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
        <label class="form-control-label small">Positif Covid-19</label>
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