<?php

class Viven_Model_Branch extends Model{

  function __construct() {
    parent::__construct();
  }
  
  
  function getBranchDetails($name){
    $qs = "SELECT * from viv_branch_en WHERE _branch_name = " . $name;
    $res = $this -> db -> query($qs); 
    $branchdetails = $res->fetchAll(PDO::FETCH_ASSOC); 
    
    return $branchdetails;
  }
  
  
  function getBranchList($param){
    
    $qs = "SELECT _branch_name from viv_branch_en WHERE ";
    
    switch($param){
      case 'all':
        $qs .= "1";
        break;
      case 'active':
        $qs .= "_branch_active = 1";
        break;
      case 'inactive':
        $qs .= "_branch_active = 0";
        break;
      default:
        $qs .= "1";
        break;
    }
    
    $res = $this -> db -> query($qs); 
    $branchlist = $res->fetchAll(PDO::FETCH_ASSOC); 
    $bla = array();
    if($branchlist){      
      foreach($branchlist as $val){
        $bla[$val['_branch_name']] = array("value" => $val['_branch_name']);
      }
    }
    return $bla;
  }
  
  function addBranch($details){
    $bn = $this -> db -> quote($details['bn']);
    $bm = $this -> db -> quote($details['bm']);
    $ba = $this -> db -> quote($details['ba']);
    $bo = $this -> db -> quote($details['bot']);
    $bc = $this -> db -> quote($details['bct']);
    $remarks = $this -> db -> quote($details['remarks']);
    $rtime = time();
    $qs = "INSERT INTO viv_branch_en (_branch_name,
                                      _branch_addr,
                                      _branch_ot,
                                      _branch_ct,
                                      _branch_cmnts,
                                      _branch_addedby,
                                      _branch_addedon,
                                      _branch_lastmodby,
                                      _branch_lastmodon
                                      ) VALUES (" . $bn . ", "
                                                  . $ba . ", "
                                                  . $bo . ", "
                                                  . $bc . ", "
                                                  . $remarks . ", "
                                                  . $this -> eun . ", "
                                                  . $rtime . ", "
                                                  . $this -> eun . ","
                                                  . $rtime . ")";
    
    $qst = "INSERT INTO viv_branch_tmngs_en (_branch_tmngs_name,
                                            _branch_tmngs_ot,
                                            _branch_tmngs_ct,
                                            _branch_tmngs_cmnts,
                                            _branch_tmngs_addedby,
                                            _branch_tmngs_addedon
                                            ) VALUES (" . $bn . ", "
                                                        . $bo . ", "
                                                        . $bc . ", "
                                                        . $remarks . ", "
                                                        . $this -> eun . ", "
                                                        . $rtime . ")";
    
    if($this -> db -> exec($qs)) {
      if($this -> db -> exec($qst)){
        return "SUCCESS";
      }
      else {
        return $qst;
      }      
    }
    else {
      return $qs;
    }
  }
  
}