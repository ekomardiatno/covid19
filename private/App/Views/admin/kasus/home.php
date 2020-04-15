<div class="card shadow">
  <div class="card-header border-0">
    <div class="d-flex flex-column-sm mx--3 align-items-center-md">
      <div class="mx-3 flex-fill d-flex align-items-center">
        <h3 class="mb-0 mb-2-sm text-uppercase fw-800">Daftar Kasus COVID-19</h3>
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
            <a href="<?= Web::url('admin.kasus.tambah'); ?>" class="btn btn-sm btn-primary d-flex align-items-center"><span class="fas fa-plus"></span><span class="d-none d-md-inline-block ml-1">Tambah Pasien</span></a>
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
        <th scope="col">NIK</th>
        <th scope="col">Nama Pasien</th>
        <th scope="col">Kecamatan</th>
        <th scope="col">Umur</th>
        <th scope="col">Jenis Kelamin</th>
        <th scope="col">No. HP</th>
        <th scope="col">Terakhir diperbarui</th>
        <th scope="col">Status</th>
        <th scope="col">&nbsp;</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($data as $d) :
        $text = '-';
        $color = 'default';
        $d['status'] = explode('_', $d['status']);
        switch ($d['status'][0]) {
          case 'odp':
            $text = 'ODP';
            if ($d['status'][1] === 'proses') {
              $text .= ': Proses pemantauan';
            } else {
              $text .= ': Selesai pemantauan';
            }
            $color = 'success';
            break;
          case 'pdp':
            $text = 'PDP';
            if ($d['status'][1] === 'perawatan') {
              $text .= ': Masih dirawat';
              $color = 'warning';
            } else if ($d['status'][1] === 'sembuh') {
              $text .= ': Pulang dan sehat';
              $color = 'success';
            } else {
              $text .= ': Meninggal';
              $color = 'danger';
            }
            break;
          case 'positif':
            $text = 'Positif';
            if ($d['status'][1] === 'dirawat') {
              $text .= ': Masih dirawat';
              $color = 'warning';
            } else if ($d['status'][1] === 'sembuh') {
              $text .= ': Pulang dan sehat';
              $color = 'success';
            } else {
              $text .= ': Meninggal';
              $color = 'danger';
            }
            break;
        }
      ?>
        <!-- Modal -->
        <div class="modal fade" id="modalHapus-<?= $d['id_kasus'] ?>" tabindex="-1" role="dialog" aria-labelledby="labelModalHapus-<?= $d['id_kasus'] ?>" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="labelModalHapus-<?= $d['id_kasus'] ?>">Peringatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h3 class="m-0 font-weight-bold">Yakin ingin Menghapus data?</h3>
              </div>
              <div class="modal-footer">
                <form action="<?= Web::url('admin.kasus.delete') ?>" method="post">
                  <?= Web::key_field() ?>
                  <input type="hidden" name="id_kasus" value="<?= $d['id_kasus'] ?>">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <tr>
          <td><?= $no; ?></td>
          <td><?= $d['nik']; ?></td>
          <td><?= $d['nama']; ?></td>
          <td><?= $d['nama_kecamatan']; ?></td>
          <td><?= $d['umur']; ?></td>
          <td><?= $d['jenis_kelamin'] === 'L' ? 'Laki-laki' : 'Perempuan'; ?></td>
          <td><?= $d['hp']; ?></td>
          <td><?= Mod::dateID($d['tanggal']); ?></td>
          <td><?= $d['status'] === '' ? '-' : '<span class="badge badge-' . $color . '">' . $text . '</span>'; ?></td>
          <td>
            <a href="<?= Web::url('admin.kasus.edit.' . $d['id_kasus']) ?>" class="btn btn-primary btn-sm"><span class="fas fa-user"></span> Ubah Identitas</a>
            <a href="<?= Web::url('admin.kasus.monitor.' . $d['id_kasus']) ?>" class="btn btn-warning btn-sm"><span class="fas fa-desktop"></span> Monitor Kasus</a>
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus-<?= $d['id_kasus'] ?>"><span class="fas fa-trash-alt"></span> Hapus</button>
          </td>
        </tr>
      <?php
        $no++;
      endforeach;
      ?>
    </tbody>
  </table>
</div>