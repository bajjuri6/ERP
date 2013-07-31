<?php

class Viven_Customer_Customer extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function getCustomerListAction($type){
    require_once MODULES . '/customer/models/customer.php';
    $model = new Viven_Customer_Model;
    $slist = $model -> getCustomerList($type);
    return $slist;
  }
  
  function validateUserName(){
    require_once MODULES . '/customer/models/customer.php';
    $model = new Viven_Customer_Model;
    
    echo $model -> validateUserName($_GET['un']);
  }
  
}