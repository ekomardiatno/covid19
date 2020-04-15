<form action="<?= Web::url('admin.kasus.update.' . $data['kasus']['id_kasus']) ?>" method="POST">
  <div class="card-group-flex-row card-group-flex-row-md">
    <div class="card bg-secondary shadow mb-3">
      <div class="card-body">
        <div class="row">
          <div class="col-md">
            <?= Web::key_field() ?>
            <div class="form-group">
              <label class="small form-control-label" for="nik">NIK<span class="text-danger">*</span></label>
              <input value="<?= $data['kasus']['nik'] ?>" type="text" maxlength="50" placeholder="Masukan NIK" required name="nik" id="nik" class="form-control form-control-sm form-control-alternative">
            </div>
            <div class="form-group">
              <label class="small form-control-label" for="nama">Nama<span class="text-danger">*</span></label>
              <input value="<?= $data['kasus']['nama'] ?>" type="text" maxlength="50" placeholder="Masukan nama" required name="nama" id="nama" class="form-control form-control-sm form-control-alternative">
            </div>
            <div class="form-group">
              <label class="small form-control-label" for="id_kecamatan">Kecamatan<span class="text-danger">*</span></label>
              <select class="form-control form-control-sm form-control-alternative" required="" name="id_kecamatan" id="id_kecamatan">
                <option value="">Pilih kecamatan</option>
                <?php
                foreach ($data['kecamatan'] as $k) :
                ?>
                  <option <?= $k['id_kecamatan'] === $data['kasus']['id_kecamatan'] ? 'selected' : '' ?> value="<?= $k['id_kecamatan'] ?>"><?= $k['nama_kecamatan'] ?></option>
                <?php
                endforeach
                ?>
              </select>
            </div>
          </div>
          <div class="col-md">
            <div class="form-group">
              <label class="small form-control-label" for="umur">Umur<span class="text-danger">*</span></label>
              <input value="<?= $data['kasus']['umur'] ?>" type="number" placeholder="Masukan umur" required name="umur" id="umur" class="form-control form-control-sm form-control-alternative">
            </div>
            <div class="form-group">
              <label class="small form-control-label" for="hp">No. HP<span class="text-danger">*</span></label>
              <input value="<?= $data['kasus']['hp'] ?>" type="text" placeholder="Masukan nomor HP" required name="hp" id="hp" class="form-control form-control-sm form-control-alternative">
            </div>
            <div class="form-group">
              <label class="small form-control-label" for="jenis_kelamin">Jenis Kelamin<span class="text-danger">*</span></label>
              <select class="form-control form-control-sm form-control-alternative" required="" name="jenis_kelamin" id="jenis_kelamin">
                <option value="">Pilih jenis kelamin</option>
                <option <?= $data['kasus']['jenis_kelamin'] === 'L' ? 'selected' : '' ?> value="L">Laki-laki</option>
                <option <?= $data['kasus']['jenis_kelamin'] === 'P' ? 'selected' : '' ?> value="P">Perempuan</option>
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
          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalSimpan">Ubah</button>
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
                  <h3 class="m-0 font-weight-bold">Yakin ingin mengubah data?</h3>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
              </div>
            </div>
          </div>
          <a href="<?= Web::url('admin.kasus') ?>" class="btn btn-warning btn-sm">Kembali</a>
        </div>
      </div>
    </div>
  </div>
</form>