<div class="card shadow">
  <div class="card-header border-0">
    <div class="d-flex flex-column-sm mx--3 align-items-center-md">
      <div class="mx-3 flex-fill d-flex align-items-center">
        <h3 class="mb-0 mb-2-sm text-uppercase fw-800">Ketersediaan Tempat Tidur</h3>
      </div>
      <div class="mx-3">
        <div class="mx--1 d-flex">
          <div class="mx-1 flex-fill">
            <div class="form-group mb-0">
              <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><span class="fas fa-search"></span></span>
                </div>
                <input type="text" class="form-control" placeholder="Cari" id="search-datatables">
              </div>
            </div>
          </div>
          <div class="mx-1 d-flex">
            <a href="<?= Web::url('admin.tempat-tidur.tambah'); ?>" class="btn btn-sm btn-primary d-flex align-items-center"><span class="fas fa-plus"></span><span class="d-none d-md-inline-block ml-1">Tambah Tempat Tidur</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Projects table -->
  <table class="table table-striped align-items-center table-flush datatables">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Rumah Sakit</th>
        <th scope="col">Nama Tempat Tidur</th>
        <th scope="col">Ketersediaan</th>
        <th scope="col">Terisi</th>
        <th scope="col">&nbsp;</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($data as $d) :
      ?>
        <!-- Modal -->
        <div class="modal fade" id="modalHapus-<?= $d['id_tempat_tidur'] ?>" tabindex="-1" role="dialog" aria-labelledby="labelModalHapus-<?= $d['id_tempat_tidur'] ?>" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="labelModalHapus-<?= $d['id_tempat_tidur'] ?>">Peringatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h3 class="m-0 font-weight-bold">Yakin ingin Menghapus data?</h3>
              </div>
              <div class="modal-footer">
                <form action="<?= Web::url('admin.tempat-tidur.delete') ?>" method="post">
                  <?= Web::key_field() ?>
                  <input type="hidden" name="id_tempat_tidur" value="<?= md5($d['id_tempat_tidur']) ?>">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <tr>
          <td><?= $no; ?></td>
          <td><?= $d['nama_rumah_sakit']; ?></td>
          <td><?= $d['nama_tempat_tidur']; ?></td>
          <td><?= $d['total_tempat_tidur']; ?></td>
          <td><?= $d['tempat_tidur_terisi']; ?></td>
          <td>
            <a href="<?= Web::url('admin.tempat-tidur.edit.' . md5($d['id_tempat_tidur'])) ?>" class="btn btn-warning">Edit</a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus-<?= $d['id_tempat_tidur'] ?>">Hapus</button>
          </td>
        </tr>
      <?php
        $no++;
      endforeach
      ?>
    </tbody>
  </table>
</div>