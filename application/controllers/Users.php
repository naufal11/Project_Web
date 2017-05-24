<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    // cek apakah telah login
    $isLogon = $this->check_login->isLogin();
    if ($isLogon) {
      redirect("home/homepage");
    }
  }

  function index()
  {
  }

  public function page_login()
  {
    $data['menu'] = "login";
    $this->load->view('login_page', $data);
  }

  public function do_login()
  {
    $email = $this->input->post('email');
    $password = md5($this->input->post('password'));
    echo "$email $password";
  }

  public function page_register()
  {
    $data['menu'] = "register";
    $this->load->view('register_page', $data);
  }

  public function do_register()
  {
    $register_data = array(
      'username' => $this->input->post('username'),
      'email' => $this->input->post('email'),
      'password' => $this->input->post('password'),
      'date_birth' => $this->input->post('date_birth'),
      'gender' => $this->input->post('gender'),
      'isActive' => 0,
      'last_log' => date("Y-m-d")
    );
    // do insert account here
    // $this->db->insert('user', $register_data);


  }

}
