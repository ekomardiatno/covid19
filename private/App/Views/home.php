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
      <?php if (count($data['kasus_harian']) > 0) : ?>
        <h3 class="text-center mb-3">Laporan Harian Kasus Konfirmasi Covid-19 Kabupaten Kuantan Singingi</h3>
        <div class="table-responsive">
          <table class="table table-striped mb-0">
            <thead>
              <tr>
                <th class="text-center" rowspan="2">#</th>
                <th class="text-center" rowspan="2">Kecamatan</th>
                <th class="text-center" <?= count($data['kasus_harian']) >= 2 ? 'colspan="3"' : 'colspan="2"' ?>>Jumlah Kasus</th>
                <th class="text-center" <?= count($data['kasus_harian']) >= 2 ? 'colspan="3"' : 'colspan="2"' ?>>Jumlah Kasus Sembuh</th>
                <th class="text-center" <?= count($data['kasus_harian']) >= 2 ? 'colspan="3"' : 'colspan="2"' ?>>Jumlah Kasus Meninggal</th>
              </tr>
              <tr>
                <?php for ($i = 0; $i < 3; $i++) : ?>
                  <?php for ($j = 0; $j < count($data['kasus_harian']); $j++) : ?>
                    <th><?= Mod::dateID($data['kasus_harian'][$j]['tanggal']) ?></th>
                  <?php endfor; ?>
                  <th class="text-dark">Kumulatif</th>
                <?php endfor; ?>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $keys = ['kasus', 'sehat', 'meninggal'];
              $totals = [];
              ?>
              <?php foreach ($data['kasus_harian'][0]['kasus_harian_data'] as $i => $d) : ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= $d['nama_kecamatan']; ?></td>
                  <?php foreach ($keys as $k) : ?>
                    <?php $kumulatif = 0; ?>
                    <?php for ($j = 0; $j < count($data['kasus_harian']); $j++) : ?>
                      <td class="text-right"><?= intval($data['kasus_harian'][$j]['kasus_harian_data'][$i][$k]); ?></td>
                      <?php $totals[$k][$data['kasus_harian'][$j]['tanggal']][] = intval($data['kasus_harian'][$j]['kasus_harian_data'][$i][$k]) ?>
                      <?php $kumulatif += intval($data['kasus_harian'][$j]['kasus_harian_data'][$i][$k]); ?>
                    <?php endfor; ?>
                    <?php $totals[$k]['kumulatif'][] = $kumulatif ?>
                    <td class="text-right font-weight-bold bg-light text-dark"><?= $kumulatif; ?></td>
                  <?php endforeach; ?>
                </tr>
                <?php $no++; ?>
              <?php endforeach; ?>
            </tbody>
            <tfoot class="bg-light">
              <tr>
                <td colspan="2" class="text-right font-weight-bold">Total</td>
                <?php foreach ($keys as $k) : ?>
                  <?php for ($j = 0; $j < count($data['kasus_harian']); $j++) : ?>
                    <td class="text-right"><?= array_sum($totals[$k][$data['kasus_harian'][$j]['tanggal']]); ?></td>
                  <?php endfor; ?>
                  <td class="text-right font-weight-bold"><?= array_sum($totals[$k]['kumulatif']); ?></td>
                <?php endforeach; ?>
              </tr>
            </tfoot>
          </table>
        </div>
      <?php endif; ?>
      <?php if (isset($data['data_kecamatan'])) : ?>
        <h3 class="text-center mt-5">Data Pantauan Covid-19 Kabupaten Kuantan Singingi</h3>
        <h4 class="text-center mb-3 text-muted">Tanggal update <?= Mod::dateID($data['tanggal']) ?></h4>
        <div class="table-responsive">
          <table class="table table-striped mb-0">
            <thead>
              <tr>
                <th rowspan="2" class="text-center">#</th>
                <th rowspan="2" class="text-center">Kecamatan</th>
                <th colspan="2" class="text-center">Spesimen</th>
                <th colspan="4" class="text-center">Suspek</th>
                <th colspan="4" class="text-center">Terkonfirmasi</th>
              </tr>
              <tr>
                <th class="text-center">Hasil Negatif</th>
                <th class="text-center">Hasil Positif</th>
                <th class="text-center">Isolasi Mandiri</th>
                <th class="text-center">Isolasi di RS</th>
                <th class="text-center">Selesai Isolasi</th>
                <th class="text-center">Meninggal</th>
                <th class="text-center">Isolasi Mandiri</th>
                <th class="text-center">Isolasi di RS</th>
                <th class="text-center">Selesai Isolasi</th>
                <th class="text-center">Meninggal</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $n0 = 1;
              $total_odp_proses = 0;
              $total_odp_selesai = 0;
              $total_pdp_rumah = 0;
              $total_pdp_rawat = 0;
              $total_pdp_sehat = 0;
              $total_pdp_meninggal = 0;
              $total_positif_rumah = 0;
              $total_positif_rawat = 0;
              $total_positif_sehat = 0;
              $total_positif_meninggal = 0;
              foreach ($data['data_kecamatan'] as $d) :
                $total_odp_proses += intval($d['odp_proses']);
                $total_odp_selesai += intval($d['odp_selesai']);
                $total_pdp_rumah += intval($d['pdp_rumah']);
                $total_pdp_rawat += intval($d['pdp_rawat']);
                $total_pdp_sehat += intval($d['pdp_sehat']);
                $total_pdp_meninggal += intval($d['pdp_meninggal']);
                $total_positif_rumah += intval($d['positif_rumah']);
                $total_positif_rawat += intval($d['positif_rawat']);
                $total_positif_sehat += intval($d['positif_sehat']);
                $total_positif_meninggal += intval($d['positif_meninggal']);
              ?>
                <tr>
                  <td class="text-center"><?= $n0 ?></td>
                  <td><?= $d['nama_kecamatan'] ?></td>
                  <td class="text-center"><?= $d['odp_proses'] !== '' ? $d['odp_proses'] : '-' ?></td>
                  <td class="text-center"><?= $d['odp_selesai'] !== '' ? $d['odp_selesai'] : '-' ?></td>
                  <td class="text-center"><?= $d['pdp_rumah'] !== '' ? $d['pdp_rumah'] : '-' ?></td>
                  <td class="text-center"><?= $d['pdp_rawat'] !== '' ? $d['pdp_rawat'] : '-' ?></td>
                  <td class="text-center"><?= $d['pdp_sehat'] !== '' ? $d['pdp_sehat'] : '-' ?></td>
                  <td class="text-center"><?= $d['pdp_meninggal'] !== '' ? $d['pdp_meninggal'] : '-' ?></td>
                  <td class="text-center"><?= $d['positif_rumah'] !== '' ? $d['positif_rumah'] : '-' ?></td>
                  <td class="text-center"><?= $d['positif_rawat'] !== '' ? $d['positif_rawat'] : '-' ?></td>
                  <td class="text-center"><?= $d['positif_sehat'] !== '' ? $d['positif_sehat'] : '-' ?></td>
                  <td class="text-center"><?= $d['positif_meninggal'] !== '' ? $d['positif_meninggal'] : '-' ?></td>
                </tr>
              <?php
                $n0++;
              endforeach
              ?>
            </tbody>
            <tfooter>
              <tr>
                <td colspan="2" class="text-right font-weight-bold">Total</td>
                <td class="text-center font-weight-bold"><?= $total_odp_proses ?></td>
                <td class="text-center font-weight-bold"><?= $total_odp_selesai ?></td>
                <td class="text-center font-weight-bold"><?= $total_pdp_rumah ?></td>
                <td class="text-center font-weight-bold"><?= $total_pdp_rawat ?></td>
                <td class="text-center font-weight-bold"><?= $total_pdp_sehat ?></td>
                <td class="text-center font-weight-bold"><?= $total_pdp_meninggal ?></td>
                <td class="text-center font-weight-bold"><?= $total_positif_rumah ?></td>
                <td class="text-center font-weight-bold"><?= $total_positif_rawat ?></td>
                <td class="text-center font-weight-bold"><?= $total_positif_sehat ?></td>
                <td class="text-center font-weight-bold"><?= $total_positif_meninggal ?></td>
              </tr>
            </tfooter>
          </table>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <div class="section" id="kontak">
    <div class="container">
      <div class="title">
        <h2>Kontak</h2>
        <div class="line"></div>
      </div>
      <div class="row justify-content-center my--3">
        <?php foreach ($data['kontak'] as $d) : ?>
          <?php
          $icons = ['fa-phone-square', 'fa-user-md'];
          $bgs = ['bg-gradient-red', 'bg-gradient-green']
          ?>
          <div class="col-md-4 my-3">
            <a href="tel:<?= $d['no_hp'] ?>">
              <div class="panel mb-0 mx-0">
                <div class="panel-body d-flex flex-row p-3 mx--2">
                  <div class="icon icon-shape <?= intval($d['tipe_kontak']) <= count($bgs) - 1 ? $bgs[intval($d['tipe_kontak'])] : $bgs[0] ?> text-white rounded-circle shadow mx-2">
                    <i class="fas <?= intval($d['tipe_kontak']) <= count($icons) - 1 ? $icons[intval($d['tipe_kontak'])] : $icons[0] ?>"></i>
                  </div>
                  <div class="mx-2">
                    <h4 class="font-weight-bold text-dark-blue"><?= preg_replace(substr($d['no_hp'], 0, 1) === '+' ? '~^.{3}|.{4}(?!$)~' : '~^.{4}|.{4}(?!$)~', '$0 ', $d['no_hp']) ?></h4>
                    <h5 class="text-dark-blue"><?= $d['nama_kontak'] ?></h5>
                    <p class="text-muted mb-0"><?= $d['keterangan'] !== '' ? $d['keterangan'] : '-' ?></p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
      </div>
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
          <div class="<?= count($data['rumah_sakit']) === $i + 1 ? 'mb-0' : 'mb-5' ?>">
            <div class="d-md-flex mx-md--3 <?= count($data['rumah_sakit']) === $i + 1 ? '' : 'border-bottom pb-5' ?>">
              <div class="flex-md-col mx-md-3 mb-3 mb-md-0 ml-md-0">
                <h3 class="font-weight-bold text-dark-blue"><?= $r['nama_rumah_sakit'] ?></h3>
                <?php if ($r['latitude'] . ',' . $r['longitude'] !== '0,0') : ?>
                  <a class="text-primary" target="_blank" href="http://maps.google.com/?q=<?= $r['latitude'] . ',' . $r['longitude']; ?>"><i class="fas fa-location-arrow"></i> Lihat di Peta</a>
                <?php endif; ?>
              </div>
              <div class="flex-md-col mx-md-3 ml-3 mr-md-0">
                <div class="d-flex align-items-start mx--2 mb-3">
                  <span class="mx-2 icon-wrapper-sm text-warning"><i class="fas fa-map-marker-alt"></i></span>
                  <span class="mx-2 flex-col text-muted font-weight-medium"><?= $r['alamat_rumah_sakit'] ?></span>
                </div>
                <?php
                $telepon = unserialize($r['telepon_rumah_sakit']);
                foreach ($telepon as $i => $t) :
                ?>
                  <div class="d-flex align-items-start mx--2 <?= count($telepon) === $i + 1 ? '' : 'mb-3' ?>">
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
      <?php if ($data['rumah_sakit_total'] > 5) : ?>
        <div class="text-center mt-5">
          <a class="btn btn-success border-0" href="<?= Web::url('rumah-sakit') ?>">Lihat semua <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php if ($data['kontributor']) : ?>
  <div class="py-4 bg-light">
    <div class="container">
      <div class="owl-carousel owl-theme">
        <?php foreach ($data['kontributor'] as $d) : ?>
          <div class="item">
            <div class="partner-item">
              <a href="<?= filter_var($d['url_kontributor'], FILTER_VALIDATE_URL) ? $d['url_kontributor'] : '#' ?>" title="<?= $d['nama_kontributor'] ?>">
                <img class="img-responsive" src="<?= $d['image_kontributor'] ?>" title="<?= $d['nama_kontributor'] ?>" alt="<?= $d['nama_kontributor'] ?>">
                <p><?= $d['nama_kontributor'] ?></p>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
<?php endif; ?>