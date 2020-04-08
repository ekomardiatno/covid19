<?php

class RegisterController extends Controller
{

  public function __construct()
  {

    parent::__construct();

    if(isset($_SESSION['auth'])) {

      if(!$_SESSION['auth']['hasLogin']) {

        $this->redirect('admin');

      }

    }

  }

  public function index()
  {

    $this->layout('login');
    $this->view('admin.register');

  }

  public function action()
  {

    $data = $this->data()->post;

    if( isset($data->username) ){

      $post = [
        'username' => $data->username,
        'name' => $data->name,
        'email' => $data->email,
        'password' => Mod::hash($data->password),
        'role' => $data->role
      ];

      $model = $this->model('User');

      if($model->insert($post)) {
        Flasher::setFlash('Akun telah dibuat.', 'success', 'ni ni-check-bold');
        $this->redirect('admin.register');
      } else {
        Flasher::setFlash('Ada kesalahan.', 'danger', 'ni ni-fat-remove');
        $this->redirect('admin.register');
      }

    } else {

      $this->view('error.404');

    }

  }

}