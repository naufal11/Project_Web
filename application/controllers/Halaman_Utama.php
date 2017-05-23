<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$this->load->view('navbar');
	}
	public function insert_gambar(){

		$config['upload_path']          = './assets/gambar/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload', $error);
		}else{
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('upload', $data);
		}
	}
}
