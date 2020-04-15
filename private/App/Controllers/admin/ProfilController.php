<?php

class ProfilController extends Controller
{
  private $_model;
  public function __construct()
  {
    parent::__construct();
    $this->role(['admin']);
    $this->_model = $this->model('User');
  }
  public function edit()
  {

    $username = Auth::user('username');
    $data = $this->_model->read(
      ['id_users', 'username', 'name', 'email'],
      [
        'cond' => [
          [
            'column' => 'username',
            'value' => $username
          ]
        ]
      ],
      'ARRAY_ONE'
    );

    $this->_web->title('Ubah Profil');
    $this->_web->breadcrumb([
      ['admin.profil.edit', 'Ubah profil']
    ]);
    $this->_web->layout('dashboard');
    $this->_web->view('admin.profil.edit', $data);
  }

  public function update($id)
  {
    $data = $this->request()->post;
    if ($data['attr']['password'] === '') {
      unset($data['attr']['password']);
    } else {
      $data['attr']['password'] = Mod::hash($data['attr']['password']);
    }
    extract($data);
    $user = $this->_model->read(
      ['password'],
      [
        'cond' => [
          [
            'column' => 'id_users',
            'value' => $id
          ]
        ]
      ],
      'ARRAY_ONE'
    );

    if (password_verify($password, $user['password'])) {
      $update = $this->_model->update($fields, ['data_id' => $id]);
      if ($update) {
        $_SESSION['auth']['username'] = $fields['username'];
        $_SESSION['auth']['name'] = $fields['name'];
        $_SESSION['auth']['email'] = $fields['email'];
        Flasher::setFlash('<b>Berhasil!</b> profil diperbarui', 'success', 'ni ni-check-bold', 'top', 'center');
      } else {
        Flasher::setFlash('<b>Gagal!</b> Ada kesalahan', 'danger', 'ni ni-fat-remove', 'top', 'center');
      }
    } else {
      Flasher::setFlash('<b>Gagal!</b> Ada kesalahan', 'danger', 'ni ni-fat-remove', 'top', 'center');
    }

    $this->redirect('admin.profil.edit');
  }
}
