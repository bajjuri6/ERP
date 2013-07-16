<?php

class User_Logout extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  public function indexAction(){
    session_unset();
    session_destroy();
    $this -> view -> render('login/index', 'user');
  }
}