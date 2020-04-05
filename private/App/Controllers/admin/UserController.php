<?php

class UserController extends Controller
{

  public function __construct()
  {

    parent::__construct();

    $this->role(['admin']);

  }

  public function index()
  {

    $model = $this->model('User');

    $attr = [
      'username',
      'email',
      'name',
      'role'
    ];

    $where = [
      'order_by' => ['name', 'ASC']
    ];

    $data = $model->read($attr, $where);

    $this->title('Pengguna');
    $this->layout('dashboard');
    $this->view('admin.user.home', $data);

  }

}