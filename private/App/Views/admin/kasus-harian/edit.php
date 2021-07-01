<form action="<?= Web::url('admin.kasus-harian.update.' . md5($data['id_kasus_harian'])) ?>" method="POST">
  <div class="card-group-flex-row card-group-flex-row-md">
    <div class="card bg-secondary shadow mb-3">
      <div class="card-body">
        <?php
        $data_flasher = Flasher::data();
        ?>
        <?= Web::key_field() ?>
        <div class="form-group">
          <label for="tanggal">Tanggal <span class="text-danger">*</span></label>
          <input type="date" value="<?= $data_flasher ? $data_flasher['tanggal'] : $data['tanggal'] ?>" maxlength="50" placeholder="Masukkan tanggal" required name="tanggal" id="tanggal" class="form-control">
        </div>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead class="bg-secondary">
              <tr>
                <th class="text-center align-middle">#</th>
                <th class="text-center align-middle">Kecamatan</th>
                <th class="text-center">Jumlah Kasus</th>
                <th class="text-center">Jumlah Kasus Sembuh</th>
                <th class="text-center">Jumlah Kasus Meninggal</th>
              </tr>
            <tbody>
              <?php
              $no = 1;
              $kecamatan = $data_flasher ? $data_flasher['kasus_harian_data'] : $data['kasus_harian_data'];
              foreach ($kecamatan as $k) :
              ?>
                <tr>
                  <td class="text-center align-middle"><?= $no ?></td>
                  <td class="align-middle">
                    <?= $k['nama_kecamatan'] ?>
                    <input type="hidden" value="<?= $k['nama_kecamatan'] ?>" name="kasus_harian_data[<?= $no - 1 ?>][nama_kecamatan]">
                  </td>
                  <td>
                    <input type="number" value="<?= $k['kasus'] ?? '' ?>" min="0" placeholder="" name="kasus_harian_data[<?= $no - 1 ?>][kasus]" class="form-control">
                  </td>
                  <td>
                    <input type="number" value="<?= $k['sehat'] ?? '' ?>" min="0" placeholder="" name="kasus_harian_data[<?= $no - 1 ?>][sehat]" class="form-control">
                  </td>
                  <td>
                    <input type="number" value="<?= $k['meninggal'] ?? '' ?>" min="0" placeholder="" name="kasus_harian_data[<?= $no - 1 ?>][meninggal]" class="form-control">
                  </td>
                </tr>
              <?php
                $no++;
              endforeach;
              ?>
            </tbody>
          </table>
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