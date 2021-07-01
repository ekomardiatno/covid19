<?php

class Ketersediaan_KamarController extends Controller
{
  public function index($id)
  {
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

    $where = [
      'params' => [
        [
          'column' => 'md5(id_rumah_sakit)',
          'value' => $id,
        ]
      ]
    ];
    $data['rumah_sakit'] = $this->model('RumahSakit')->read(['nama_rumah_sakit'], $where, 'ARRAY_ONE');
    $data['kamar'] = $this->model('Kamar')->read(['nama_kamar', 'ketersediaan_kamar', 'kamar_terisi', 'tanggal_diedit'], $where);
    $this->_web->view('ketersediaan-kamar', $data);
  }
}
