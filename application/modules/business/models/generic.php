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
                                                                      . $_SESSION['un'].", "
                                                                      . "NOW())";
    if($this -> db -> exec($qs)){
      return "Role added successfully";
    } else return $qs;
    
  }
  
  function addPaymentMode($details){
    
    $name = $this -> db -> quote($details['name']);
    $comments = $this -> db -> quote($details['remarks']);
    $un = $this -> db -> quote($_SESSION['un']);
    $time = time();
    
    foreach($details['branch'] as $val){
      $qs = "INSERT INTO viv_srv_en (_payment_md_branch,
                                    _payment_md_name,
                                    _payment_md_comments,
                                    _payment_md_addedby,
                                    _payment_md_addedon,
                                    _payment_md_lastmodby,
                                    _payment_md_lastmodon) VALUES ( ". $this -> db -> quote($val) . ", "
                                                                    . $name . ", "
                                                                    . $comments . ", " 
                                                                    . $un . ", " 
                                                                    . $time . ", " 
                                                                    . $un . ", " 
                                                                    . $time . ")";
      if(!$this -> db -> exec($qs)){
        return $qs;
      } //End EXEC IF statement
      
    } //End FOREACH loop
    
    return "SUCCESS";
    
  }
  
  
}