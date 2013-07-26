<?php

class Viven_Followup_Model extends Model{

  function __construct() {
    parent::__construct();
  }
  
  public function getOpen(){
    
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
                                                                      . $_SESSION['un'].", "
                                                                      . "NOW())";
    if($this -> db -> exec($qs)){
      return "Role added successfully";
    } else return $qs;
    
  }
  
}