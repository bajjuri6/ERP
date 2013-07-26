<?php

class Viven_Staff_Employee extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  
  function addEmployeeAction(){
    return;
  }
  
  
  function getStaffListAction($type, $status){
    require MODULES . '/staff/models/staff.php';
    $model = new Viven_Staff_Model;
    $slist = $model -> getStaffList($type, $status);
    return $slist;
  }
  

}