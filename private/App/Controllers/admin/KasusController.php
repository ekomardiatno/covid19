<?php

class KasusController extends Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->role(['admin']);
  }

  public function index()
  {
    $where = [
      'order_by' => ['tanggal', 'DESC']
    ];
    $data = $this->model('Kasus')->read(null, $where);
    $this->_web->title('Update Kasus');
    $this->_web->breadcrumb(
      [
        ['admin.kasus', 'Update Kasus']
      ]
    );
    $this->_web->layout('dashboard');
    $this->_web->view('admin.kasus.home', $data);
  }

  public function tambah()
  {
    $kecamatan = $this->model('Kecamatan')->read();
    $data = [
      'kecamatan' => $kecamatan
    ];
    $this->_web->title('Tambah Kasus');
    $this->_web->breadcrumb(
      [
        ['admin.kasus', 'Update Kasus'],
        ['admin.kasus.tambah', 'Tambah Kasus']
      ]
    );

    $this->_web->layout('dashboard');
    $this->_web->view('admin.kasus.add', $data);
  }

  public function post()
  {
    $data = $this->request()->post;
    $data['data_kecamatan'] = serialize($data['data_kecamatan']);
    $insert = $this->model('Kasus')->insert($data);

    if ($insert) {
      Flasher::setFlash('<b>Berhasil!</b> Kasus ditambahkan', 'success', 'ni ni-check-bold', 'top', 'center');
    } else {
      $data['data_kecamatan'] = unserialize($data['data_kecamatan']);
      Flasher::setData($data);
      $where = [
        'params' => [
          [
            'column' => 'tanggal',
            'value' => $data['tanggal']
          ]
        ]
      ];
      $num_rows = $this->model('Kasus')->read(null, $where, 'NUM_ROWS');
      if($num_rows >= 1) {
        Flasher::setFlash('<b>Gagal!</b> Data pada tanggal ' . Mod::dateID($data['tanggal']) . ' sudah ada', 'danger', 'ni ni-fat-remove', 'top', 'center');
      } else {
        Flasher::setFlash('<b>Gagal!</b> Mohon periksa isian formulir', 'danger', 'ni ni-fat-remove', 'top', 'center');
      }
      return $this->redirect('admin.kasus.tambah');
    }

    $this->redirect('admin.kasus');
  }

  public function edit($id)
  {
    $where = [
      'params' => [
        [
          'column' => 'md5(id_kasus)',
          'value' => $id
        ]
      ]
    ];
    $data = $this->model('Kasus')->read(null, $where, 'ARRAY_ONE');
    if(!$data) {
      Flasher::setFlash('Alamat tidak sah', 'danger', 'ni ni-fat-remove', 'top', 'center');
      return $this->redirect('admin.kasus');
    }
    $data['kecamatan'] = unserialize($data['data_kecamatan']);
    $this->_web->title('Edit Kasus');
    $this->_web->breadcrumb(
      [
        ['admin.kasus', 'Update Kasus'],
        ['admin.kasus.edit.' . $id, 'Edit Kasus']
      ]
    );
    $this->_web->layout('dashboard');
    $this->_web->view('admin.kasus.edit', $data);
  }
  public function update($id)
  {
    $data = $this->request()->post;
    $data['data_kecamatan'] = serialize($data['data_kecamatan']);
    $where = [
      'params' => [
        [
          'column' => 'md5(id_kasus)',
          'value' => $id
        ]
      ]
    ];
    $update = $this->model('Kasus')->update($data, $where);

    $old_data = $this->model('Kasus')->read(null, $where, 'ARRAY_ONE');

    if ($update) {
      Flasher::setFlash('<b>Berhasil!</b> Kasus diperbarui', 'success', 'ni ni-check-bold', 'top', 'center');
    } else {
      $data['data_kecamatan'] = unserialize($data['data_kecamatan']);
      Flasher::setData($data);
      $where = [
        'params' => [
          [
            'column' => 'tanggal',
            'value' => $data['tanggal']
          ]
        ]
      ];
      $num_rows = $this->model('Kasus')->read(null, $where, 'NUM_ROWS');
      if($old_data['tanggal'] !== $data['tanggal'] && $num_rows >= 1) {
        Flasher::setFlash('<b>Gagal!</b> Data pada tanggal ' . Mod::dateID($data['tanggal']) . ' sudah ada', 'danger', 'ni ni-fat-remove', 'top', 'center');
      } else {
        Flasher::setFlash('<b>Gagal!</b> Mohon periksa isian formulir', 'danger', 'ni ni-fat-remove', 'top', 'center');
      }
    }

    $this->redirect('admin.kasus.edit.' . $id);
  }

  public function delete()
  {
    $data = $this->request()->post;
    $id = $data['id_kasus'];
    $where = [
      'params' => [
        [
          'column' => 'md5(id_kasus)',
          'value' => $id
        ]
      ]
    ];
    $delete = $this->model('Kasus')->delete($where);

    if ($delete) {
      Flasher::setFlash('<b>Berhasil!</b> Data terhapus', 'success', 'ni ni-check-bold', 'top', 'center');
    } else {
      Flasher::setFlash('<b>Gagal!</b> Tidak bisa menghapus data', 'danger', 'ni ni-fat-remove', 'top', 'center');
    }

    $this->redirect('admin.kasus');
  }

}
