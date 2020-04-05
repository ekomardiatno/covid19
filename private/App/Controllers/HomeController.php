<?php

class HomeController extends Controller
{

    public function index()
    {

        $_db = Database::getInstance();
        $sql_kasus_kecamatan = "SELECT kecamatan.nama_kecamatan, SUM(CASE WHEN kasus.status LIKE 'odp_proses' THEN 1 ELSE 0 END) odp_proses , SUM(CASE WHEN kasus.status LIKE 'odp_selesai' THEN 1 ELSE 0 END) odp_selesai, SUM(CASE WHEN kasus.status LIKE 'pdp_perawatan' THEN 1 ELSE 0 END) pdp_perawatan, SUM(CASE WHEN kasus.status LIKE 'pdp_sembuh' THEN 1 ELSE 0 END) pdp_sembuh, SUM(CASE WHEN kasus.status LIKE 'pdp_meninggal' THEN 1 ELSE 0 END) pdp_meninggal, SUM(CASE WHEN kasus.status LIKE 'positif_dirawat' THEN 1 ELSE 0 END) positif_dirawat, SUM(CASE WHEN kasus.status LIKE 'positif_meninggal' THEN 1 ELSE 0 END) positif_meninggal, SUM(CASE WHEN kasus.status LIKE 'positif_sembuh' THEN 1 ELSE 0 END) positif_sembuh from kasus RIGHT JOIN kecamatan on kasus.id_kecamatan = kecamatan.id_kecamatan group by kecamatan.nama_kecamatan";
        $kasus_kecamatan = $_db->query($sql_kasus_kecamatan);
        $rumah_sakit_m = $this->model('RumahSakit');
        $rumah_sakit = $rumah_sakit_m->read();
        $data = [
            'kasus_kecamatan' => $kasus_kecamatan,
            'total_kasus' => [
                'odp_proses' => array_reduce($kasus_kecamatan, function ($total, $d) {
                    return $total + $d['odp_proses'];
                }, 0),
                'odp_selesai' => array_reduce($kasus_kecamatan, function ($total, $d) {
                    return $total + $d['odp_selesai'];
                }, 0),
                'pdp_perawatan' => array_reduce($kasus_kecamatan, function ($total, $d) {
                    return $total + $d['pdp_perawatan'];
                }, 0),
                'pdp_sembuh' => array_reduce($kasus_kecamatan, function ($total, $d) {
                    return $total + $d['pdp_sembuh'];
                }, 0),
                'pdp_meninggal' => array_reduce($kasus_kecamatan, function ($total, $d) {
                    return $total + $d['pdp_meninggal'];
                }, 0),
                'positif_dirawat' => array_reduce($kasus_kecamatan, function ($total, $d) {
                    return $total + $d['positif_dirawat'];
                }, 0),
                'positif_sembuh' => array_reduce($kasus_kecamatan, function ($total, $d) {
                    return $total + $d['positif_sembuh'];
                }, 0),
                'positif_meninggal' => array_reduce($kasus_kecamatan, function ($total, $d) {
                    return $total + $d['positif_meninggal'];
                }, 0)
            ],
            'rumah_sakit' => $rumah_sakit
        ];
        $data['total_kasus']['total_odp'] = $data['total_kasus']['odp_proses'] + $data['total_kasus']['odp_selesai'];
        $data['total_kasus']['total_pdp'] = $data['total_kasus']['pdp_perawatan'] + $data['total_kasus']['pdp_sembuh'] + $data['total_kasus']['pdp_meninggal'];
        $data['total_kasus']['total_positif'] = $data['total_kasus']['positif_dirawat'] + $data['total_kasus']['positif_sembuh'] + $data['total_kasus']['positif_meninggal'];
        $this->view('home', $data);
    }
}
