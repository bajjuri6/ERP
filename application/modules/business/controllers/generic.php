<?php

class Viven_Business_Generic extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  
  function getDesignationsAction(){
    
    require_once MODULES . 'business/models/generic.php';
    $model = new Viven_Model_Generic;
    
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
     echo $model -> getDesignationList();
    }
    else{
      return $model -> getDesignationList();
    } //End ELSE for XMLHTTPREQUEST check
    
    
  } //End GetDesignationsAction()  
  
  
}