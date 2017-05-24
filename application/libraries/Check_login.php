<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by Muhamad Deva
 */
class Check_login
{
  public function __construct()
  {

  }
  public function isLogin()
  {
    if (isset($this->session->logon)) {
        return TRUE;
    }else {
      return FALSE;
    }
  }
}
