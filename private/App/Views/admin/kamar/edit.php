<form action="<?= Web::url('admin.kamar.update') ?>" method="POST">
  <div class="card-group-flex-row card-group-flex-row-md">
    <div class="card bg-secondary shadow mb-3">
      <div class="card-body">
        <?php
        $data_flasher = Flasher::data();
        ?>
        <?= Web::key_field() ?>
        <div class="form-group">
          <label for="id_rumah_sakit">Rumah Sakit <span class="text-danger">*</span></label>
          <select class="form-control" required name="id_rumah_sakit" id="id_rumah_sakit">
            <?php foreach($data['rumah_sakit'] as $rs): ?>
            <option <?= $data_flasher ? ($data_flasher['id_rumah_sakit'] === $rs['id_rumah_sakit'] ? 'selected' : '') : ($data['id_rumah_sakit'] === $rs['id_rumah_sakit'] ? 'selected' : '') ?> value="0"><?= $rs['nama_rumah_sakit'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="nama_kamar">Nama Kamar <span class="text-danger">*</span></label>
          <input type="text" maxlength="100" value="<?= $data_flasher ? $data_flasher['nama_kotak'] : $data['nama_kamar'] ?>" placeholder="Nama Kamar" required name="nama_kamar" id="nama_kamar" class="form-control">
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label for="ketersediaan_kamar">Ketersediaan Kamar <span class="text-danger">*</span></label>
                  <input type="number" value="<?= $data_flasher ? $data_flasher['ketersediaan_kamar'] : $data['ketersediaan_kamar'] ?>" min="0" placeholder="Ketersediaan Kamar" required name="ketersediaan_kamar" id="ketersediaan_kamar" class="form-control">
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="kamar_tersedia">Kamar Yang Tersedia <span class="text-danger">*</span></label>
                  <input type="number" value="<?= $data_flasher ? $data_flasher['kamar_tersedia'] : $data['kamar_tersedia'] ?>" min="0" placeholder="Kamar Yang Tersedia" required name="kamar_tersedia" id="kamar_tersedia" class="form-control">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="card shadow mb-3 bg-secondary">
        <div class="card-body p-3">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </div>
    </div>
  </div>
</form>