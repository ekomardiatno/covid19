<?php

class KontributorController extends Controller {
  private $_model;
  public function __construct()
  {
    parent::__construct();
    $this->role(['admin']);
    $this->_model = $this->model('Kontributor');
  }

  public function index() {
    $data = $this->_model->read();
    $this->_web->title('Kontributor');
    $this->_web->breadcrumb(
      [
        ['admin.kontributor', 'Kontributor']
      ]
    );
    $this->_web->layout('dashboard');
    $this->_web->view('admin.kontributor.home', $data);
  }
  public function tambah()
  {
    $this->_web->title('Tambah Kontributor');
    $this->_web->breadcrumb(
      [
        ['admin.kontributor', 'Kontributor'],
        ['admin.kontributor.tambah', 'Tambah Kontributor']
      ]
    );

    $this->_web->layout('dashboard');
    $this->_web->view('admin.kontributor.add');
  }
  public function post()
  {
    $post = $this->request()->post;
    $file = $this->request()->file;
    if($file['image_kontributor']['error']) {
      Flasher::setFlash('<b>Gagal!</b> memproses gambar', 'danger', 'ni ni-fat-remove', 'top', 'center');
      die;
    }
    $file['image_kontributor']['name'] = explode('.', $file['image_kontributor']['name']);
    $filename = md5(time()) . '.' . end($file['image_kontributor']['name']);
    $filesave = 'uploads/images/' . $filename;
    $fileuri = Web::url() . 'uploads/images/' . $filename;
    $post['image_kontributor'] = $fileuri;
    $insert = $this->_model->insert($post);

    if ($insert) {
      Flasher::setFlash('<b>Berhasil!</b> menambahkan kontributor', 'success', 'ni ni-check-bold', 'top', 'center');
      move_uploaded_file($file['image_kontributor']['tmp_name'], $filesave);
    } else {
      Flasher::setData($post);
      Flasher::setFlash('<b>Gagal!</b> ada kesalahan saat menyimpan data', 'danger', 'ni ni-fat-remove', 'top', 'center');
      $this->redirect('admin.kontributor.tambah');
    }

    $this->redirect('admin.kontributor');

  }
  public function edit($id)
  {
    $where = [
      'params' => [
        [
          'column' => 'id_kontributor',
          'value' => $id
        ]
      ]
    ];
    $data = $this->_model->read(null, $where, 'ARRAY_ONE');
    $this->_web->title('Edit Kontributor');
    $this->_web->breadcrumb(
      [
        ['admin.kontributor', 'Update Kontributor'],
        ['admin.kontributor.edit.' . $id, 'Edit Kontributor']
      ]
    );
    $this->_web->layout('dashboard');
    $this->_web->view('admin.kontributor.edit', $data);
  }

  public function update($id) {
    $post = $this->request()->post;
    $file = $this->request()->file;
    if($file['image_kontributor']['name'] !== '') {
      if($file['image_kontributor']['error']) {
        Flasher::setFlash('<b>Gagal!</b> memproses gambar', 'danger', 'ni ni-fat-remove', 'top', 'center');
        return $this->redirect('admin.kontributor.edit.' . $id);
      }
      $filesave_old = str_replace(Web::url(), '', $post['image_kontributor_old']);
      $file['image_kontributor']['name'] = explode('.', $file['image_kontributor']['name']);
      $filename = md5(time()) . '.' . end($file['image_kontributor']['name']);
      $filesave = 'uploads/images/' . $filename;
      $fileuri = Web::url() . 'uploads/images/' . $filename;
      $post['image_kontributor'] = $fileuri;
    }
    unset($post['image_kontributor_old']);
    $where = [
      'params' => [
        [
          'column' => 'id_kontributor',
          'value' => $id
        ]
      ]
    ];
    $update = $this->_model->update($post, $where);
    if ($update) {
      Flasher::setFlash('<b>Berhasil!</b> Kontributor diperbarui', 'success', 'ni ni-check-bold', 'top', 'center');
      move_uploaded_file($file['image_kontributor']['tmp_name'], $filesave);
      unlink($filesave_old);
    } else {
      Flasher::setData($post);
      Flasher::setFlash('<b>Gagal!</b> Mohon periksa isian formulir', 'danger', 'ni ni-fat-remove', 'top', 'center');
    }

    $this->redirect('admin.kontributor.edit.' . $id);
  }

  public function delete()
  {
    $data = $this->request()->post;
    $id = $data['id_kontributor'];
    $where = [
      'params' => [
        [
          'column' => 'id_kontributor',
          'value' => $id
        ]
      ]
    ];
    $data = $this->_model->read(['image_kontributor'], $where, 'ARRAY_ONE');
    $filedelete = str_replace(Web::url(), '', $data['image_kontributor']);
    $delete = $this->_model->delete($where);

    if ($delete) {
      unlink($filedelete);
      Flasher::setFlash('<b>Berhasil!</b> Data terhapus', 'success', 'ni ni-check-bold', 'top', 'center');
    } else {
      Flasher::setFlash('<b>Gagal!</b> Tidak bisa menghapus data', 'danger', 'ni ni-fat-remove', 'top', 'center');
    }

    $this->redirect('admin.kontributor');
  }
}