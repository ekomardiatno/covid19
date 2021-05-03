<div class="banner" id="depan">
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
            <h4 class="text-center font-weight-medium text-uppercase mb-4">ODP (Orang dalam pemantauan)</h4>
            <h2 class="text-center font-weight-bold mb-4"><?= $data['total_odp'] ?></h2>
            <div class="detail-kasus">
              <div class="item-detail">
                <h4 class="text-center"><?= $data['odp_proses'] ?></h4>
                <p class="text-center text-muted">Proses pemantauan</p>
              </div>
              <div class="item-detail">
                <h4 class="text-center"><?= $data['odp_selesai'] ?>
                </h4>
                <p class="text-center text-muted">Selesai pemantauan</p>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default d-flex flex-column">
          <div class="panel-body">
            <h4 class="text-center font-weight-medium text-uppercase mb-4">PDP (Pasien dalam pengawasan)</h4>
            <h2 class="text-center font-weight-bold mb-4"><?= $data['total_pdp'] ?></h2>
            <div class="detail-kasus">
              <div class="item-detail">
                <h4 class="text-center"><?= $data['pdp_rawat'] ?></h4>
                <p class="text-center text-muted">Masih dirawat</p>
              </div>
              <div class="item-detail">
                <h4 class="text-center"><?= $data['pdp_sehat'] ?></h4>
                <p class="text-center text-muted">Pulang dan sehat</p>
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
            <h4 class="text-center font-weight-medium text-uppercase mb-4">Kasus Positif COVID-19/Corona</h4>
            <h2 class="text-center font-weight-bold mb-4"><?= $data['total_positif'] ?></h2>
            <div class="detail-kasus">
              <div class="item-detail">
                <h4 class="text-center"><?= $data['positif_rawat'] ?></h4>
                <p class="text-center text-muted">Masih Dirawat</p>
              </div>
              <div class="item-detail">
                <h4 class="text-center"><?= $data['positif_sehat'] ?></h4>
                <p class="text-center text-muted">Pulang dan sehat</p>
              </div>
              <div class="item-detail">
                <h4 class="text-center"><?= $data['positif_meninggal'] ?></h4>
                <p class="text-center text-muted">Meninggal</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <p class="mt-0 font-italic"><span>*</span> Terakhir diperbarui tanggal <?= Mod::dateID($data['tanggal']) ?></p>
    </div>
  </div>
  <!--<div class="overlay-animated"></div>-->
  <a class="to-content" href="#content">
    <div class="mouse"><span></span></div>
  </a>
</div>
<div class="section-wrapper bg-virus" id="content">
  <div class="section" id="tentang-covid19">
    <div class="container">
      <div class="title">
        <h2>Apa itu COVID-19?</h2>
        <div class="sub-title">
          <p>COVID-19 adalah penyakit yang disebabkan oleh Novel Coronavirus (2019-nCoV)</p>
        </div>
        <div class="line"></div>
      </div>
      <div class="d-md-flex mx--3">
        <div class="mx-3 mb-3 mb-md-0 text-center align-self-md-center">
          <img width="250px" src="<?= Web::assets('what-is-covid.png', 'images') ?>" alt="what is covid-19?">
        </div>
        <div class="mx-3 flex-md-fill">
          <p>Infeksi virus ini disebut COVID-19 dan pertama kali ditemukan di kota Wuhan, Cina, pada akhir Desember 2019.
            Virus ini menular dengan cepat dan telah menyebar ke wilayah lain di Cina dan ke beberapa negara, termasuk
            Indonesia.</p>
          <p>Coronavirus adalah kumpulan virus yang bisa menginfeksi sistem pernapasan. Pada banyak kasus, virus ini hanya
            menyebabkan infeksi pernapasan ringan, seperti flu. Namun, virus ini juga bisa menyebabkan infeksi pernapasan
            berat, seperti
            infeksi paru-paru (pneumonia), Middle-East Respiratory Syndrome (MERS), dan Severe Acute Respiratory Syndrome
            (SARS).</p>
          <h4>Apa gejala dari COVID-19?</h4>
          <p>Gejala awal infeksi virus Corona atau COVID-19 bisa berupa gejala flu, seperti demam, pilek, batuk kering,
            sakit tenggorokan, dan sakit kepala. Setelah itu, gejala bisa memberat. Pasien bisa mengalam demam tinggi,
            batuk berdahak bahkan
            berdarah, sesak napas, dan nyeri dada. Gejala-gejala tersebut muncul ketika tubuh bereaksi melawan virus
            Corona.</p>
          <p>Namun, secara umum ada 3 gejala umum yang bisa menandakan seseorang virus Corona, yaitu:</p>
          <ul>
            <li>Demam (suhu tubuh di atas 38 derajat Celsius)</li>
            <li>Batuk</li>
            <li>Sesak napas</li>
          </ul>
          <p>Menurut penelitian, gejala COVID-19 muncul dalam waktu 2 hari sampai 2 minggu setelah terpapar virus Corona.
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="section" id="data-kasus">
    <div class="container">
      <div class="title">
        <h2>Data Kasus Covid-19 Kuansing</h2>
        <div class="sub-title">
          <p>Kasus Covid-19 meliputi orang dalam pemantauan, pasien dalam pengawasan dan positif virus covid-19
          </p>
        </div>
        <div class="line"></div>
      </div>
      <div class="flex-panel">
        <div class="panel panel-default d-flex flex-column">
          <div class="panel-body">
            <h4 class="text-center font-weight-medium text-uppercase mb-4">ODP (Orang dalam pemantauan)</h4>
            <h2 class="text-center font-weight-bold mb-4"><?= $data['total_odp'] ?></h2>
            <div class="detail-kasus">
              <div class="item-detail">
                <h4 class="text-center"><?= $data['odp_proses'] ?></h4>
                <p class="text-center text-muted">Proses pemantauan</p>
              </div>
              <div class="item-detail">
                <h4 class="text-center"><?= $data['odp_selesai'] ?>
                </h4>
                <p class="text-center text-muted">Selesai pemantauan</p>
              </div>
            </div>
          </div>
        </div>
        <div class="panel panel-default d-flex flex-column">
          <div class="panel-body">
            <h4 class="text-center font-weight-medium text-uppercase mb-4">PDP (Pasien dalam pengawasan)</h4>
            <h2 class="text-center font-weight-bold mb-4"><?= $data['total_pdp'] ?></h2>
            <div class="detail-kasus">
              <div class="item-detail">
                <h4 class="text-center"><?= $data['pdp_rawat'] ?></h4>
                <p class="text-center text-muted">Masih dirawat</p>
              </div>
              <div class="item-detail">
                <h4 class="text-center"><?= $data['pdp_sehat'] ?></h4>
                <p class="text-center text-muted">Pulang dan sehat</p>
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
            <h4 class="text-center font-weight-medium text-uppercase mb-4">Kasus Positif COVID-19/Corona</h4>
            <h2 class="text-center font-weight-bold mb-4"><?= $data['total_positif'] ?></h2>
            <div class="detail-kasus">
              <div class="item-detail">
                <h4 class="text-center"><?= $data['positif_rawat'] ?></h4>
                <p class="text-center text-muted">Masih Dirawat</p>
              </div>
              <div class="item-detail">
                <h4 class="text-center"><?= $data['positif_sehat'] ?></h4>
                <p class="text-center text-muted">Pulang dan sehat</p>
              </div>
              <div class="item-detail">
                <h4 class="text-center"><?= $data['positif_meninggal'] ?></h4>
                <p class="text-center text-muted">Meninggal</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php if (isset($data['data_kecamatan'])) : ?>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th rowspan="2" class="text-center">#</th>
                <th rowspan="2" class="text-center">Kecamatan</th>
                <th colspan="2" class="text-center">ODP</th>
                <th colspan="3" class="text-center">PDP</th>
                <th colspan="3" class="text-center">Positif</th>
                <th rowspan="2" class="text-center">Total</th>
              </tr>
              <tr>
                <th class="text-center">Proses</th>
                <th class="text-center">Selesai</th>
                <th class="text-center">Dirawat</th>
                <th class="text-center">Sehat</th>
                <th class="text-center">Meninggal</th>
                <th class="text-center">Dirawat</th>
                <th class="text-center">Sembuh</th>
                <th class="text-center">Meninggal</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $n0 = 1;
              $total_end = 0;
              foreach ($data['data_kecamatan'] as $d) :
                $total = intval($d['odp_proses']) + intval($d['odp_selesai']) + intval($d['pdp_rawat']) + intval($d['pdp_sehat']) + intval($d['pdp_meninggal']) + intval($d['positif_rawat']) + intval($d['positif_sehat']) + intval($d['positif_meninggal']);
                $total_end += $total;
              ?>
                <tr>
                  <td class="text-center"><?= $n0 ?></td>
                  <td><?= $d['nama_kecamatan'] ?></td>
                  <td class="text-center"><?= $d['odp_proses'] !== '' ? $d['odp_proses'] : '-' ?></td>
                  <td class="text-center"><?= $d['odp_selesai'] !== '' ? $d['odp_selesai'] : '-' ?></td>
                  <td class="text-center"><?= $d['pdp_rawat'] !== '' ? $d['pdp_rawat'] : '-' ?></td>
                  <td class="text-center"><?= $d['pdp_sehat'] !== '' ? $d['pdp_sehat'] : '-' ?></td>
                  <td class="text-center"><?= $d['pdp_meninggal'] !== '' ? $d['pdp_meninggal'] : '-' ?></td>
                  <td class="text-center"><?= $d['positif_rawat'] !== '' ? $d['positif_rawat'] : '-' ?></td>
                  <td class="text-center"><?= $d['positif_sehat'] !== '' ? $d['positif_sehat'] : '-' ?></td>
                  <td class="text-center"><?= $d['positif_meninggal'] !== '' ? $d['positif_meninggal'] : '-' ?></td>
                  <td class="text-center font-weight-bold"><?= $total ?></td>
                </tr>
              <?php
                $n0++;
              endforeach
              ?>
            </tbody>
            <tfooter>
              <tr>
                <td colspan="10" class="text-right font-weight-bold">Total kasus</td>
                <td class="text-center font-weight-bold"><?= $total_end ?></td>
              </tr>
            </tfooter>
          </table>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="section" id="pencegahan">
    <div class="container">
      <div class="title">
        <h2>Cegah penyebaran COVID-19</h2>
        <div class="sub-title">
          <p>Beberapa hal yang dapat kita lakukan untuk mencegah dan membantu menghentikan penyebaran COVID-19</p>
        </div>
        <div class="line"></div>
      </div>
      <div class="d-flex flex-column flex-lg-row">
        <div class="flex-lg-col d-flex flex-lg-column mx--2 mx-lg-0 mb-2 mb-lg-0">
          <div class="text-center p-2 p-lg-3">
            <div class="icon-prevention icon-prevention-1"></div>
          </div>
          <div class="p-2 p-lg-3">
            <div class="text-lg-center">
              <h6 class="text-uppercase font-weight-bold">Cuci tangan</h6>
              <p class="text-muted small">Cuci tangan sampai ke sela-sela jari dengan sabun dan air yang mengalir minimal selama 20 detik</p>
            </div>
          </div>
        </div>
        <div class="flex-lg-col d-flex flex-lg-column mx--2 mx-lg-0 mb-2 mb-lg-0">
          <div class="text-center p-2 p-lg-3">
            <div class="icon-prevention icon-prevention-2"></div>
          </div>
          <div class="p-2 p-lg-3">
            <div class="text-lg-center">
              <h6 class="text-uppercase font-weight-bold">Jaga jarak</h6>
              <p class="text-muted small">Jaga jarak minimal 1 meter saat berbicara atau sedang berinteraki dengan orang lain</p>
            </div>
          </div>
        </div>
        <div class="flex-lg-col d-flex flex-lg-column mx--2 mx-lg-0 mb-2 mb-lg-0">
          <div class="text-center p-2 p-lg-3">
            <div class="icon-prevention icon-prevention-3"></div>
          </div>
          <div class="p-2 p-lg-3">
            <div class="text-lg-center">
              <h6 class="text-uppercase font-weight-bold">Bersihkan benda</h6>
              <p class="text-muted small">Bersihkan dan lakukan disinfeksi permukaan benda yang sering disentuh</p>
            </div>
          </div>
        </div>
        <div class="flex-lg-col d-flex flex-lg-column mx--2 mx-lg-0 mb-2 mb-lg-0">
          <div class="text-center p-2 p-lg-3">
            <div class="icon-prevention icon-prevention-4"></div>
          </div>
          <div class="p-2 p-lg-3">
            <div class="text-lg-center">
              <h6 class="text-uppercase font-weight-bold">Tutupi batuk dan bersin</h6>
              <p class="text-muted small">Tutupi mulut dan hidung anda saat batuk atau bersin</p>
            </div>
          </div>
        </div>
        <div class="flex-lg-col d-flex flex-lg-column mx--2 mx-lg-0 mb-0">
          <div class="text-center p-2 p-lg-3">
            <div class="icon-prevention icon-prevention-5"></div>
          </div>
          <div class="p-2 p-lg-3">
            <div class="text-lg-center">
              <h6 class="text-uppercase font-weight-bold">#dirumahaja</h6>
              <p class="text-muted small">Hindari berpergian ke luar rumah untuk urusan yang tidak terlalu penting</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section" id="rumah-sakit">
    <div class="container">
      <div class="title">
        <h2>Rumah Sakit</h2>
        <div class="sub-title">
          <p>Berikut rumah sakit yang bisa Anda jadikan rujukan untuk permasalahan Coronavirus/COVID-19</p>
        </div>
        <div class="line"></div>
      </div>
      <div class="mx-md-5">
        <?php
        if (count($data['rumah_sakit']) <= 0) {
        ?>
          <h6 class="text-md-center font-italic">Data belum tersedia</h6>
        <?php
        }
        foreach ($data['rumah_sakit'] as $i => $r) :
        ?>
          <div class="<?= count($data['rumah_sakit']) === $i + 1 ? 'mb-0' : 'mb-3' ?>">
            <div class="d-md-flex mx-md--3 <?= count($data['rumah_sakit']) === $i + 1 ? '' : 'border-bottom pb-3' ?>">
              <div class="flex-md-col mx-md-3 mb-3 mb-md-0 ml-md-0">
                <h3 class="font-weight-bold text-dark-blue"><?= $r['nama_rumah_sakit'] ?></h3>
              </div>
              <div class="flex-md-col mx-md-3 ml-3 mr-md-0">
                <div class="d-flex align-items-start mx--2 mb-2">
                  <span class="mx-2 icon-wrapper-sm text-warning"><i class="fas fa-map-marked-alt"></i></span>
                  <span class="mx-2 flex-col text-muted font-weight-medium"><?= $r['alamat_rumah_sakit'] ?></span>
                </div>
                <?php
                $telepon = unserialize($r['telepon_rumah_sakit']);
                foreach ($telepon as $i => $t) :
                ?>
                  <div class="d-flex align-items-start mx--2 <?= count($telepon) === $i + 1 ? '' : 'mb-2' ?>">
                    <span class="mx-2 icon-wrapper-sm text-success"><i class="fas fa-phone-alt"></i></span>
                    <span class="mx-2 flex-col text-muted font-weight-medium"><?= $t !== '' ? $t : '-' ?></span>
                  </div>
                <?php
                endforeach;
                ?>
              </div>
            </div>
          </div>
        <?php
        endforeach
        ?>
      </div>
    </div>
  </div>
</div>
<div class="py-5 bg-light">
  <div class="container">
    <div class="partner-logo">
      <div class="partner-item">
        <img class="img-responsive" src="<?= Web::assets('bnpb.png', 'images/brand') ?>" alt="">
      </div>
      <div class="partner-item">
        <img class="img-responsive" src="<?= Web::assets('dinas-kesehatan.png', 'images/brand') ?>" alt="">
      </div>
      <div class="partner-item">
        <img class="img-responsive" src="<?= Web::assets('diskominfo.png', 'images/brand') ?>" alt="">
      </div>
      <div class="partner-item">
        <img class="img-responsive" src="<?= Web::assets('tni.png', 'images/brand') ?>" alt="">
      </div>
      <div class="partner-item">
        <img class="img-responsive" src="<?= Web::assets('polri.png', 'images/brand') ?>" alt="">
      </div>
    </div>
  </div>
</div>