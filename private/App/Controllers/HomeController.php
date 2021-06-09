<?php

class HomeController extends Controller
{

    public function index()
    {
        $where = [
            'order_by' => ['tanggal', 'DESC'],
            'limit' => [0,1]
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
        $data['data_kecamatan'] = isset($data['data_kecamatan']) ? unserialize($data['data_kecamatan']) : null;
        $data['rumah_sakit'] = $this->model('RumahSakit')->read();
        $data['kontak'] = $this->model('Kontak')->read(null, ['order_by' => ['tanggal_dibuat', 'ASC']]);
        $this->_web->view('home', $data);
    }
}
