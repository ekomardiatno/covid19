<form action="<?= Web::url('admin.rumah-sakit.post') ?>" method="POST">
  <div class="card-group-flex-row card-group-flex-row-md">
    <div class="card bg-secondary shadow mb-3">
      <div class="card-body">
        <?= Web::key_field() ?>
        <div class="form-group">
          <label for="nama_rumah_sakit">Nama rumah sakit <span class="text-danger">*</span></label>
          <input required type="text" maxlength="50" placeholder="Masukan nama rumah sakit" required name="nama_rumah_sakit" id="nama_rumah_sakit" class="form-control">
        </div>
        <div class="form-group">
          <label for="alamat_rumah_sakit">Alamat rumah sakit <span class="text-danger">*</span></label>
          <textarea required placeholder="Alamat rumah sakit" class="form-control" name="alamat_rumah_sakit" id="alamat_rumah_sakit" rows="4"></textarea>
        </div>
        <h4 class="m-0 fw-800 text-uppercase mb-2">Lokasi Rumah Sakit</h4>
        <div class="form-group">
          <label for="latitude">Latitude</label>
          <input type="number" step="any" placeholder="Masukan garis lintang" name="latitude" id="latitude" class="form-control">
        </div>
        <div class="form-group">
          <label for="longitude">Latitude</label>
          <input type="number" step="any" placeholder="Masukan garis bujur" name="longitude" id="longitude" class="form-control">
        </div>
      </div>
    </div>
    <div class="card bg-secondary shadow mb-3">
      <div class="card-body">
        <div class="form-group mb-3">
          <label for="telepon_rumah_sakit">Nomor telepon</label>
          <div class="input-with-button d-flex align-items-center mx--1">
            <input type="text" maxlength="20" placeholder="Masukan nomor telepon" name="telepon_rumah_sakit[]" id="telepon_rumah_sakit" class="form-control mx-1 mb-0">
            <button type="button" class="btn btn-danger mx-1 remove-element"><span class="fas fa-trash"></span></button>
          </div>
        </div>
        <button type="button" class="btn btn-primary btn-block mb-3 add-element">Tambah nomor telepon</button>
        <script>
          $('.add-element').on('click', function() {
            let html = `
              <div class="input-with-button d-flex align-items-center mx--1">
                <input type="text" maxlength="20" placeholder="Masukan nomor telepon" name="telepon_rumah_sakit[]" id="telepon_rumah_sakit" class="form-control mx-1 mb-0">
                <button type="button" class="btn btn-danger mx-1 remove-element"><span class="fas fa-trash"></span></button>
              </div>
            `
            $(this).prev('.form-group').append(html)
            toggleButton($('.input-with-button'))
          })
          $('body').on('click', '.remove-element', function() {
            let parent = $(this).parent('.input-with-button')
            if ($('.input-with-button').length > 1) {
              parent.remove()
            }
            toggleButton($('.input-with-button'))
          })

          let toggleButton = (inputWithButton = null) => {
            if (inputWithButton.length > 1) {
              inputWithButton.eq(0).children('button.remove-element').prop('disabled', false)
            } else {
              inputWithButton.eq(0).children('button.remove-element').prop('disabled', true)
            }
          }

          toggleButton($('.input-with-button'))
        </script>
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