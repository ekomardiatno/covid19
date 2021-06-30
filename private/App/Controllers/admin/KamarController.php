<?php

class KamarController extends Controller {
  private $_model;
  public function __construct()
  {
    parent::__construct();
    $this->role(['admin']);
    $this->_model = $this->model('Kamar');
  }
  public function index() {
    $data = Database::getInstance()->query('SELECT rumah_sakit.nama_rumah_sakit, kamar.nama_kamar, kamar.ketersediaan_kamar, kamar.kamar_tersedia, kamar.tanggal_dibuat, kamar.tanggal_diedit FROM kamar LEFT JOIN rumah_sakit ON kamar.id_rumah_sakit=rumah_sakit.id_rumah_sakit GROUP BY rumah_sakit.nama_rumah_sakit ORDER BY kamar.tanggal_diedit DESC');
    $this->_web->title('Ketersediaan Kamar');
    $this->_web->breadcrumb(
      [
        ['admin.kamar.tambah', 'Ketersediaan Kamar']
      ]
    );
    $this->_web->layout('dashboard');
    $this->_web->view('admin.kamar.home', $data);
  }
  public function tambah() {
    $data['rumah_sakit'] = $this->model('RumahSakit')->read(['id_rumah_sakit', 'nama_rumah_sakit']);
    $this->_web->title('Tambah Kamar');
    $this->_web->breadcrumb(
      [
        ['admin.kamar', 'Ketersediaan Kamar'],
        ['admin.kamar.tambah', 'Tambah Kamar']
      ]
    );
    $this->_web->layout('dashboard');
    $this->_web->view('admin.kamar.add', $data);
  }

  public function post() {
    $data = $this->request()->post;
    $insert = $this->_model->insert($data);
    if ($insert) {
      Flasher::setFlash('<b>Berhasil!</b> Kasus harian ditambahkan', 'success', 'ni ni-check-bold', 'top', 'center');
    } else {
      Flasher::setData($data);
      Flasher::setFlash('<b>Gagal!</b> Mohon periksa isian formulir', 'danger', 'ni ni-fat-remove', 'top', 'center');
      return $this->redirect('admin.kamar.tambah');
    }

    $this->redirect('admin.kamar');
  }
}