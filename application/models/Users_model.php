<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  public function cek_login($email, $password)
  {
    $getUser['user'] = $this->db->where('email', $email)
    ->where('password', $password)
    ->get("lol_user")->row_array();
    return $getUser;
  }

}
