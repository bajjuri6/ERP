<?php

class Viven_Api_Followup extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  public function openFollowupAction(){
    require MODULES.'/business/controllers/followup.php';
    $branchController = new Viven_Business_Followup();
    return $branchController -> getBranchListAction("active");    
  }
  
}