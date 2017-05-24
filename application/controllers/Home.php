<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    // cek apakah telah login
    // $isLogon = $this->session->logon;
    // if ($isLogon) {
    //   redirect("home/");
    // }else {
    //   redirect('users/page_login');
    // }
  }

  public function index()
  {
    $this->homepage();
  }

  function Homepage()
  {
    $data['menu'] = "homepage";
    $this->load->view('homepage',$data);
  }

}
