<?php

class Viven_Data_Generic extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  // The $format parameter indicates if the user seeks JSON format or regular PHP array
  function getBranchListAction($param, $format){
    require MODULES.'/business/controllers/branch.php';
    $branchController = new Viven_Business_Branch;
    return $branchController -> getBranchListAction($param);    
  }
  
  function activeBranchesAction(){
    require MODULES.'/business/controllers/branch.php';
    $branchController = new Viven_Business_Branch;
    return $branchController -> getBranchListAction("active");    
  }
  
  function inactiveBranchesAction($format){
    require MODULES.'/business/controllers/branch.php';
    $branchController = new Viven_Business_Branch;
    return $branchController -> getBranchListAction("inactive");    
  }
  
  function allBranchesAction($format){
    require MODULES.'/business/controllers/branch.php';
    $branchController = new Viven_Business_Branch;
    return $branchController -> getBranchListAction("all");
  }
  
  function getUserRolesAction(){
    require MODULES.'/user/controllers/roles.php';
    $rolesController = new Viven_User_Roles;
    return $rolesController ->getRolesAction();
  }

}