<?php

class Viven_Customer_Medical extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if($_POST['medical']){
        
        require_once MODULES . '/customer/models/customer.php';
        $model = new Viven_Customer_Model;
        echo $model -> addMedical($_POST);
        return;
    
        } //End Form Processing
      
    } //End XMLHTTPREQUEST check
  }

}