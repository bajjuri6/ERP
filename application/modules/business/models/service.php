<?php

class Viven_Service_Model extends Model{
  
  function __contruct(){
    parent::__construct();
  }
  
  
  function addService($details){
    
    //$details = json_encode//
    
    $sd = $this -> db -> quote($details['sd']);
    $ed = $this -> db -> quote($details['ed']);
    $sn = $this -> db -> quote($details['sn']);
    $sh = $this -> db -> quote($details['sh']);
    $st = $this -> db -> quote($details['st']);
    $remarks = $this -> db -> quote($details['remarks']);
    
    foreach($details['branch'] as $val){
      $qs = "INSERT INTO viv_srv_en (_srv_branch,
                                    _srv_unq_id,
                                    _srv_type,
                                    _srv_name,
                                    _srv_start,
                                    _srv_end,
                                    _srv_tnc,
                                    _srv_addedby,
                                    _srv_addedon,
                                    _srv_lastmodby,
                                    _srv_lastmodon) VALUES ( ". $this -> db -> quote($val) . ", "
                                                              . $sh . ", "
                                                              . $st . ", " 
                                                              . $sn . ", " 
                                                              . $sd . ", " 
                                                              . $ed . ", " 
                                                              . $remarks . ", " 
                                                              . $_SESSION['un'] . ", " 
                                                              . "NOW(), " 
                                                              . $_SESSION['un'] . ", " 
                                                              . "NOW())";
      if(!$this -> db -> exec($qs)){
        return $qs;
      } //End EXEC IF statement
      
    } //End FOREACH loop
    
    return "SUCCESS";
    
  }
  
}