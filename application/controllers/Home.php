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
    $data['menu']     = "timeline";
    $data['lol_posts'] = $this->db->join("lol_user","lol_user.intIdUser = lol_post.intIdUser")
    ->get('lol_post')
    ->result_array();
    $this->load->view('homepage',$data);
  }

  public function my_post()
  {

  }

}
