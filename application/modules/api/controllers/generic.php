<?php

class Viven_Api_Generic extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  public function activeBranchesAction(){
    require MODULES.'/business/controllers/branch.php';
    $branchController = new Viven_Business_Branch;
    return $branchController -> getBranchListAction("active");    
  }
  
  public function inactiveBranchesAction(){
    require MODULES.'/business/controllers/branch.php';
    $branchController = new Viven_Business_Branch;
    return $branchController -> getBranchListAction("inactive");    
  }
  
  public function allBranchesAction(){
    require MODULES.'/business/controllers/branch.php';
    $branchController = new Viven_Business_Branch;
    return $branchController -> getBranchListAction("all");
  }
  
  
  /**
   * Get a List of User Roles in the Org
   * @return type Array List of all User Roles in the Organization
   */
  public function getUserRolesAction(){
    require MODULES.'/user/controllers/roles.php';
    $rolesController = new Viven_User_Roles;
    return $rolesController ->getRolesAction();
  }
  
  /**
   * UserName List of Active & Inactive (suspended, resigned) Staff
   * @param type $type indicates the type of employees you're looking for
   * @return type
   */  
  public function getAllStaffList($type){
    require MODULES.'/staff/controllers/employee.php';
    $employeeController = new Viven_Staff_Employee;
    return $employeeController -> getStaffListAction($type,0);
  }
  
  /**
   * UserName List of Active (suspended, resigned) Staff
   * @param type $type indicates the type of employees you're looking for
   * @return type
   */  
  public function getActiveStaffList($type){
    require_once MODULES.'/staff/controllers/employee.php';
    $employeeController = new Viven_Staff_Employee;
    return $employeeController -> getStaffListAction($type,1);
  }
  
  /**
   * UserName List of Inactive (suspended, resigned) Staff
   * @param type $type indicates the type of employees you're looking for
   * @return type
   */  
  public function getInactiveStaffList($type){
    require MODULES.'/staff/controllers/employee.php';
    $employeeController = new Viven_Staff_Employee;
    return $employeeController -> getStaffListAction($type,2);
  }
  
  /**
   * UserName, CustomerName List of Active & Inactive (suspended, expired) Customers
   * @param type $type indicates the type of employees you're looking for
   * @return type
   */  
  public function getAllCutomerList(){
    require MODULES.'/customer/controllers/customer.php';
    $customerController = new Viven_Customer_Customer;
    return $customerController -> getCustomerListAction(0);
  }
  
  /**
   * UserName, CustomerName List of Active (suspended, expired) Customers
   * @param type $type indicates the type of employees you're looking for
   * @return type
   */  
  public function getActiveCutomerList(){
    require MODULES.'/customer/controllers/customer.php';
    $customerController = new Viven_Customer_Customer;
    return $customerController -> getCustomerListAction(1);
  }
  
  /**
   * UserName, CustomerName List of Inactive (suspended, expired) Customers
   * @param type $type indicates the type of employees you're looking for
   * @return type
   */  
  public function getInactiveCutomerList(){
    require MODULES.'/customer/controllers/customer.php';
    $customerController = new Viven_Customer_Customer;
    return $customerController -> getCustomerListAction(2);
  }
  
  /**
   * List of Pyament Modes
   * @param type $type indicates the type of employees you're looking for
   * @return type
   */  
  public function getPaymentModes(){
    return;
  }
  
}