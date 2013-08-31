<?php

class Viven_Api_Customer extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  /**
   * UserName, CustomerName List of Active & Inactive (suspended, expired) Customers
   * @param type $type indicates the type of employees you're looking for
   * @return type
   */  
  public function getAllCutomerAction(){
    require_once MODULES.'/customer/controllers/customer.php';
    $customerController = new Viven_Customer_Customer;
    return $customerController -> getCustomerListAction(0);
  }
  
  /**
   * UserName, CustomerName List of Active (suspended, expired) Customers
   * @param type $type indicates the type of employees you're looking for
   * @return type
   */  
  public function getActiveCutomerAction(){
    require_once MODULES.'/customer/controllers/customer.php';
    $customerController = new Viven_Customer_Customer;
    return $customerController -> getCustomerListAction(1);
  }
  
  /**
   * UserName, CustomerName List of Inactive (suspended, expired) Customers
   * @param type $type indicates the type of employees you're looking for
   * @return type
   */  
  public function getInactiveCutomerAction(){
    require_once MODULES.'/customer/controllers/customer.php';
    $customerController = new Viven_Customer_Customer;
    return $customerController -> getCustomerListAction(2);
  }
  
  
  /**
   * Validate User Name available in the Org
   * @return type Associate array of Designations
   */  
  public function validateCustomerIdAction(){
    require_once MODULES.'/customer/controllers/customer.php';
    $customerController = new Viven_Customer_Customer;
    return $customerController -> validateCustomerIdAction();
    return;
  }
  
  
  public function getUserDetailsAction(){
    require_once MODULES.'/customer/controllers/customer.php';
    $customerController = new Viven_Customer_Customer;
    return $customerController -> getUserDetailsAction();
    return;
  }
  
}