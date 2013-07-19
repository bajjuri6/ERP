<?php

class Viven_Model_Department extends Model{

  function __construct() {
    parent::__construct();
  }
  
  
  function getDeptDetails($name){
    return $name;
  }
  
  
  function getDeptList($param){
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
  
  
  function addDepartment($details){
    return $details;
  }
  
}