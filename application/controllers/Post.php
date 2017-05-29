<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("Home_model","home_m");
    //Codeigniter : Write Less Do More
  }

  function index()
  {

  }

  public function post_do()
  {
    $file_name = $this->get_file_name();

    $data_post = array(
      'intIdUser' => $this->session->userdata['user']['intIdUser'],
      'title'     => $this->input->post('title'),
      'caption'   => $this->input->post('caption'),
      'heading'   => $this->input->post('heading'),
      'mark'      => $this->input->post('mark'),
      'file'      => $file_name,
      'dtmDate'   => date("Y-m-d H:i:s")
    );
    $this->db->insert('lol_post', $data_post);
    redirect("home/");
  }

  public function get_file_name()
  {
    $config['upload_path']          = 'assets/upload/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 100000;
    $config['encrypt_name']         = TRUE;
    $config['max_width']            = 1024;
    $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('userfile') != NULL) {
      if ( ! $this->upload->do_upload('userfile'))
      {
        $error = array('error' => $this->upload->display_errors());
        var_dump($error);
      }
      else
      {
        $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
        $file_name = $upload_data['file_name'];
        return $file_name;
      }
    }else {
      $file_name = $this->input->post('name_url');
      return $file_name;
    }
  }

  public function response()
  {
    $intIdPost = $this->input->post('intIdPost');
    $response  = $this->input->post('response');
    $intIdUser = $this->session->userdata['user']['intIdUser'];

    $data_response = array(
      'intIdPost' => $intIdPost,
      'intIdUser' => $intIdUser,
      'response'  => $response
    );
    $isAble = $this->db->where('intIdUser', $intIdUser)
    ->where('intIdPost',$intIdPost)
    ->get("lol_like_post")->row_array();

    if (!$isAble) {
      $this->db->insert('lol_like_post', $data_response);
    }else {
      $this->db->where('intIdUser', $intIdUser)
      ->where('intIdPost',$intIdPost)
      ->update("lol_like_post", $data_response);
    }

    $get_like = $this->home_m->get_query_post($intIdPost);
    $data = $this->db->query($get_like)->row_array();
    echo json_encode($data);
  }

  public function load_comments()
  {
    $commentText = $this->input->post('comment');
    $intIdPost   = $this->input->post('intIdPost');
    $intIdUser   = $this->session->userdata['user']['intIdUser'];

    if ($commentText != NULL) {
      $commentData = array(
        'intIdPost' => $intIdPost,
        'intIdUser' => $intIdUser,
        'comment'   => $commentText,
        'dtmDate'   => date("Y-m-d H:i:s"),
      );

      $isAble = $this->db->where('intIdUser', $intIdUser)
      ->where('intIdPost', $intIdPost)
      ->where('comment', $commentText)
      ->get("lol_comments")->row_array();

      if ($isAble) {
        $this->db->where('intIdUser', $intIdUser)
        ->where('intIdPost', $intIdPost)
        ->where('comment', $commentText)
        ->update("lol_comments",$commentData);
      }else {
        $this->db->insert('lol_comments', $commentData);
      }
    }

    $data      = $this->db->where('intIdPost', $intIdPost)
    ->join("lol_user","lol_user.intIdUser = lol_comments.intIdUser")
    ->get('lol_comments')->result_array();

    echo "<p>";
    foreach ($data as $comment) {

      $img         = $comment['image_profile'];

      $fm          = ($comment['gender'] == 1) ? "male" : "female" ;

      $imgSource   = ($img == NULL) ? $fm.".png" : $img ;

      $imgLower    = strtolower($imgSource);

      $imageUrl    = (strstr($imgLower,"http://") || strstr($imgLower,"https://")) ? '' : base_url('/assets/img/profile/');

      $imgSource   = $imageUrl.$imgSource;

      $genderLabel = ($comment['gender'] == '1') ? "primary" : "danger" ;

      echo "<div class='alert alert-success'>";
      echo "<img width='20px' height='20px' class='img-circle' src='"
      .$imgSource
      ."'><div class='label label-$genderLabel'>
      ";
      echo $comment['username'];
      echo "</div> &nbsp; : &nbsp; ";
      echo $comment['comment']
      ."<small class='pull-right'>".$comment['dtmDate']."</small>";
      echo "</div>";
    }
    // echo "<div class='pull-right'>"
    // echo "<small>";
    // echo $comment['dtmDate'];
    // echo "</small>";
    // echo "</div>";
    echo "<p>";
  }

}
