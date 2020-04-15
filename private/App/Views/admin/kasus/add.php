<form action="<?= Web::url('admin.kasus.post') ?>" method="POST">
  <div class="card-group-flex-row card-group-flex-row-md">
    <div class="card bg-secondary shadow mb-3">
      <div class="card-body">
        <?php
        $data_flasher = Flasher::data();
        ?>
        <div class="row">
          <div class="col-md">
            <?= Web::key_field() ?>
            <div class="form-group">
              <label class="small form-control-label" for="nik">NIK<span class="text-danger">*</span></label>
              <input type="text" value="<?= $data_flasher ? $data_flasher->nik : '' ?>" maxlength="50" placeholder="Masukan NIK" required name="nik" id="nik" class="form-control form-control-sm form-control-alternative">
            </div>
            <div class="form-group">
              <label class="small form-control-label" for="nama">Nama<span class="text-danger">*</span></label>
              <input type="text" value="<?= $data_flasher ? $data_flasher->nama : '' ?>" maxlength="50" placeholder="Masukan nama" required name="nama" id="nama" class="form-control form-control-sm form-control-alternative">
            </div>
            <div class="form-group">
              <label class="small form-control-label" for="id_kecamatan">Kecamatan<span class="text-danger">*</span></label>
              <select class="form-control form-control-sm form-control-alternative" required="" name="id_kecamatan" id="id_kecamatan">
                <option value="">Pilih kecamatan</option>
                <?php
                foreach ($data['kecamatan'] as $k) :
                ?>
                  <option <?= $data_flasher && $data_flasher->id_kecamatan === $k['id_kecamatan'] ? 'selected' : '' ?> value="<?= $k['id_kecamatan'] ?>"><?= $k['nama_kecamatan'] ?></option>
                <?php
                endforeach
                ?>
              </select>
            </div>
          </div>
          <div class="col-md">
            <div class="form-group">
              <label class="small form-control-label" for="umur">Umur<span class="text-danger">*</span></label>
              <input type="number" value="<?= $data_flasher ? $data_flasher->umur : '' ?>" min="0" placeholder="Masukan umur" required name="umur" id="umur" class="form-control form-control-sm form-control-alternative">
            </div>
            <div class="form-group">
              <label class="small form-control-label" for="hp">No. HP<span class="text-danger">*</span></label>
              <input type="text" value="<?= $data_flasher ? $data_flasher->hp : '' ?>" placeholder="Masukan nomor HP" required name="hp" id="hp" class="form-control form-control-sm form-control-alternative">
            </div>
            <div class="form-group">
              <label class="small form-control-label" for="jenis_kelamin">Jenis Kelamin<span class="text-danger">*</span></label>
              <select class="form-control form-control-sm form-control-alternative" required="" name="jenis_kelamin" id="jenis_kelamin">
                <option value="">Pilih jenis kelamin</option>
                <option <?= $data_flasher && $data_flasher->jenis_kelamin === 'L' ? 'selected' : '' ?> value="L">Laki-laki</option>
                <option <?= $data_flasher && $data_flasher->jenis_kelamin === 'P' ? 'selected' : '' ?> value="P">Perempuan</option>
              </select>
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
          <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
          <button type="reset" class="btn btn-warning btn-sm">Reset</button>
        </div>
      </div>
    </div>
  </div>
</form>