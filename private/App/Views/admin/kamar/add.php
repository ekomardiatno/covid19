<form action="<?= Web::url('admin.kamar.post') ?>" method="POST">
  <div class="card-group-flex-row card-group-flex-row-md">
    <div class="card bg-secondary shadow mb-3">
      <div class="card-body">
        <?php
        $data_flasher = Flasher::data();
        ?>
        <?= Web::key_field() ?>
        <div class="form-group">
          <label for="id_rumah_sakit">Rumah Sakit <span class="text-danger">*</span></label>
          <select class="form-control" required name="id_rumah_sakit" id="id_rumah_sakit">
            <?php foreach($data['rumah_sakit'] as $rs): ?>
            <option <?= $data_flasher ? ($data_flasher['id_rumah_sakit'] === $rs['id_rumah_sakit'] ? 'selected' : '') : '' ?> value="<?= $rs['id_rumah_sakit'] ?>"><?= $rs['nama_rumah_sakit'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="form-group">
          <label for="nama_kamar">Nama Kamar <span class="text-danger">*</span></label>
          <input type="text" maxlength="100" value="<?= $data_flasher ? $data_flasher['nama_kotak'] : '' ?>" placeholder="Nama Kamar" required name="nama_kamar" id="nama_kamar" class="form-control">
        </div>
        <div class="row mb-3">
          <div class="col-12">
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                  <label for="ketersediaan_kamar">Ketersediaan Kamar <span class="text-danger">*</span></label>
                  <input type="number" value="<?= $data_flasher ? $data_flasher['ketersediaan_kamar'] : 0 ?>" min="0" placeholder="Ketersediaan Kamar" required name="ketersediaan_kamar" id="ketersediaan_kamar" class="form-control">
                </div>
              </div>
              <div class="col-md">
                <div class="form-group">
                  <label for="kamar_terisi">Kamar Yang Terisi <span class="text-danger">*</span></label>
                  <input type="number" value="<?= $data_flasher ? $data_flasher['kamar_terisi'] : 0 ?>" min="0" placeholder="Kamar Yang Terisi" required name="kamar_terisi" id="kamar_terisi" class="form-control">
                </div>
              </div>
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
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
let timeout1 = null
let timeout2 = null
let timeout3 = null
let timeout4 = null
let roomAvailability = document.getElementById('ketersediaan_kamar')
let roomFilled = document.getElementById('kamar_terisi')
let checkRoomFilled = () => {
  if(parseInt(roomAvailability.value) < parseInt(roomFilled.value)) {
    if(timeout3 !== null) {
      clearTimeout(timeout3)
    }
    let span = document.createElement("SPAN");
    if(roomAvailability.nextElementSibling === null) {
      span.classList.add('small')
      span.classList.add('text-danger')
      span.innerText = "Tidak boleh kurang dari jumlah kamar yang terisi"
      roomAvailability.after(span)
    }
    timeout3 = setTimeout(() => {
      if(roomAvailability.nextElementSibling !== null) {
        roomAvailability.nextElementSibling.remove()
      }
      roomAvailability.value = roomFilled.value
    }, 1000)
  }
}
let checkRoomAvailability = () => {
  if(parseInt(roomFilled.value) > parseInt(roomAvailability.value)) {
    if(timeout4 !== null) {
      clearTimeout(timeout4)
    }
    let span = document.createElement("SPAN");
    if(roomFilled.nextElementSibling === null) {
      span.classList.add('small')
      span.classList.add('text-danger')
      span.innerText = "Tidak boleh lebih dari jumlah ketersediaan kamar"
      roomFilled.after(span)
    }
    timeout4 = setTimeout(() => {
      if(roomFilled.nextElementSibling !== null) {
        roomFilled.nextElementSibling.remove()
      }
      roomFilled.value = roomAvailability.value
    }, 1000)
  }
}

roomAvailability.addEventListener('keyup', e => {
  if(roomAvailability.value === '') {
    roomAvailability.value = 0
  } else {
    roomAvailability.value = parseInt(roomAvailability.value)
  }
  if(timeout1 !== null) {
    clearTimeout(timeout1)
  }
  timeout1 = setTimeout(checkRoomFilled, 1000)
})

roomAvailability.addEventListener('change', checkRoomFilled)

roomFilled.addEventListener('keyup', e => {
  if(roomFilled.value === '') {
    roomFilled.value = 0
  } else {
    roomFilled.value = parseInt(roomFilled.value)
  }
  if(timeout2 !== null) {
    clearTimeout(timeout2)
  }
  timeout2 = setTimeout(checkRoomAvailability, 1000)
})

roomFilled.addEventListener('change', checkRoomAvailability)
</script>