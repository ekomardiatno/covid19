<form action="<?= Web::url('admin.kontributor.update.' . $data['id_kontributor']) ?>" enctype="multipart/form-data" method="POST">
  <div class="card-group-flex-row card-group-flex-row-md">
    <div class="card bg-secondary shadow mb-3">
      <div class="card-body">
        <?php
        $data_flasher = Flasher::data();
        ?>
        <?= Web::key_field() ?>
        <div class="form-group">
          <input type="hidden" name="image_kontributor_old" value="<?= $data['image_kontributor'] ?>">
          <label class="small form-control-label mb-0" for="foto">Logo Kontributor</label>
          <p class="small text-muted mb-2">Ukuran upload maksimal 500kb</p>
          <div class="input-foto-wrapper">
            <div class="input-foto">
              <div class="preview-foto">
                <img src="<?= $data['image_kontributor'] ?>" />
              </div>
            </div>
            <input type="file" id="foto" max-size="500" name="image_kontributor">
          </div>
        </div>
        <div class="form-group">
          <label for="nama_kontributor">Nama Kontributor <span class="text-danger">*</span></label>
          <input type="text" maxlength="50" value="<?= $data_flasher ? $data_flasher['nama_kontributor'] : $data['nama_kontributor'] ?>" placeholder="Masukan nama kontributor" required name="nama_kontributor" id="nama_kontributor" class="form-control">
        </div>
        <div class="form-group mb-3">
          <label for="url_kontributor">URL Kontributor <span class="text-danger">*</span></label>
          <div class="input-with-button d-flex align-items-center mx--1">
            <input type="text" required maxlength="50" value="<?= $data_flasher ? $data_flasher['url_kontributor'] : $data['url_kontributor'] ?>" placeholder="Masukan URL kontributor" name="url_kontributor" id="url_kontributor" class="form-control mx-1 mb-0">
          </div>
        </div>
      </div>
    </div>
    <div class="card bg-secondary shadow mb-3">
      <div class="card-body">
        <div class="form-group">
          <label for="deskripsi_kontributor">Keterangan</label>
          <textarea placeholder="Keterangan" class="form-control" maxlength="200" name="deskripsi_kontributor" id="deskripsi_kontributor" rows="4"><?= $data_flasher ? $data_flasher['deskripsi_kontributor'] : $data['deskripsi_kontributor'] ?></textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="card shadow mb-3 bg-secondary">
        <div class="card-body p-3">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>