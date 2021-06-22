<div class="card shadow">
  <div class="card-header border-0">
    <div class="d-flex flex-column-sm mx--3 align-items-center-md">
      <div class="mx-3 flex-fill d-flex align-items-center">
        <h3 class="mb-0 mb-2-sm text-uppercase fw-800">Kontributor</h3>
      </div>
      <div class="mx-3">
        <div class="mx--1 d-flex">
          <div class="mx-1 flex-fill">
            <div class="form-group mb-0">
              <div class="input-group input-group-sm input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><span class="fas fa-search"></span></span>
                </div>
                <input type="text" class="form-control" placeholder="Cari" id="search-datatables">
              </div>
            </div>
          </div>
          <div class="mx-1 d-flex">
            <a href="<?= Web::url('admin.kontributor.tambah'); ?>" class="btn btn-sm btn-primary d-flex align-items-center"><span class="fas fa-plus"></span><span class="d-none d-md-inline-block ml-1">Tambah Kontributor</span></a>
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
        <th scope="col">Logo Kontributor</th>
        <th scope="col">Nama Kontributor</th>
        <th scope="col">URL Kontributor</th>
        <th scope="col">Keterangan</th>
        <th scope="col">&nbsp;</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($data as $d) :
      ?>
        <!-- Modal -->
        <div class="modal fade" id="modalHapus-<?= $d['id_kontributor'] ?>" tabindex="-1" role="dialog" aria-labelledby="labelModalHapus-<?= $d['id_kontributor'] ?>" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="labelModalHapus-<?= $d['id_kontributor'] ?>">Peringatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h3 class="m-0 font-weight-bold">Yakin ingin Menghapus data?</h3>
              </div>
              <div class="modal-footer">
                <form action="<?= Web::url('admin.kontributor.delete') ?>" method="post">
                  <?= Web::key_field() ?>
                  <input type="hidden" name="id_kontributor" value="<?= $d['id_kontributor'] ?>">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <tr>
          <td><?= $no; ?></td>
          <td><img src='<?= $d['image_kontributor']; ?>' width="50" height="50" /></td>
          <td><?= $d['nama_kontributor']; ?></td>
          <td>
            <?php if(filter_var($d['url_kontributor'], FILTER_VALIDATE_URL)): ?>
            <a href='<?= $d['url_kontributor']; ?>' target="_blank"><?= $d['url_kontributor']; ?></a>
            <?php else: ?>
            Link tidak valid
            <?php endif; ?>
          </td>
          <td><?= $d['deskripsi_kontributor'] !== '' ? $d['deskripsi_kontributor'] : '-'; ?></td>
          <td>
            <a href="<?= Web::url('admin.kontributor.edit.' . $d['id_kontributor']) ?>" class="btn btn-warning">Edit</a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus-<?= $d['id_kontributor'] ?>">Hapus</button>
          </td>
        </tr>
      <?php
        $no++;
      endforeach
      ?>
    </tbody>
  </table>
</div>