<form action="<?= Web::url('admin.profil.update.' . $data['id_users']) ?>" method="POST" id="change-profil">
  <div class="card-group-flex-row card-group-flex-row-md">
    <div class="card bg-secondary shadow mb-3">
      <div class="card-body">
        <div class="form-group">
          <label class="small form-control-label" for="username">Username<span class="text-danger">*</span></label>
          <input value="<?= $data['username'] ?>" type="text" maxlength="50" placeholder="Masukan username" required name="attr[username]" id="username" class="form-control form-control-sm form-control-alternative">
        </div>
        <div class="form-group">
          <label class="small form-control-label" for="name">Nama<span class="text-danger">*</span></label>
          <input value="<?= $data['name'] ?>" type="text" maxlength="50" placeholder="Masukan nama" required name="attr[name]" id="name" class="form-control form-control-sm form-control-alternative">
        </div>
        <div class="form-group">
          <label class="small form-control-label" for="email">Email<span class="text-danger">*</span></label>
          <input value="<?= $data['email'] ?>" type="text" placeholder="Masukan email" required name="attr[email]" id="email" class="form-control form-control-sm form-control-alternative">
        </div>
        <hr>
        <div>
          <div class="form-group mb-1">
            <label class="small form-control-label" for="password">Password<span class="text-danger">*</span></label>
            <input type="password" placeholder="Masukan password" required name="password" id="password" class="form-control form-control-sm form-control-alternative">
          </div>
          <p class="small text-muted font-italic">Masukkan password untuk mengubah profil</p>
        </div>
      </div>
    </div>
    <div class="card bg-secondary shadow mb-3">
      <div class="card-body">
        <div class="mb-3">
          <h4 class="mt-0 mb-1 text-uppercase fw-800">Ganti password</h4>
          <p class="font-italic small text-muted mb-0">Isikan password baru untuk mengganti password</p>
        </div>
        <div class="form-group">
          <label class="small form-control-label" for="new_password">Password baru</label>
          <input type="password" placeholder="Masukan password baru" name="attr[password]" id="new_password" class="form-control form-control-sm form-control-alternative">
        </div>
        <div class="form-group">
          <label class="small form-control-label" for="re_new_password">Ulangi Password baru</label>
          <input type="password" placeholder="Ulangi masukan password baru" id="re_new_password" class="form-control form-control-sm form-control-alternative">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow mb-3 bg-secondary">
        <div class="card-body p-3">
          <button type="button" class="btn btn-primary btn-sm btn-save" data-toggle="modal" data-target="#modalSimpan">Simpan</button>
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
          <button type="reset" class="btn btn-warning btn-sm">Reset</button>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  let form = $('#change-profil')
  let input = form.find('.form-control')
  input.on('keyup', function () {
    isReady($(this).parents('form'))
  })
  isReady(form)
  function isReady(form) { 
    let filled = 0
    let required = form.find('input[required]')
    let newPass = form.find('[name=new_password]')
    let reNewPass = form.find('[name=re_new_password]')
    required.each(function() {
      this.value != '' ? filled += 1 : null
    })
    if (filled < required.length || (newPass !== '' && newPass.val() !== reNewPass.val())) {
      form.find('.btn-save').prop('disabled', true)
      return false
    }
    form.find('.btn-save').prop('disabled', false)
    return true
  }

  form.on('submit', function (e) {
    if(!isReady($(this))) {
      e.preventDefault()
    }
  })

  form.find('[id=re_new_password]').on('keyup', function () {
    if($(this).val() !== $(this).parents('.form-group').prev('.form-group').find('input').val()) {
      $(this).parents('.form-group').find('.msg').remove()
      $(this).parents('.form-group').append('<p class="msg small text-danger mb-0 mt-1 font-italic">Password tidak sama</p>')
    } else {
      $(this).parents('.form-group').find('.msg').remove()
    }
  })
</script>