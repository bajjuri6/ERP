<?php

class Viven_Customer_Physical extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if($_POST['physical']){
        
        require_once MODULES . '/customer/models/customer.php';
        $model = new Viven_Customer_Model;
        echo $model -> addPhysical($_POST);
        return;
    
        } //End Form Processing
      
    } //End XMLHTTPREQUEST check
  }

}