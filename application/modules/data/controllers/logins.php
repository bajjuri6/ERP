<?php

class Viven_Data_Logins extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function indexAction(){
    
    require MODULES.'/data/models/logindata.php';
    $obj = new Viven_Data_Model();
    $records = $obj -> getRecords('0,100');
    
    $this -> view -> data = $records;
    $this -> view -> render('logins/index','data');
    
  }

}