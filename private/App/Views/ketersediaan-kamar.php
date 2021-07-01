<div class="banner">
  <div class="banner-bg">
    <div class="bg-img layer" data-depth="0.05"></div>
  </div>
  <div id="particles_js"></div>
  <div class="container">
    <div class="home-banner">
      <!-- <div class="logo-banner">
        <img src="<?= Web::assets('fight-corona.png', 'images') ?>">
      </div> -->
      <h1>Kuansing Tanggap Covid-19</h1>
      <h3 class="opening type-it">Layanan tanggap darurat COVID-19 kabupaten Kuantan Singingi</h3>
      <!-- <div class="mb-3 mt-4">
        <div class="d-flex flex-wrap justify-content-center mx--2 my--2">
          <a href="#" class="btn btn-banner mx-2 my-2">Hotline: 119</a>
          <a href="#" class="btn btn-banner mx-2 my-2">Hotline: 0852-6539-0530</a>
        </div>
        <p class="text-light mb-0 mt-3 font-italic font-weight-light letter-spacing small">*Jam layanan: 08:00 - 22:00 WIB</p>
      </div> -->
      <div class="line"></div>
      <div class="flex-panel mt-5">
        <div class="panel panel-default d-flex flex-column">
          <div class="panel-body">
            <h4 class="text-center font-weight-medium text-uppercase mb-4">SPESIMEN</h4>
            <h2 class="text-center font-weight-bold mb-4"><?= $data['total_odp'] ?></h2>
            <div class="detail-kasus">
              <div class="item-detail">
                <h4 class="text-center"><?= $data['odp_proses'] ?></h4>
                <p class="text-center text-muted">Hasil Negatif</p>
              </div>
              <div class="item-detail">
                <h4 class="text-center"><?= $data['odp_selesai'] ?>
                </h4>
                <p class="text-center text-muted">Hasil Positif</p>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default d-flex flex-column">
          <div class="panel-body">
            <h4 class="text-center font-weight-medium text-uppercase mb-4">SUSPEK</h4>
            <h2 class="text-center font-weight-bold mb-4"><?= $data['total_pdp'] ?></h2>
            <div class="detail-kasus">
              <div class="item-detail">
                <h4 class="text-center"><?= $data['pdp_rumah'] ?></h4>
                <p class="text-center text-muted">Isolasi Mandiri</p>
              </div>
              <div class="item-detail">
                <h4 class="text-center"><?= $data['pdp_rawat'] ?></h4>
                <p class="text-center text-muted">Isolasi di RS</p>
              </div>
              <div class="item-detail">
                <h4 class="text-center"><?= $data['pdp_sehat'] ?></h4>
                <p class="text-center text-muted">Selesai Isolasi</p>
              </div>
              <div class="item-detail">
                <h4 class="text-center"><?= $data['pdp_meninggal'] ?></h4>
                <p class="text-center text-muted">Meninggal</p>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default d-flex flex-column">
          <div class="panel-body">
            <h4 class="text-center font-weight-medium text-uppercase mb-4">TERKONFIRMASI</h4>
            <h2 class="text-center font-weight-bold mb-4"><?= $data['total_positif'] ?></h2>
            <div class="detail-kasus">
              <div class="item-detail">
                <h4 class="text-center"><?= $data['positif_rumah'] ?></h4>
                <p class="text-center text-muted">Isolasi Mandiri</p>
              </div>
              <div class="item-detail">
                <h4 class="text-center"><?= $data['positif_rawat'] ?></h4>
                <p class="text-center text-muted">Isolasi di RS</p>
              </div>
              <div class="item-detail">
                <h4 class="text-center"><?= $data['positif_sehat'] ?></h4>
                <p class="text-center text-muted">Selesai Isolasi</p>
              </div>
              <div class="item-detail">
                <h4 class="text-center"><?= $data['positif_meninggal'] ?></h4>
                <p class="text-center text-muted">Meninggal</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php if (isset($data['tanggal'])) : ?>
        <p class="mt-0 font-italic"><span>*</span> Terakhir diperbarui tanggal <?= Mod::dateID($data['tanggal']) ?></p>
      <?php endif; ?>
    </div>
  </div>
  <!--<div class="overlay-animated"></div>-->
  <a class="to-content" href="#content">
    <div class="mouse"><span></span></div>
  </a>
</div>
<div class="section-wrapper bg-virus" id="depan">
  <div class="section">
    <div class="container">
      <div class="title">
        <h2><?= $data['rumah_sakit']['nama_rumah_sakit'] ?></h2>
        <div class="sub-title">
          <p>Berikut ketersediaan kamar di <?= $data['rumah_sakit']['nama_rumah_sakit'] ?></p>
        </div>
        <div class="line"></div>
      </div>
      <!-- Projects table -->
      <table class="table table-striped align-items-center table-flush datatables">
        <thead class="thead-light">
          <tr>
            <th scope="col">Nama Kamar</th>
            <th scope="col">Terakhir diperbarui</th>
            <th class="text-right" scope="col">Total Kamar</th>
            <th class="text-right" scope="col">Terisi</th>
            <th class="text-right" scope="col">Kosong</th>
          </tr>
        </thead>
        <tbody>
          <?php if(count($data['kamar']) <= 0) : ?>
            <tr>
              <td colspan="5" class="text-center">Data tidak ditemukan</td>
            </tr>
          <?php endif; ?>
          <?php
          foreach ($data['kamar'] as $d) :
          ?>
            <tr>
              <td><?= $d['nama_kamar']; ?></td>
              <td class="font-italic"><?= Mod::dateTimeConvert($d['tanggal_diedit']); ?></td>
              <td class="text-right"><?= $d['ketersediaan_kamar']; ?></td>
              <td class="text-right"><?= $d['kamar_terisi']; ?></td>
              <td class="text-right font-weight-bold"><?= $d['ketersediaan_kamar'] - $d['kamar_terisi']; ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>