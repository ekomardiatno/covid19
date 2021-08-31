<?php

class CovidController extends ApiController
{
  public function lastest()
  {
    $data_m = $this->model('Kasus');
    $where = [
      'order_by' => ['tanggal', 'DESC'],
      'limit' => [0, 1]
    ];
    $data = $data_m->read(['tanggal', 'odp_proses as spesimen_negatif', 'odp_selesai as spesimen_positif', 'pdp_rawat as suspek_isolasi_rs', 'pdp_rumah as suspek_isoman', 'pdp_sehat as suspek_sembuh', 'pdp_meninggal as suspek_meninggal', 'positif_rawat as positif_isolasi_rs', 'positif_rumah as positif_isoman', 'positif_sehat as positif_sembuh', 'positif_meninggal'], $where, 'ARRAY_ONE');

    $this->response(
      [
        'status' => 200,
        'data' => $data
      ]
    );
  }
}
