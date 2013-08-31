<?php

class Viven_Generic_Model extends Model{

  function __construct() {
    parent::__construct();
  }
  
  public function getDesignationAction(){
    
    $qs = "SELECT _inq_id FROM viv_usr_role_en WHERE 1";
    $res = $this -> db -> query($qs); 
    $roleslist = $res->fetchAll(PDO::FETCH_ASSOC); 
    
    /**
     * Generate associative list to be returned
     */
    $rla = array();
    if($roleslist){      
      foreach($roleslist as $val){
        $rla[$val['_usr_role_name']] = array("value" => $val['_usr_role_name']);
      }
    }
    return $rla;
  }
  
  function addRole($details){
    
    $ern = $this -> db -> quote($details['rn']);
    
    $qsc = "SELECT _usr_role_name FROM viv_usr_role_en WHERE _usr_role_name = " . $ern;    
    $res = $this -> db -> query($qsc);
    if($res -> fetchAll(PDO::FETCH_ASSOC)){
      return "Role exists. Cannot add duplicates.";
    }
    
    $qs = "INSERT INTO viv_usr_role_en (_usr_role_name,
                                        _usr_role_addedby,
                                        _usr_role_addedon) VALUES (". $ern.", "
                                                                      . $this -> eun .", "
                                                                      . "NOW())";
    if($this -> db -> exec($qs)){
      return "Role added successfully";
    } else return $qs;
    
  }
  
  
  function addExpenseType($details){
    
    $etn = $this -> db -> quote($details['etn']);
    $comments = $this -> db -> quote($details['remarks']);
    $time = time();
    
    $qs = "INSERT INTO viv_exp_type_en (_exp_type_text,
                                          _exp_type_comments,
                                          _exp_type_addedby,
                                          _exp_type_addedon,
                                          _exp_type_lastmodby,
                                          _exp_type_lastmodon) VALUES ( ". $etn . ", "
                                                                          . $comments . ", "
                                                                          . $this -> eun . ", " 
                                                                          . $time . ", " 
                                                                          . $this -> eun . ", " 
                                                                          . $time . ")";
      if($this -> db -> exec($qs)){
        return "SUCCESS";
      } //End EXEC IF statement
      else{
        return $qs;
      }
    
  } // End addExpenseType()
  
  
  function getExpenseTypes(){
    $qs = "SELECT _exp_type_text from viv_exp_type_en WHERE _exp_type_status = 1";
    $qr = $this -> db -> query($qs);
    $res = $qr -> fetchAll(PDO::FETCH_ASSOC);
    $eta = array();
    if($res){      
      foreach($res as $val){
        $eta[$val['_exp_type_text']] = array("value" => $val['_exp_type_text']);
      }
    }
    return $eta;
  }
  
  
}