<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    // cek apakah telah login
    // $isLogon = $this->check_login->isLogin();
    // if ($isLogon) {
    //   redirect("home/homepage");
    // }
    $this->load->model('users_model');
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
    $cek = $this->users_model->cek_login($email, $password);
    if ($cek) {
        $this->session->set_userdata($cek);

        $user['isActive'] = 1;
        $this->db->where('email', $email)
        ->update('lol_user',$user);

        $this->session->logon = TRUE;
        redirect('home');
    } else {
      $this->session->logon = FALSE;
      redirect('users/page_login');
    }

    echo "$email $password";
  }

  public function page_register()
  {
    $data['menu'] = "register";
    $this->load->view('register_page', $data);
  }

  public function do_register()
  {
    $password = md5($this->input->post('password'));

    $email = $this->input->post('email');
    $emailAble = $this->db->get_where('lol_user', "email = '$email'")
    ->row_array();

    if ($emailAble) {
      $register_data = array(
        'username' => $this->input->post('username'),
        'firstname' => $this->input->post('firstname'),
        'lastname' => $this->input->post('lastname'),
        'email' => $email,
        'password' => $password,
        'gender' => $this->input->post('gender'),
        'bio' => $this->input->post('bio'),
        'isActive' => 0,
        'last_log' => date("Y-m-d")
      );
      // do insert account here
      $this->db->insert('lol_user', $register_data);
      redirect('users/page_login');
    }else {
      redirect('users/register_page');
    }
  }

  public function logout()
  {
    $user['isActive'] = 0;
    $user['last_log'] = date("Y-m-d H:i:s");
    $this->db->where('email', $email)
    ->update('lol_user',$user);
    $this->session->sess_destroy();
    redirect('home');
  }

}
