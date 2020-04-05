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

    $status_kasus = ['odp_proses', 'odp_selesai', 'pdp_perawatan', 'pdp_sembuh', 'pdp_meninggal', 'positif_dirawat', 'positif_sembuh', 'positif_meninggal'];
    $_db = Database::getInstance();
    $dateNow = date('Y-m-d');
    $year = substr($dateNow, 0, 4);
    $month = intval(substr($dateNow, 5, 2)) - 1;
    $month = strlen($month) > 1 ? strval($month) : '0' . $month;
    $dateLastMonth = $year . '-' . $month . '-01';
    $dateLastMonth = date("Y-m-t", strtotime($dateLastMonth));
    $sqlLastMonth = "SELECT";
    foreach($status_kasus as $s) {
      $sqlLastMonth .= " SUM(CASE WHEN status LIKE '". $s ."' AND tanggal <= '" . $dateLastMonth . "' THEN 1 ELSE 0 END) " . $s . ",";
    }
    $sqlLastMonth = substr($sqlLastMonth, 0, -1);
    $sqlLastMonth .= " FROM kasus";
    $totalKasusLastMonth = $_db->query($sqlLastMonth);
    $total_kasus_bulan_lalu = [];
    foreach($status_kasus as $s){
      $total_kasus_bulan_lalu[$s] = array_reduce($totalKasusLastMonth, function ($total, $d) use ($s) {
        return $total + $d[$s];
      }, 0);
    }
    
    $sql_kasus_kecamatan = "SELECT kecamatan.nama_kecamatan,";
    foreach($status_kasus as $s) {
      $sql_kasus_kecamatan .= " SUM(CASE WHEN kasus.status LIKE '". $s ."' THEN 1 ELSE 0 END) " . $s . ",";
    }
    $sql_kasus_kecamatan = substr($sql_kasus_kecamatan, 0, -1);
    $sql_kasus_kecamatan .= " FROM kasus RIGHT JOIN kecamatan on kasus.id_kecamatan = kecamatan.id_kecamatan group by kecamatan.nama_kecamatan";
    $kasus_kecamatan = $_db->query($sql_kasus_kecamatan);
    $total_kasus_sekarang = [];
    foreach($status_kasus as $s){
      $total_kasus_sekarang[$s] = array_reduce($kasus_kecamatan, function ($total, $d) use ($s) {
        return $total + $d[$s];
      }, 0);
    }

    $data = [
      'kasus_kecamatan' => $kasus_kecamatan
    ];

    $data['total_status_kasus_bulan_lalu']['total_odp'] = $total_kasus_bulan_lalu['odp_proses'] + $total_kasus_bulan_lalu['odp_selesai'];
    $data['total_status_kasus_bulan_lalu']['total_pdp'] = $total_kasus_bulan_lalu['pdp_perawatan'] + $total_kasus_bulan_lalu['pdp_sembuh'] + $total_kasus_bulan_lalu['pdp_meninggal'];
    $data['total_status_kasus_bulan_lalu']['total_positif'] = $total_kasus_bulan_lalu['positif_dirawat'] + $total_kasus_bulan_lalu['positif_sembuh'] + $total_kasus_bulan_lalu['positif_meninggal'];

    $data['total_status_kasus_sekarang']['total_odp'] = $total_kasus_sekarang['odp_proses'] + $total_kasus_sekarang['odp_selesai'];
    $data['total_status_kasus_sekarang']['total_pdp'] = $total_kasus_sekarang['pdp_perawatan'] + $total_kasus_sekarang['pdp_sembuh'] + $total_kasus_sekarang['pdp_meninggal'];
    $data['total_status_kasus_sekarang']['total_positif'] = $total_kasus_sekarang['positif_dirawat'] + $total_kasus_sekarang['positif_sembuh'] + $total_kasus_sekarang['positif_meninggal'];

    $this->layout('dashboard');
    $this->view('admin.home', $data);
  }
}
