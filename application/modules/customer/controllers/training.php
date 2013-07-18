<?php

class Viven_Customer_Training extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    
    $this -> view -> hello = "Syed";
    $this -> view -> render('training/index','customer');
  }
}