<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {

  }

  public function post_do()
  {
    $config['upload_path']          = 'assets/upload/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 100000;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('userfile'))
    {
			$error = array('error' => $this->upload->display_errors());
      var_dump($error);
    }
    else
    {
      $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
      $file_name = $upload_data['file_name'];

      $data_post = array(
        'intIdUser' => $this->session->userdata['user']['intIdUser'],
        'title'     => $this->input->post('title'),
        'caption'   => $this->input->post('caption'),
        'file'      => $file_name,
        'dtmDate'      => date("Y-m-d H:i:s")
      );
      $this->db->insert('lol_post', $data_post);
      redirect("home/");
    }
  }

}
