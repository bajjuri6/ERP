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
    
    $dn = $this -> db -> quote($details['dn']);
    $db = $this -> db -> quote($details['db']);
    $dm = $this -> db -> quote($details['dm']);
    $dc = $this -> db -> quote($details['dc']);
    
    $qs = "INSERT INTO viv_dept_en (_dept_name,
                                      _dept_branch,
                                      _dept_manager,
                                      _dept_cmnts,
                                      _dept_addedby,
                                      _dept_addedon,
                                      _dept_lastmodby,
                                      _dept_lastmodon
                                      ) VALUES (" . $dn . ", "
                                                  . $db . ", "
                                                  . $dm . ", "
                                                  . $dc . ", "
                                                  . $_SESSION['un'] . ", "
                                                  . "NOW(), "
                                                  . $_SESSION['un'] . ","
                                                  . "NOW()) ";
    
    if($this -> db -> exec($qs)) return 0;
    else return $qs;
  }
  
}