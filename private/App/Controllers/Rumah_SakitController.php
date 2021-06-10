<?php

class Rumah_SakitController extends Controller
{
  public function index($page = 1)
  {
    $limit = 5;
    $where = [
      'order_by' => ['tanggal', 'DESC'],
      'limit' => [0, 2]
    ];
    $data = $this->model('Kasus')->read(null, $where, 'ARRAY_ONE');
    $data['odp_proses'] = $data['odp_proses'] ?? 0;
    $data['odp_selesai'] = $data['odp_selesai'] ?? 0;
    $data['pdp_rumah'] = $data['pdp_rumah'] ?? 0;
    $data['pdp_rawat'] = $data['pdp_rawat'] ?? 0;
    $data['pdp_sehat'] = $data['pdp_sehat'] ?? 0;
    $data['pdp_meninggal'] = $data['pdp_meninggal'] ?? 0;
    $data['positif_rumah'] = $data['positif_rumah'] ?? 0;
    $data['positif_rawat'] = $data['positif_rawat'] ?? 0;
    $data['positif_sehat'] = $data['positif_sehat'] ?? 0;
    $data['positif_meninggal'] = $data['positif_meninggal'] ?? 0;
    $data['total_odp'] = $data['odp_proses'] + $data['odp_selesai'];
    $data['total_pdp'] = $data['pdp_rumah'] + $data['pdp_rawat'] + $data['pdp_sehat'] + $data['pdp_meninggal'];
    $data['total_positif'] = $data['positif_rumah'] + $data['positif_rawat'] + $data['positif_sehat'] + $data['positif_meninggal'];
    $data['total_kasus'] = $data['total_pdp'] + $data['total_positif'];

    $data['limit'] = $limit;
    $data['page'] = intval($page);
    $data['keyword'] = $this->request()->get['keyword'] ?? '';

    $where = [
      'limit' => [($page - 1) * $limit, $limit],
      'params' => [
        [
          'column' => 'nama_rumah_sakit',
          'value' => $data['keyword'],
          'operator' => 'LIKE'
        ]
      ]
    ];
    $data['rumah_sakit'] = $this->model('RumahSakit')->read(null, $where);
    unset($where['limit']);
    $data['rumah_sakit_total'] = $this->model('RumahSakit')->read(null, $where, 'NUM_ROWS');
    $data['rumah_sakit_total_page'] = ceil($data['rumah_sakit_total'] / $limit);
    $this->_web->view('rumah-sakit', $data);
  }
}
