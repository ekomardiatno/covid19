<div class="row justify-content-center">
  <div class="col-lg-5 col-md-7">
    <div class="card bg-secondary shadow border-0">
      <div class="card-body px-lg-5 py-lg-5">
        <div class="text-center text-muted mb-4">
          <h4 class="fw-800 mt-0 mb-1 text-uppercase">Daftar akun</h4>
          <small>Gunakan email asli untuk mendaftar</small>
        </div>
        <form action="<?= Web::url('admin.register.action'); ?>" method="POST" role="form">
          <?= Web::FORM_KEY() ?>
          <div class="form-group mb-3">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-single-02"></i></span>
              </div>
              <input class="form-control" placeholder="Username" name="username" type="text">
            </div>
          </div>
          <div class="form-group mb-3">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
              </div>
              <input class="form-control" placeholder="Nama Lengkap" name="name" type="text">
            </div>
          </div>
          <div class="form-group mb-3">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
              </div>
              <input class="form-control" placeholder="Email" name="email" type="text">
            </div>
          </div>
          <div class="form-group mb-3">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-ungroup"></i></span>
              </div>
              <select class="form-control" name="role">
                <option value="admin">Admin</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
              </div>
              <input class="form-control" placeholder="Password" name="password" type="password">
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary my-4">Daftar</button>
          </div>
        </form>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-12 text-right">
        <a href="<?= Web::url('admin.login'); ?>" class="text-light"><small>Sudah punya akun? Masuk</small></a>
      </div>
    </div>
  </div>
</div>