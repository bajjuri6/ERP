<?php

class Viven_Service_Model extends Model{
  
  function __contruct(){
    parent::__construct();
  }
  
  
  function addService($details){
    
    $sd = $this -> db -> quote($details['sd']);
    $sl = $this -> db -> quote($details['sl']);
    $sn = $this -> db -> quote($details['sn']);
    $sh = $this -> db -> quote($details['sh']);
    $st = $this -> db -> quote($details['st']);
    $remarks = $this -> db -> quote($details['remarks']);
    
    $un = $this -> db -> quote($_SESSION['un']);
    $time = time();
    
    foreach($details['branch'] as $val){
      $qs = "INSERT INTO viv_srv_en (_srv_branch,
                                    _srv_unq_id,
                                    _srv_type,
                                    _srv_name,
                                    _srv_start,
                                    _srv_length,
                                    _srv_tnc,
                                    _srv_addedby,
                                    _srv_addedon,
                                    _srv_lastmodby,
                                    _srv_lastmodon) VALUES ( ". $this -> db -> quote($val) . ", "
                                                              . $sh . ", "
                                                              . $st . ", " 
                                                              . $sn . ", " 
                                                              . $sd . ", " 
                                                              . $sl . ", " 
                                                              . $remarks . ", " 
                                                              . $un . ", " 
                                                              . $time . ", " 
                                                              . $un . ", " 
                                                              . $time . ")";
      if(!$this -> db -> exec($qs)){
        return $qs;
      } //End EXEC IF statement
      
    } //End FOREACH loop
    
    return "SUCCESS";
    
  } //End addService()
  
  
  /**
   * Add new Subscription - Either when initially enrolling or on later subscription
   */
  function addSub($details){
    
    $srvId = $this -> db -> quote($details['service']);
    $serviceDetails = $this -> srvDetails($srvId);
    $cun = $this -> db -> quote($details['un']);
    $sdate = time();
    $edate = $sdate + $serviceDetails['_srv_length'] * 86400 * 1000;
    $un = $this -> db -> quote($_SESSION['un']);
    $qs = "INSERT INTO viv_srv_sub_en (_srv_sub_unq_id,
                                       _srv_sub_cust,
                                       _srv_sub_date,
                                       _srv_sub_start,
                                       _srv_sub_end,
                                       _srv_sub_addedby,
                                       _srv_sub_addedon,
                                       _srv_sub_lastmodby,
                                       _srv_sub_lastmodon) VALUE (" . 
                                         $srvId . ", " .
                                         $cun . ", " .
                                         time() . ", " .           
                                         $sdate . ", " .
                                         $edate . ", " .
                                         $un . ", " .
                                         time() . ", " .
                                         $un . ", " .
                                         time() . ")";
    
    if($this -> db -> exec($qs)){
      return 1;  // Subscription added successfully
    }
    else{
      //var_dump($qs); Leaving this statement for future debugging requirements
      return 0;  // Failed adding the subscription
    }
  }
  
  /**
   * Get Details of a particular service
   * @param type $serviceId Unique ID of service
   * @return type Associative array of 
   */
  function srvDetails($serviceId){
    $sid = $this -> db -> quote($serviceId);
    $qs = "SELECT * FROM viv_srv_en WHERE _srv_unq_id = 'sdfd' AND _srv_branch = 'Vijayalakshmi'";
// . $sid;
    
    $res = $this -> db -> query($qs);
    return $res -> fetch(PDO::FETCH_ASSOC);
    //if(!$ret) return $qs;
  }
  
}