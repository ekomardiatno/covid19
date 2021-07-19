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
      <div class="title mb-3">
        <h2>Rumah Sakit</h2>
        <div class="sub-title">
          <p>Berikut rumah sakit yang bisa Anda jadikan rujukan untuk permasalahan Coronavirus/COVID-19</p>
        </div>
        <div class="line"></div>
      </div>
      <form class="mb-5" action="<?= Web::url('rumah-sakit.1') ?>" method="get">
        <input name="keyword" placeholder="Pencarian..." id="keyword" value="<?= $data['keyword'] ?>" class="form form-control form-search" />
      </form>
      <!-- Projects table -->
      <table class="table table-striped align-items-center table-flush datatables">
        <thead class="thead-light">
          <tr>
            <th class="text-center" scope="col">#</th>
            <th class="text-center" scope="col">Nama</th>
            <th class="text-center" scope="col">Telepon</th>
            <th class="text-center" width="40%" scope="col">Alamat</th>
            <th class="text-center" scope="col">Lokasi</th>
            <th class="text-center" scope="col"><i class="fas fa-external-link-alt"></i></th>
          </tr>
        </thead>
        <tbody>
          <?php if($data['rumah_sakit_total'] <= 0) : ?>
            <tr>
              <td colspan="5">Data tidak ditemukan</td>
            </tr>
          <?php endif; ?>
          <?php
          $no = ($data['page'] - 1) * $data['limit'] + 1;
          foreach ($data['rumah_sakit'] as $d) :
            $telepon_rumah_sakit = unserialize($d['telepon_rumah_sakit']);
            $telepon_rumah_sakit_str = '';
            foreach ($telepon_rumah_sakit as $t) {
              $telepon_rumah_sakit_str .= $t . ', ';
            }
            $telepon_rumah_sakit_str = substr($telepon_rumah_sakit_str, 0, -2);
          ?>
            <tr>
              <td><?= $no; ?></td>
              <td><?= $d['nama_rumah_sakit']; ?></td>
              <td><?= $telepon_rumah_sakit_str; ?></td>
              <td><?= $d['alamat_rumah_sakit']; ?></td>
              <td class="<?= $d['latitude'] . ',' . $d['longitude'] !== '0,0' ? '' : 'text-center' ?>">
                <?php if ($d['latitude'] . ',' . $d['longitude'] !== '0,0') : ?>
                  <a target="_blank" class="badge bg-primary" href="http://maps.google.com/?q=<?= $d['latitude'] . ',' . $d['longitude']; ?>"><i class="fas fa-location-arrow"></i> Lihat di Peta</a>
                <?php else : ?>
                  <span>-</span>
                <?php endif; ?>
              </td>
              <td><a class="badge bg-warning text-dark" href="<?= Web::url('tempat-tidur.' . md5($d['id_rumah_sakit'])) ?>"><i class="fas fa-procedures"></i> Tempat Tidur</a></td>
            </tr>
          <?php
            $no++;
          endforeach
          ?>
        </tbody>
      </table>
      <?php if ($data['rumah_sakit_total_page'] > 1) : ?>
        <nav aria-label="Page navigation example" class="d-flex flex-row justify-content-center">
          <ul class="pagination text-center">
            <li class="page-item<?= $data['page'] <= 1 ? ' disabled' : '' ?>">
              <?php if ($data['page'] <= 1) : ?>
                <span class="page-link"><i class="fa fa-chevron-left"></i></span>
              <?php else : ?>
                <a class="page-link" href="<?= Web::url('rumah-sakit.' . ($data['page'] - 1) . ($data['keyword'] !== '' ? '?keyword=' . str_replace(' ', '-', $data['keyword']) : '')) ?>"><i class="fas fa-chevron-left"></i></a>
              <?php endif; ?>
            </li>
            <?php for ($i = 1; $i < $data['rumah_sakit_total_page'] + 1; $i++) : ?>
              <li class="page-item<?= $i === $data['page'] ? ' active' : '' ?>">
                <?php if ($i === $data['page']) : ?>
                  <span class="page-link"><?= $i ?></span>
                <?php else : ?>
                  <a class="page-link" href="<?= Web::url('rumah-sakit.' . $i . ($data['keyword'] !== '' ? '?keyword=' . str_replace(' ', '-', $data['keyword']) : '')) ?>"><?= $i ?></a>
                <?php endif; ?>
              </li>
            <?php endfor; ?>
            <li class="page-item<?= $data['page'] >= $data['rumah_sakit_total_page'] ? ' disabled' : '' ?>">
              <?php if ($data['page'] >= $data['rumah_sakit_total_page']) : ?>
                <span class="page-link"><i class="fa fa-chevron-right"></i></span>
              <?php else : ?>
                <a class="page-link" href="<?= Web::url('rumah-sakit.' . ($data['page'] + 1) . ($data['keyword'] !== '' ? '?keyword=' . str_replace(' ', '-', $data['keyword']) : '')) ?>"><i class="fa fa-chevron-right"></i></a>
              <?php endif; ?>
            </li>
          </ul>
        </nav>
      <?php endif ?>
    </div>
  </div>
</div>