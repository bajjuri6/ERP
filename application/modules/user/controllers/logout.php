<?php

class Viven_User_Logout extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  public function indexAction(){
    session_unset();
    session_destroy();
    header('location:/');
  }
}