<?php

class KamarController extends Controller
{
  private $_model;
  public function __construct()
  {
    parent::__construct();
    $this->role(['admin']);
    $this->_model = $this->model('Kamar');
  }
  public function index()
  {
    $data = Database::getInstance()->query('SELECT kamar.id_kamar, rumah_sakit.nama_rumah_sakit, kamar.nama_kamar, kamar.ketersediaan_kamar, kamar.kamar_terisi, kamar.tanggal_dibuat, kamar.tanggal_diedit FROM kamar LEFT JOIN rumah_sakit ON kamar.id_rumah_sakit=rumah_sakit.id_rumah_sakit ORDER BY kamar.tanggal_diedit DESC');
    $this->_web->title('Ketersediaan Kamar');
    $this->_web->breadcrumb(
      [
        ['admin.kamar.tambah', 'Ketersediaan Kamar']
      ]
    );
    $this->_web->layout('dashboard');
    $this->_web->view('admin.kamar.home', $data);
  }
  public function tambah()
  {
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

  public function post()
  {
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

  public function edit($id)
  {
    $where = [
      'params' => [
        [
          'column' => 'md5(id_kamar)',
          'value' => $id
        ]
      ]
    ];
    $data = $this->_model->read(null, $where, 'ARRAY_ONE');
    if(!$data) {
      Flasher::setFlash('Alamat tidak sah', 'danger', 'ni ni-fat-remove', 'top', 'center');
      return $this->redirect('admin.kamar');
    }
    $data['rumah_sakit'] = $this->model('RumahSakit')->read(['id_rumah_sakit', 'nama_rumah_sakit']);
    $this->_web->title('Edit Kamar');
    $this->_web->breadcrumb(
      [
        ['admin.kamar', 'Ketersediaan Kamar'],
        ['admin.kamar.edit.' . $id, 'Edit Kamar']
      ]
    );
    $this->_web->layout('dashboard');
    $this->_web->view('admin.kamar.edit', $data);
  }

  public function update($id)
  {
    $data = $this->request()->post;
    $where = [
      'params' => [
        [
          'column' => 'md5(id_kamar)',
          'value' => $id
        ]
      ]
    ];
    $update = $this->_model->update($data, $where);

    if ($update) {
      Flasher::setFlash('<b>Berhasil!</b> Kamar diperbarui', 'success', 'ni ni-check-bold', 'top', 'center');
    } else {
      $data['rumah_sakit'] = $this->model('RumahSakit')->read(['id_rumah_sakit', 'nama_rumah_sakit']);
      Flasher::setData($data);
      Flasher::setFlash('<b>Gagal!</b> Mohon periksa isian formulir', 'danger', 'ni ni-fat-remove', 'top', 'center');
    }

    $this->redirect('admin.kamar.edit.' . $id);
  }

  public function delete()
  {
    $data = $this->request()->post;
    $id = $data['id_kamar'];
    $where = [
      'params' => [
        [
          'column' => 'md5(id_kamar)',
          'value' => $id
        ]
      ]
    ];
    $delete = $this->_model->delete($where);

    if ($delete) {
      Flasher::setFlash('<b>Berhasil!</b> Data terhapus', 'success', 'ni ni-check-bold', 'top', 'center');
    } else {
      Flasher::setFlash('<b>Gagal!</b> Tidak bisa menghapus data', 'danger', 'ni ni-fat-remove', 'top', 'center');
    }

    $this->redirect('admin.kamar');
  }
}
