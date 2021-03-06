<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Home_model","home_m");
    // cek apakah telah login
    $isLogon = $this->session->logon;
    if ($isLogon == 0) {
      redirect("users/page_login/");
    }
  }

  public function index()
  {
    $this->homepage();
  }

  function Homepage()
  {
    $data['menu']      = "timeline";
    $get_post_lols     = $this->home_m->get_query_post();
    $data['lol_posts'] = $this->db->query($get_post_lols)->result_array();
    $this->load->view('homepage',$data);
  }

  public function my_post()
  {
    $data['menu']      = 'my_post';
    $queryMyPost       = $this->home_m->get_my_post_query();
    $data['lol_posts'] = $this->db->query($queryMyPost)->result_array();
    $this->load->view('homepage',$data);
  }

  public function get_content_load_more($my = '')
  {
    $my                = ($my == 'timeline') ? '' : $my;
    $offset            = $this->input->get('offset');
    $limit             = $this->input->get('limit');
    $queryLimitPost    = $this->home_m->get_limit_post($my,$offset, $limit);
    $data['lol_posts'] = $this->db->query($queryLimitPost)->result_array();
    $this->load->view('load_more', $data);
  }

}
