<div class="card shadow">
  <div class="card-header border-0">
    <div class="d-flex flex-column-sm mx--3 align-items-center-md">
      <div class="mx-3 flex-fill d-flex align-items-center">
        <h3 class="mb-0 mb-2-sm text-uppercase fw-800">Kasus Harian</h3>
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
            <a href="<?= Web::url('admin.kasus-harian.tambah'); ?>" class="btn btn-sm btn-primary d-flex align-items-center"><span class="fas fa-plus"></span><span class="d-none d-md-inline-block ml-1">Tambah Kasus</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Projects table -->
  <table class="table table-striped align-items-center table-flush datatables">
    <thead class="thead-light">
      <tr>
        <th width="1%" scope="col">#</th>
        <th scope="col">Tanggal</th>
        <th scope="col">&nbsp;</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($data as $d) :
      ?>
        <tr>
          <td>
            <?= $no ?>
            <!-- Modal -->
            <div class="modal fade" id="modalHapus-<?= $d['id_kasus_harian'] ?>" tabindex="-1" role="dialog" aria-labelledby="labelModalHapus-<?= $d['id_kasus_harian'] ?>" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="labelModalHapus-<?= $d['id_kasus_harian'] ?>">Peringatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h3 class="m-0 font-weight-bold">Yakin ingin Menghapus data <?= Mod::dateID($d['tanggal']) ?>?</h3>
                  </div>
                  <div class="modal-footer">
                    <form action="<?= Web::url('admin.kasus-harian.delete') ?>" method="post">
                      <?= Web::key_field() ?>
                      <input type="hidden" name="id_kasus_harian" value="<?= $d['id_kasus_harian'] ?>">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </td>
          <td><?= Mod::dateID($d['tanggal']); ?></td>
          <td>
            <a href="<?= Web::url('admin.kasus-harian.edit.' . $d['id_kasus_harian']) ?>" class="btn btn-primary"><span class="fas fa-user"></span> Edit</a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalHapus-<?= $d['id_kasus_harian'] ?>"><span class="fas fa-trash-alt"></span> Hapus</button>
          </td>
        </tr>
      <?php
        $no++;
      endforeach;
      ?>
    </tbody>
  </table>
</div>