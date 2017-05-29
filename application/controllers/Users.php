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
    $email    = $this->input->post('email');
    $password = md5($this->input->post('password'));
    $cek      = $this->users_model->cek_login($email, $password);

    if ($cek) {
      $this->session->set_userdata($cek);

      $user['isActive'] = 1;
      $this->db->where('email', $email)
      ->update('lol_user',$user);

      $this->session->logon = 1;
      redirect('home');
    } else {
      $this->session->logon = 0;
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

    if ($emailAble['email'] == "") {
      $register_data = array(
        'username'  => $this->input->post('username'),
        'firstname' => $this->input->post('firstname'),
        'lastname'  => $this->input->post('lastname'),
        'email'     => $email,
        'password'  => $password,
        'gender'    => $this->input->post('gender'),
        'isActive'  => 0,
        'last_log'  => date("Y-m-d H:i:s")
      );
      // do insert account here
      $this->db->insert('lol_user', $register_data);
      redirect('users/page_login');
    }else {
      redirect('users/page_register');
    }
  }

  public function logout()
  {
    $user['isActive'] = 0;
    $user['last_log'] = date("Y-m-d H:i:s");

    $email = $this->session->userdata['user']['email'];

    $this->db->where('email', $email)
    ->update('lol_user',$user);

    $this->session->sess_destroy();
    redirect('home');
  }

  public function get_file_name()
  {
    $config['upload_path']          = 'assets/img/profile';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['encrypt_name']         = TRUE;
    $config['max_size']             = 100000;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;

    $this->load->library('upload', $config);
    $upload = $this->upload->do_upload('file_name');
    if ($upload != NULL) {
      if ( ! $upload)
      {
        $error = array('error' => $this->upload->display_errors());
        var_dump($error);
      }
      else
      {
        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
        $file_name   = $upload_data['file_name'];
        return $file_name;
      }
    }else {
      $file_name = $this->input->post('file_url');
      return $file_name;
    }
  }

  public function edit_photo_profile( $remove = FALSE )
  {
    $intIdUser = $this->session->userdata['user']['intIdUser'];
    $data['image_profile'] = (!$remove) ? $this->get_file_name() : NULL;

    $this->session->userdata['user']['image_profile'] = $data['image_profile'];
    $this->db->where('intIdUser', $intIdUser)
    ->update("lol_user", $data);
    redirect('profile');

  }

}
