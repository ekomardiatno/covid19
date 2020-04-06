<?php

class KasusController extends Controller
{
  private $_model;
  private $_kecamatan_model;
  public function __construct()
  {
    parent::__construct();
    $this->role(['admin']);
    $this->_model = $this->model('Kasus');
    $this->_kecamatan_model = $this->model('Kecamatan');
  }

  public function index()
  {

    $attr = [
      'kasus' => ['id_kasus', 'nama', 'umur', 'status', 'tanggal'],
      'kecamatan' => ['nama_kecamatan']
    ];
    $index = [
      'kecamatan' => [
        'index_table' => 'kasus',
        'index_id' => 'id_kecamatan'
      ]
    ];
    $data = $this->_model->join('LEFT JOIN', $attr, $index);

    // echo json_encode($data); die;

    $this->title('Kasus COVID-19');
    $this->breadcrumb(
      [
        ['admin.kasus', 'Kasus COVID-19']
      ]
    );
    $this->layout('dashboard');
    $this->view('admin.kasus.home', $data);
  }

  public function tambah()
  {
    $kecamatan = $this->_kecamatan_model->read();
    $data = [
      'kecamatan' => $kecamatan
    ];
    $this->title('Tambah Kasus');
    $this->breadcrumb(
      [
        ['admin.kasus', 'Kasus COVID-19'],
        ['admin.kasus.tambah', 'Tambah Kasus']
      ]
    );
    $this->layout('dashboard');
    $this->view('admin.kasus.add', $data);
  }

  public function post()
  {
    $insert = $this->_model->insert($_POST);

    if ($insert) {
      Flasher::setFlash('<b>Berhasil!</b> menambahkan kasus', 'success', 'ni ni-check-bold', 'top', 'center');
    } else {
      Flasher::setFlash('<b>Gagal!</b> ada kesalahan saat menyimpan data', 'danger', 'ni ni-fat-remove', 'top', 'center');
    }

    $this->redirect('admin.kasus');
  }

  public function edit($id)
  {
    $kecamatan = $this->_kecamatan_model->read();
    $where = [
      'params' => [
        [
          'column' => 'id_kasus',
          'value' => $id
        ]
      ]
    ];
    $kasus = $this->_model->read(null, $where, 'ARRAY_ONE');
    $data = [
      'kecamatan' => $kecamatan,
      'kasus' => $kasus
    ];
    $this->title('Edit Kasus');
    $this->breadcrumb(
      [
        ['admin.kasus', 'Kasus COVID-19'],
        ['admin.kasus.edit.' . $id, 'Edit Kasus']
      ]
    );
    $this->layout('dashboard');
    $this->view('admin.kasus.edit', $data);
  }
  public function update($id)
  {
    $update = $this->_model->update($_POST, ['data_id' => $id]);

    if ($update) {
      Flasher::setFlash('<b>Berhasil!</b> kasus diperbarui', 'success', 'ni ni-check-bold', 'top', 'center');
    } else {
      Flasher::setFlash('<b>Gagal!</b> tidak bisa mengubah data', 'danger', 'ni ni-fat-remove', 'top', 'center');
    }

    $this->redirect('admin.kasus.edit.' . $id);
  }

  public function delete()
  {
    $id = $_POST['id_kasus'];
    $delete = $this->_model->delete(['data_id' => $id]);

    if ($delete) {
      Flasher::setFlash('<b>Berhasil!</b> data terhapus', 'success', 'ni ni-check-bold', 'top', 'center');
    } else {
      Flasher::setFlash('<b>Gagal!</b> tidak bisa menhapus data', 'danger', 'ni ni-fat-remove', 'top', 'center');
    }

    $this->redirect('admin.kasus');
  }
}
