<form action="<?= Web::url('admin.kontak.post') ?>" method="POST">
  <div class="card-group-flex-row card-group-flex-row-md">
    <div class="card bg-secondary shadow mb-3">
      <div class="card-body">
        <?php
        $data_flasher = Flasher::data();
        ?>
        <?= Web::key_field() ?>
        <div class="form-group">
          <label for="tipe_kontak">Tipe kontak <span class="text-danger">*</span></label>
          <select class="form-control" required name="tipe_kontak" id="tipe_kontak">
            <option <?= $data_flasher ? ($data_flasher['tipe_kontak'] === '0' ? 'selected' : '') : '' ?> value="0">Hotline</option>
            <option <?= $data_flasher ? ($data_flasher['tipe_kontak'] === '1' ? 'selected' : '') : '' ?> value="1">Dokter</option>
          </select>
        </div>
        <div class="form-group">
          <label for="nama_kontak">Nama kontak <span class="text-danger">*</span></label>
          <input type="text" maxlength="50" value="<?= $data_flasher ? $data_flasher['nama_kotak'] : '' ?>" placeholder="Masukan nama kontak" required name="nama_kontak" id="nama_kontak" class="form-control">
        </div>
        <div class="form-group mb-3">
          <label for="no_hp">Nomor telepon <span class="text-danger">*</span></label>
          <div class="input-with-button d-flex align-items-center mx--1">
            <input type="text" required maxlength="15" value="<?= $data_flasher ? $data_flasher['no_hp'] : '' ?>" placeholder="Masukan nomor telepon" name="no_hp" id="no_hp" class="form-control mx-1 mb-0">
          </div>
        </div>
      </div>
    </div>
    <div class="card bg-secondary shadow mb-3">
      <div class="card-body">
        <div class="form-group">
          <label for="keterangan">Keterangan</label>
          <textarea placeholder="Keterangan" class="form-control" name="keterangan" id="keterangan" rows="4"><?= $data_flasher ? $data_flasher['keterangan'] : '' ?></textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="card shadow mb-3 bg-secondary">
        <div class="card-body p-3">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-warning">Reset</button>
        </div>
      </div>
    </div>
  </div>
</form>