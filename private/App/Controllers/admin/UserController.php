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

    $fields = [
      'username',
      'email',
      'name',
      'role'
    ];

    $where = [
      'order_by' => ['name', 'ASC']
    ];

    $data = $model->read($fields, $where);

    $this->_web->title('Pengguna');
    $this->_web->layout('dashboard');
    $this->_web->view('admin.user.home', $data);

  }

}