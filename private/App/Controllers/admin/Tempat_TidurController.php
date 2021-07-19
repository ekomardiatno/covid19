<?php

class Tempat_TidurController extends Controller
{
  private $_model;
  public function __construct()
  {
    parent::__construct();
    $this->role(['admin']);
    $this->_model = $this->model('TempatTidur');
  }
  public function index()
  {
    $data = Database::getInstance()->query('SELECT tempat_tidur.id_tempat_tidur, rumah_sakit.nama_rumah_sakit, tempat_tidur.nama_tempat_tidur, tempat_tidur.total_tempat_tidur, tempat_tidur.tempat_tidur_terisi, tempat_tidur.tanggal_dibuat, tempat_tidur.tanggal_diedit FROM tempat_tidur LEFT JOIN rumah_sakit ON tempat_tidur.id_rumah_sakit=rumah_sakit.id_rumah_sakit ORDER BY tempat_tidur.tanggal_diedit DESC');
    $this->_web->title('Ketersediaan Tempat Tidur');
    $this->_web->breadcrumb(
      [
        ['admin.tempat-tidur.tambah', 'Ketersediaan Tempat Tidur']
      ]
    );
    $this->_web->layout('dashboard');
    $this->_web->view('admin.tempat-tidur.home', $data);
  }
  public function tambah()
  {
    $data['rumah_sakit'] = $this->model('RumahSakit')->read(['id_rumah_sakit', 'nama_rumah_sakit']);
    $this->_web->title('Tambah Tempat Tidur');
    $this->_web->breadcrumb(
      [
        ['admin.tempat-tidur', 'Ketersediaan Tempat Tidur'],
        ['admin.tempat-tidur.tambah', 'Tambah Tempat Tidur']
      ]
    );
    $this->_web->layout('dashboard');
    $this->_web->view('admin.tempat-tidur.add', $data);
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
      return $this->redirect('admin.tempat-tidur.tambah');
    }

    $this->redirect('admin.tempat-tidur');
  }

  public function edit($id)
  {
    $where = [
      'params' => [
        [
          'column' => 'md5(id_tempat_tidur)',
          'value' => $id
        ]
      ]
    ];
    $data = $this->_model->read(null, $where, 'ARRAY_ONE');
    if(!$data) {
      Flasher::setFlash('Alamat tidak sah', 'danger', 'ni ni-fat-remove', 'top', 'center');
      return $this->redirect('admin.tempat-tidur');
    }
    $data['rumah_sakit'] = $this->model('RumahSakit')->read(['id_rumah_sakit', 'nama_rumah_sakit']);
    $this->_web->title('Edit Tempat Tidur');
    $this->_web->breadcrumb(
      [
        ['admin.tempat-tidur', 'Ketersediaan Tempat Tidur'],
        ['admin.tempat-tidur.edit.' . $id, 'Edit Tempat Tidur']
      ]
    );
    $this->_web->layout('dashboard');
    $this->_web->view('admin.tempat-tidur.edit', $data);
  }

  public function update($id)
  {
    $data = $this->request()->post;
    $where = [
      'params' => [
        [
          'column' => 'md5(id_tempat_tidur)',
          'value' => $id
        ]
      ]
    ];
    $update = $this->_model->update($data, $where);

    if ($update) {
      Flasher::setFlash('<b>Berhasil!</b> Tempat Tidur diperbarui', 'success', 'ni ni-check-bold', 'top', 'center');
    } else {
      $data['rumah_sakit'] = $this->model('RumahSakit')->read(['id_rumah_sakit', 'nama_rumah_sakit']);
      Flasher::setData($data);
      Flasher::setFlash('<b>Gagal!</b> Mohon periksa isian formulir', 'danger', 'ni ni-fat-remove', 'top', 'center');
    }

    $this->redirect('admin.tempat-tidur.edit.' . $id);
  }

  public function delete()
  {
    $data = $this->request()->post;
    $id = $data['id_tempat_tidur'];
    $where = [
      'params' => [
        [
          'column' => 'md5(id_tempat_tidur)',
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

    $this->redirect('admin.tempat-tidur');
  }
}
