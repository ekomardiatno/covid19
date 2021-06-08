<?php

class HomeController extends Controller
{
  public function __construct()
  {

    parent::__construct();

    $this->role(['admin']);
  }

  public function index()
  {
    $kecamatan = $this->model('Kecamatan')->read();
    $where = [
      'order_by' => ['tanggal', 'DESC'],
      'limit' => [0,2]
    ];
    $kasus = $this->model('Kasus')->read(null, $where);
    $data['total_odp'] = 0;
    $data['total_pdp'] = 0;
    $data['total_positif'] = 0;
    $data['total_odp_old'] = 0;
    $data['total_pdp_old'] = 0;
    $data['total_positif_old'] = 0;
    $data['total_kasus'] = 0;
    $data['total_kasus_old'] = 0;
    $data['persentase_odp'] = 0;
    $data['persentase_pdp'] = 0;
    $data['persentase_positif'] = 0;
    $data['persentase_kasus'] = 0;
    if(count($kasus) > 0) {
      $data['total_odp'] = $kasus[0]['odp_proses'] + $kasus[0]['odp_selesai'];
      $data['total_pdp'] = $kasus[0]['pdp_rumah'] + $kasus[0]['pdp_rawat'] + $kasus[0]['pdp_sehat'] + $kasus[0]['pdp_meninggal'];
      $data['total_positif'] = $kasus[0]['positif_rumah'] + $kasus[0]['positif_rawat'] + $kasus[0]['positif_sehat'] + $kasus[0]['positif_meninggal'];
      $data['total_kasus'] = $data['total_pdp'] + $data['total_positif'];
    }
    if(count($kasus) > 1) {
      $data['total_odp_old'] = $kasus[1]['odp_proses'] + $kasus[1]['odp_selesai'];
      $data['total_pdp_old'] = $kasus[1]['pdp_rumah'] + $kasus[1]['pdp_rawat'] + $kasus[1]['pdp_sehat'] + $kasus[1]['pdp_meninggal'];
      $data['total_positif_old'] = $kasus[1]['positif_rumah'] + $kasus[1]['positif_rawat'] + $kasus[1]['positif_sehat'] + $kasus[1]['positif_meninggal'];
      $data['total_kasus_old'] = $data['total_pdp_old'] + $data['total_positif_old'];
      $data['persentase_odp'] = ($data['total_odp'] - $data['total_odp_old']) / $data['total_odp_old'] * 100;
      $data['persentase_pdp'] = ($data['total_pdp'] - $data['total_pdp_old']) / $data['total_pdp_old'] * 100;
      $data['persentase_positif'] = ($data['total_positif'] - $data['total_positif_old']) / $data['total_positif_old'] * 100;
      $data['persentase_kasus'] = ($data['total_kasus'] - $data['total_kasus_old']) / $data['total_kasus_old'] * 100;
    }
    $data['tanggal'] = $kasus[0]['tanggal'] ?? '';
    $data['kecamatan'] = isset($kasus[0]['data_kecamatan']) ? unserialize($kasus[0]['data_kecamatan']) : $kecamatan;
    $this->_web->layout('dashboard');
    $this->_web->view('admin.home', $data);
  }
}
