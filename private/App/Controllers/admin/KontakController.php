<?php

class KontakController extends Controller
{
  private $_model;
  public function __construct()
  {
    parent::__construct();
    $this->role(['admin']);
    $this->_model = $this->model('Kontak');
  }

  public function index()
  {
    $data = $this->_model->read();
    $this->_web->title('Kontak');
    $this->_web->breadcrumb(
      [
        ['admin.kontak', 'Kontak']
      ]
    );
    $this->_web->layout('dashboard');
    $this->_web->view('admin.kontak.home', $data);
  }
  public function tambah()
  {
    $this->_web->title('Tambah Kontak');
    $this->_web->breadcrumb(
      [
        ['admin.kontak', 'Kontak'],
        ['admin.kontak.tambah', 'Tambah Kontak']
      ]
    );

    $this->_web->layout('dashboard');
    $this->_web->view('admin.kontak.add');
  }
  public function post()
  {
    $data = $this->request()->post;
    $insert = $this->_model->insert($data);

    if ($insert) {
      Flasher::setFlash('<b>Berhasil!</b> menambahkan kontak', 'success', 'ni ni-check-bold', 'top', 'center');
    } else {
      Flasher::setFlash('<b>Gagal!</b> ada kesalahan saat menyimpan data', 'danger', 'ni ni-fat-remove', 'top', 'center');
    }

    $this->redirect('admin.kontak');
  }

  public function edit($id)
  {
    $where = [
      'params' => [
        [
          'column' => 'md5(id_kontak)',
          'value' => $id
        ]
      ]
    ];
    $data = $this->_model->read(null, $where, 'ARRAY_ONE');
    if(!$data) {
      Flasher::setFlash('Alamat tidak sah', 'danger', 'ni ni-fat-remove', 'top', 'center');
      return $this->redirect('admin.kontak');
    }
    $this->_web->title('Edit Kontak');
    $this->_web->breadcrumb(
      [
        ['admin.kontak', 'Update Kontak'],
        ['admin.kontak.edit.' . $id, 'Edit Kontak']
      ]
    );
    $this->_web->layout('dashboard');
    $this->_web->view('admin.kontak.edit', $data);
  }
  public function update($id)
  {
    $data = $this->request()->post;
    $where = [
      'params' => [
        [
          'column' => 'md5(id_kontak)',
          'value' => $id
        ]
      ]
    ];
    $update = $this->_model->update($data, $where);

    if ($update) {
      Flasher::setFlash('<b>Berhasil!</b> Kontak diperbarui', 'success', 'ni ni-check-bold', 'top', 'center');
    } else {
      Flasher::setData($data);
      Flasher::setFlash('<b>Gagal!</b> Mohon periksa isian formulir', 'danger', 'ni ni-fat-remove', 'top', 'center');
    }

    $this->redirect('admin.kontak.edit.' . $id);
  }

  public function delete()
  {
    $data = $this->request()->post;
    $id = $data['id_kontak'];
    $where = [
      'params' => [
        [
          'column' => 'md5(id_kontak)',
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

    $this->redirect('admin.kontak');
  }
}