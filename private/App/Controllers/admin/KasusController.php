<?php

class KasusController extends Controller
{
  private $_model;
  private $_kecamatan_model;
  public function __construct()
  {
    parent::__construct();
    $this->role(['admin']);
  }

  public function index()
  {

    $fields = [
      'kasus' => ['id_kasus', 'nik', 'nama', 'umur', 'tanggal', 'jenis_kelamin', 'hp', 'status'],
      'kecamatan' => ['nama_kecamatan']
    ];
    $index = [
      'kecamatan' => [
        'index_table' => 'kasus',
        'index_id' => 'id_kecamatan'
      ]
    ];
    $data = $this->model('Kasus')->join('LEFT JOIN', $fields, $index);

    $this->_web->title('Kasus COVID-19');
    $this->_web->breadcrumb(
      [
        ['admin.kasus', 'Kasus COVID-19']
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
        ['admin.kasus', 'Kasus COVID-19'],
        ['admin.kasus.tambah', 'Tambah Kasus']
      ]
    );
    $this->_web->layout('dashboard');
    $this->_web->view('admin.kasus.add', $data);
  }

  public function post()
  {
    $data = $this->request()->post;
    $data['tanggal'] = date('Y-m-d');
    $insert = $this->model('Kasus')->insert($data);

    if ($insert) {
      Flasher::setFlash('<b>Berhasil!</b> Kasus ditambahkan', 'success', 'ni ni-check-bold', 'top', 'center');
    } else {
      Flasher::setData($data);
      Flasher::setFlash('<b>Gagal!</b> Kemungkinan NIK/No. HP sudah terdaftar', 'danger', 'ni ni-fat-remove', 'top', 'center');
      return $this->redirect('admin.kasus.tambah');
    }

    $this->redirect('admin.kasus');
  }

  public function edit($id)
  {
    $kecamatan = $this->model('Kecamatan')->read();
    $where = [
      'params' => [
        [
          'column' => 'id_kasus',
          'value' => $id
        ]
      ]
    ];
    $kasus = $this->model('Kasus')->read(null, $where, 'ARRAY_ONE');
    $data = [
      'kecamatan' => $kecamatan,
      'kasus' => $kasus
    ];
    $this->_web->title('Ubah Indentitas');
    $this->_web->breadcrumb(
      [
        ['admin.kasus', 'Kasus COVID-19'],
        ['admin.kasus.edit.' . $id, 'Ubah Identitas']
      ]
    );
    $this->_web->layout('dashboard');
    $this->_web->view('admin.kasus.edit', $data);
  }
  public function update($id)
  {
    $data = $this->request()->post;
    $update = $this->model('Kasus')->update($data, ['data_id' => $id]);

    if ($update) {
      Flasher::setFlash('<b>Berhasil!</b> Kasus diperbarui', 'success', 'ni ni-check-bold', 'top', 'center');
    } else {
      Flasher::setFlash('<b>Gagal!</b> Tidak bisa mengubah data', 'danger', 'ni ni-fat-remove', 'top', 'center');
    }

    $this->redirect('admin.kasus.edit.' . $id);
  }

  public function delete()
  {
    $data = $this->request()->post;
    $id = $data['id_kasus'];
    $delete1 = $this->model('Kasus')->delete(['data_id' => $id]);
    $where = [
      'params' => [
        [
          'column' => 'id_kasus',
          'value' => $id
        ]
      ]
    ];
    $delete2 = $this->model('Pantauan')->delete($where);

    if ($delete1 && $delete2) {
      Flasher::setFlash('<b>Berhasil!</b> Data terhapus', 'success', 'ni ni-check-bold', 'top', 'center');
    } else {
      Flasher::setFlash('<b>Gagal!</b> Tidak bisa menhapus data', 'danger', 'ni ni-fat-remove', 'top', 'center');
    }

    $this->redirect('admin.kasus');
  }

  public function monitor($id)
  {
    $fields = [
      'kasus' => ['nik', 'nama', 'umur', 'hp', 'jenis_kelamin'],
      'kecamatan' => ['nama_kecamatan']
    ];
    $index = [
      'kecamatan' => ['index_table' => 'kasus', 'index_id' => 'id_kecamatan']
    ];
    $where = [
      'params' => [
        [
          'column' => 'kasus.id_kasus',
          'value' => $id
        ]
      ]
    ];
    $profile = $this->model('Kasus')->join('LEFT JOIN', $fields, $index, $where, 'ARRAY_ONE');
    $where = [
      'params' => [
        [
          'column' => 'id_kasus',
          'value' => $id
        ]
      ],
      'order_by' => ['tanggal', 'DESC']
    ];
    $data = $this->model('Pantauan')->read(null, $where);
    $this->_web->title('Monitor Kasus');
    $this->_web->breadcrumb([
      ['admin.kasus', 'Kasus COVID-19'],
      ['admin.kasus.monitor', 'Monitor Kasus']
    ]);
    $this->_web->layout('dashboard');
    $data = [
      'pantauan' => $data,
      'id_kasus' => $id,
      'profile' => $profile
    ];
    $this->_web->view('admin.kasus.monitor', $data);
  }

  public function status()
  {

    $data = $this->request()->post;
    $insert = $this->model('Pantauan')->insert($data);
    if ($insert) {
      $where = [
        'params' => [
          [
            'column' => 'id_kasus',
            'value' => $data['id_kasus']
          ]
        ]
      ];
      $this->model('Kasus')->update(['status' => $data['status'], 'tanggal' => $data['tanggal']], $where);
    } else {
      Flasher::setFlash('<b>Gagal!</b> Memperbarui status', 'danger', 'ni ni-fat-remove', 'top', 'center');
    }
    $this->redirect('admin.kasus.monitor.' . $data['id_kasus']);
  }
}
