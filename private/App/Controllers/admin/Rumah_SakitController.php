<?php

class Rumah_SakitController extends Controller
{
  private $_model;
  public function __construct()
  {
    parent::__construct();
    $this->role(['admin']);
    $this->_model = $this->model('RumahSakit');
  }
  public function index()
  {
    $data = $this->_model->read();
    $this->_web->title('Rumah Sakit');
    $this->_web->breadcrumb(
      [
        ['admin.rumah-sakit', 'Rumah Sakit']
      ]
    );
    $this->_web->layout('dashboard');
    $this->_web->view('admin.rumah-sakit.home', $data);
  }

  public function tambah()
  {
    $this->_web->title('Tambah Rumah Sakit');
    $this->_web->breadcrumb(
      [
        ['admin.rumah-sakit', 'Rumah Sakit'],
        ['admin.rumah-sakit.tambah', 'Tambah Rumah Sakit']
      ]
    );
    $this->_web->layout('dashboard');
    $this->_web->view('admin.rumah-sakit.add');
  }

  public function post()
  {
    $data = $this->request()->post;
    $data['telepon_rumah_sakit'] = serialize($data['telepon_rumah_sakit']);
    $insert = $this->_model->insert($data);

    if ($insert) {
      Flasher::setFlash('<b>Berhasil!</b> menambahkan rumah sakit', 'success', 'ni ni-check-bold', 'top', 'center');
    } else {
      Flasher::setFlash('<b>Gagal!</b> ada kesalahan saat menyimpan data', 'danger', 'ni ni-fat-remove', 'top', 'center');
    }

    $this->redirect('admin.rumah-sakit');
  }

  public function edit($id)
  {
    $where = [
      'params' => [
        [
          'column' => 'md5(id_rumah_sakit)',
          'value' => $id
        ]
      ]
    ];
    $data = $this->_model->read(null, $where, 'ARRAY_ONE');
    if(!$data) {
      Flasher::setFlash('Alamat tidak sah', 'danger', 'ni ni-fat-remove', 'top', 'center');
      return $this->redirect('admin.rumah-sakit');
    }
    $data['telepon_rumah_sakit'] = unserialize($data['telepon_rumah_sakit']);
    $this->_web->title('Edit Rumah Sakit');
    $this->_web->breadcrumb(
      [
        ['admin.rumah-sakit', 'Rumah Sakit'],
        ['admin.rumah-sakit.edit.' . $id, 'Edit Rumah Sakit']
      ]
    );
    $this->_web->layout('dashboard');
    $this->_web->view('admin.rumah-sakit.edit', $data);
  }

  public function update($id)
  {
    $data = $this->request()->post;
    $data['telepon_rumah_sakit'] = serialize($data['telepon_rumah_sakit']);
    $where = [
      'params' => [
        [
          'column' => 'md5(id_rumah_sakit)',
          'value' => $id
        ]
      ]
    ];
    $update = $this->_model->update($data, $where);

    if ($update) {
      Flasher::setFlash('<b>Berhasil!</b> kasus diperbarui', 'success', 'ni ni-check-bold', 'top', 'center');
    } else {
      Flasher::setFlash('<b>Gagal!</b> tidak bisa mengubah data', 'danger', 'ni ni-fat-remove', 'top', 'center');
    }

    $this->redirect('admin.rumah-sakit.edit.' . $id);
  }

  public function delete()
  {
    $data = $this->request()->post;
    $id = $data['id_rumah_sakit'];
    $where = [
      'params' => [
        [
          'column' => 'md5(id_rumah_sakit)',
          'value' => $id
        ]
      ]
    ];
    $delete = $this->_model->delete($where);

    if ($delete) {
      Flasher::setFlash('<b>Berhasil!</b> data terhapus', 'success', 'ni ni-check-bold', 'top', 'center');
    } else {
      Flasher::setFlash('<b>Gagal!</b> tidak bisa menghapus data', 'danger', 'ni ni-fat-remove', 'top', 'center');
    }

    $this->redirect('admin.rumah-sakit');
  }
}
