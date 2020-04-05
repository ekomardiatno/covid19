<?php

class HomeController extends Controller
{

  public function __construct()
  {

    parent::__construct();

    $this->role(['admin']);

  }

  public function index()
  {

    $this->layout('dashboard');
    $this->view('admin.home');

  }

}