<?php

class Viven_Model_Branch extends Model{

  function __construct() {
    parent::__construct();
  }
  
  
  function getBranchDetails($name){
    return $name;
  }
  
  
  function getBranchList($param){
    switch($param){
      case 'all':
        break;
      case 'active':
        break;
      case 'inactive':
        break;
    }
    return $param;
  }
  
  function addBranch($details){
    return; 
  }
  
}