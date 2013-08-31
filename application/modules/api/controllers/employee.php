<?php

class Viven_Api_Employee extends Controller{

  function __construct() {
    parent::__construct();
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
   * List of Designations available in the Org
   * @return type Associate array of Designations
   */  
  public function getDesignationsAction(){
    require_once MODULES.'/business/controllers/generic.php';
    $businessController = new Viven_Business_Generic;
    return $businessController -> getDesignationAction();
    return;
  }
  
  
}