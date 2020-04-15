<div class="row justify-content-center">
  <div class="col-lg-5 col-md-7">
    <div class="card bg-secondary shadow border-0">
      <div class="card-body px-lg-5 py-lg-5">
        <div class="text-center text-muted mb-4">
          <h4 class="fw-800 mt-0 mb-1 text-uppercase">Selamat datang</h4>
          <small>Masukan username dan password untuk masuk</small>
        </div>
        <form action="<?= Web::url('admin.login.action'); ?>" method="POST" role="form">
          <?= Web::key_field() ?>
          <div class="form-group mb-3">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-single-02"></i></span>
              </div>
              <input class="form-control" placeholder="Username" name="username" type="text">
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
            <button type="submit" class="btn btn-primary my-4">Masuk</button>
          </div>
        </form>
      </div>
    </div>
    <!-- <div class="row mt-3">
      <div class="col-12 text-right">
        <a href="<?= Web::url('admin.register'); ?>" class="text-light"><small>Buat akun baru</small></a>
      </div>
    </div> -->
  </div>
</div>