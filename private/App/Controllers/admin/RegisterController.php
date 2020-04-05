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

    if( isset($_POST['username']) ){

      $post = [
        'username' => $_POST['username'],
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => Mod::hash($_POST['password']),
        'role' => $_POST['role']
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