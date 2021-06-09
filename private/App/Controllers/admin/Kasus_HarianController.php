<?php

class Kasus_HarianController extends Controller
{
  private $_model;
  public function __construct()
  {
    parent::__construct();
    $this->role(['admin']);
    $this->_model = $this->model('KasusHarian');
  }

  public function index()
  {
    $data = $this->_model->read();
    $this->_web->title('Kasus Harian');
    $this->_web->breadcrumb(
      [
        ['admin.kasus-harian', 'Kasus Harian']
      ]
    );
    $this->_web->layout('dashboard');
    $this->_web->view('admin.kasus-harian.home', $data);
  }

  public function tambah()
  {
    $data['kecamatan'] = $this->model('Kecamatan')->read();
    $this->_web->title('Tambah Kasus Harian');
    $this->_web->breadcrumb(
      [
        ['admin.kasus-harian', 'Kasus Harian'],
        ['admin.kasus-harian.tambah', 'Tambah Kasus Harian']
      ]
    );

    $this->_web->layout('dashboard');
    $this->_web->view('admin.kasus-harian.add', $data);
  }

  public function post()
  {
    $data = $this->request()->post;
    $data['kasus_harian_data'] = serialize($data['kasus_harian_data']);
    $insert = $this->_model->insert($data);
    if ($insert) {
      Flasher::setFlash('<b>Berhasil!</b> Kasus harian ditambahkan', 'success', 'ni ni-check-bold', 'top', 'center');
    } else {
      $data['kasus_harian_data'] = unserialize($data['kasus_harian_data']);
      Flasher::setData($data);
      $where = [
        'params' => [
          [
            'column' => 'tanggal',
            'value' => $data['tanggal']
          ]
        ]
      ];
      $num_rows = $this->_model->read(null, $where, 'NUM_ROWS');
      if ($num_rows >= 1) {
        Flasher::setFlash('<b>Gagal!</b> Data pada tanggal ' . Mod::dateID($data['tanggal']) . ' sudah ada', 'danger', 'ni ni-fat-remove', 'top', 'center');
      } else {
        Flasher::setFlash('<b>Gagal!</b> Mohon periksa isian formulir', 'danger', 'ni ni-fat-remove', 'top', 'center');
      }
      return $this->redirect('admin.kasus-harian.tambah');
    }

    $this->redirect('admin.kasus-harian');
  }

  public function edit($id)
  {
    $where = [
      'params' => [
        [
          'column' => 'id_kasus_harian',
          'value' => $id
        ]
      ]
    ];
    $data = $this->_model->read(null, $where, 'ARRAY_ONE');
    $data['kasus_harian_data'] = unserialize($data['kasus_harian_data']);
    $this->_web->title('Edit Kasus Harian');
    $this->_web->breadcrumb(
      [
        ['admin.kasus-harian', 'Kasus Harian'],
        ['admin.kasus-harian.edit.' . $id, 'Edit Kasus Harian']
      ]
    );
    $this->_web->layout('dashboard');
    $this->_web->view('admin.kasus-harian.edit', $data);
  }

  public function update($id)
  {
    $data = $this->request()->post;
    $data['kasus_harian_data'] = serialize($data['kasus_harian_data']);
    $where = [
      'params' => [
        [
          'column' => 'id_kasus_harian',
          'value' => $id
        ]
      ]
    ];
    $update = $this->_model->update($data, $where);

    $old_data = $this->_model->read(null, $where, 'ARRAY_ONE');

    if ($update) {
      Flasher::setFlash('<b>Berhasil!</b> Kasus diperbarui', 'success', 'ni ni-check-bold', 'top', 'center');
    } else {
      $data['kasus_harian_data'] = unserialize($data['kasus_harian_data']);
      Flasher::setData($data);
      $where = [
        'params' => [
          [
            'column' => 'tanggal',
            'value' => $data['tanggal']
          ]
        ]
      ];
      $num_rows = $this->_model->read(null, $where, 'NUM_ROWS');
      if ($old_data['tanggal'] !== $data['tanggal'] && $num_rows >= 1) {
        Flasher::setFlash('<b>Gagal!</b> Data pada tanggal ' . Mod::dateID($data['tanggal']) . ' sudah ada', 'danger', 'ni ni-fat-remove', 'top', 'center');
      } else {
        Flasher::setFlash('<b>Gagal!</b> Mohon periksa isian formulir', 'danger', 'ni ni-fat-remove', 'top', 'center');
      }
    }

    $this->redirect('admin.kasus-harian.edit.' . $id);
  }

  public function delete()
  {
    $data = $this->request()->post;
    $id = $data['id_kasus_harian'];
    $where = [
      'params' => [
        [
          'column' => 'id_kasus_harian',
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

    $this->redirect('admin.kasus-harian');
  }
}
