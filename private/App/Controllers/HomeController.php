<?php

class HomeController extends Controller
{

    public function index()
    {

        $status_kasus = ['odp_proses', 'odp_selesai', 'pdp_perawatan', 'pdp_sembuh', 'pdp_meninggal', 'positif_dirawat', 'positif_sembuh', 'positif_meninggal'];
        $_db = Database::getInstance();
        $sql_kasus_kecamatan = "SELECT kecamatan.nama_kecamatan,";
        foreach ($status_kasus as $s) {
            $sql_kasus_kecamatan .= " SUM(CASE WHEN kasus.status LIKE '" . $s . "' THEN 1 ELSE 0 END) " . $s . ",";
        }
        $sql_kasus_kecamatan = substr($sql_kasus_kecamatan, 0, -1);
        $sql_kasus_kecamatan .= " FROM kasus RIGHT JOIN kecamatan on kasus.id_kecamatan = kecamatan.id_kecamatan group by kecamatan.nama_kecamatan";
        $kasus_kecamatan = $_db->query($sql_kasus_kecamatan);
        $total_kasus = [];
        foreach ($status_kasus as $s) {
            $total_kasus[$s] = array_reduce($kasus_kecamatan, function ($total, $d) use ($s) {
                return $total + $d[$s];
            }, 0);
        }
        $rumah_sakit_m = $this->model('RumahSakit');
        $rumah_sakit = $rumah_sakit_m->read();
        $data = [
            'kasus_kecamatan' => $kasus_kecamatan,
            'total_kasus' => $total_kasus,
            'rumah_sakit' => $rumah_sakit
        ];
        $data['total_kasus']['total_odp'] = $data['total_kasus']['odp_proses'] + $data['total_kasus']['odp_selesai'];
        $data['total_kasus']['total_pdp'] = $data['total_kasus']['pdp_perawatan'] + $data['total_kasus']['pdp_sembuh'] + $data['total_kasus']['pdp_meninggal'];
        $data['total_kasus']['total_positif'] = $data['total_kasus']['positif_dirawat'] + $data['total_kasus']['positif_sembuh'] + $data['total_kasus']['positif_meninggal'];
        $this->view('home', $data);
    }
}
