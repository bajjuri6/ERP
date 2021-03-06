<?php

class Viven_Api_Generic extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  public function activeBranchesAction(){
    require_once MODULES.'/business/controllers/branch.php';
    $branchController = new Viven_Business_Branch;
    return $branchController -> getBranchListAction("active");    
  }
  
  public function inactiveBranchesAction(){
    require_once MODULES.'/business/controllers/branch.php';
    $branchController = new Viven_Business_Branch;
    return $branchController -> getBranchListAction("inactive");    
  }
  
  public function allBranchesAction(){
    require_once MODULES.'/business/controllers/branch.php';
    $branchController = new Viven_Business_Branch;
    return $branchController -> getBranchListAction("all");
  }
  
  /**
   * Get a list of Active Payment Modes for the Branch
   * @return type
   */
  public function activeModesAction(){
    require_once MODULES.'/finance/controllers/mode.php';
    $financeController = new Viven_Finance_Mode;
    return $financeController -> getModeListAction("active");    
  }
  
  
  /**
   * Get a List of User Roles in the Org
   * @return type Array List of all User Roles in the Organization
   */
  public function getUserRolesAction(){
    require_once MODULES.'/user/controllers/roles.php';
    $rolesController = new Viven_User_Roles;
    return $rolesController ->getRolesAction();
  }
  
  /**
   * UserName List of Active & Inactive (suspended, resigned) Staff
   * @param type $dsg indicates the designation of employees you're looking for
   * @return type
   */  
  public function getAllStaffAction(){
    require_once MODULES.'/staff/controllers/employee.php';
    $employeeController = new Viven_Staff_Employee;
    return $employeeController -> getStaffListAction('all', 2, $_SESSION['branch']);
  }
  
  /**
   * UserName List of Active/Current Staff
   * @param type $dsg indicates the designation of employees you're looking for
   * @return type
   */  
  public function getActiveStaffAction($dsg = 'all'){
    require_once MODULES.'/staff/controllers/employee.php';
    $employeeController = new Viven_Staff_Employee;
    return $employeeController -> getStaffListAction($dsg, 1, $_SESSION['branch']);
  }
  
  /**
   * UserName List of Inactive (suspended, resigned) Staff
   * @param type $dsg indicates the designation of employees you're looking for
   * @return type
   */  
  public function getInactiveStaffAction($dsg = 'all'){
    require_once MODULES.'/staff/controllers/employee.php';
    $employeeController = new Viven_Staff_Employee;
    return $employeeController -> getStaffListAction($dsg, 0, $_SESSION['branch']);
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
   * List of Pyament Modes
   * @return type
   */  
  public function getPaymentModesAction(){
    return;
  }
  
  /**
   * List of Expense Types
   * @return type
   */  
  public function getExpenseTypesAction(){
    require_once MODULES . '/business/controllers/generic.php';
    $businessController = new Viven_Business_Generic;
    return $businessController -> getExpenseTypesAction();
  }
  
  /**
   * List of Active Services Available at a Branch
   * @return type
   */  
  public function getActiveServicesAction($branch = null){
    require_once MODULES . '/business/controllers/service.php';
    $businessController = new Viven_Business_Service;
    return $businessController -> getServiceTypesAction($branch, 1);
  }
  
  /**
   * List of All Services Available at a Branch
   * @return type
   */  
  public function getAllServicesAction($branch){
    require_once MODULES . '/business/controllers/service.php';
    $businessController = new Viven_Business_Service;
    return $businessController -> getServiceTypesAction($branch, 2);
  }
  
  
  
  /**
   * List of Designations available in the Org
   * @return type Associate array of Designations
   */  
  public function getDesignationsAction(){
    require_once MODULES.'/business/controllers/generic.php';
    $businessController = new Viven_Business_Generic;
    return $businessController -> getDesignationAction();
    return;
  }
  
  
  
  /**
   * Validate User Name available in the Org
   * @return type Associate array of Designations
   */  
  public function validateUsernameAction(){
    require_once MODULES.'/customer/controllers/customer.php';
    $customerController = new Viven_Customer_Customer;
    return $customerController -> validateUserName();
    return;
  }
  
}