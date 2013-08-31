<?php

class Viven_Enroll_Model extends Model{
  
  function __construct() {
    parent::__construct();
  }
  
  function addCustomer($data){
    $timeCreated = time();
    $etc = $this -> db -> quote($timeCreated);
    $eun = $this -> db -> quote($_SESSION['un']);
    
    $cs = "SELECT _cust_un FROM viv_cust_en WHERE _cust_un = " . $this -> db -> quote($data['cid']);
    $cr = $this -> db -> query($cs);
    if($cr -> fetch(PDO::FETCH_ASSOC)){
      return "Duplicate Customer ID. Please assign a unique ID";
    }
    
    $qs = "INSERT INTO `viv_cust_en` (`_cust_un`, 
                                      `_cust_name`,
                                      `_cust_branch`,
                                      `_cust_service`,
                                      `_cust_addedby`, 
                                      `_cust_addedon`, 
                                      `_cust_lastmodby`, 
                                      `_cust_lastmodon`) 
                                      VALUES (".$this -> db -> quote($data['cid']).","
                                              .$this -> db -> quote($data['cn']).","
                                              .$this -> db -> quote($_SESSION['branch']).","
                                              .$this -> db -> quote($_POST['service']).","
                                              .$eun.","
                                              .$etc.","
                                              .$eun.","
                                              .$etc.")";
    
    /**
     * If the basics were added successfully, add details
     */
    if($this -> db -> exec($qs)){
      $qsdet = "INSERT INTO `viv_cust_det_en` (`_cust_det_un`, 
                                              `_cust_det_ph`, 
                                              `_cust_det_addr`, 
                                              `_cust_det_email`,
                                              `_cust_det_addedby`, 
                                              `_cust_det_addedon`, 
                                              `_cust_det_lastmodby`, 
                                              `_cust_det_lastmodon`) 
                                              VALUES (".$this -> db -> quote($data['cid']).","
                                                      .$this -> db -> quote($data['pn']).","
                                                      .$this -> db -> quote($data['addrss']).","
                                                      .$this -> db -> quote($data['em']).","
                                                      
                                                      .$eun.","
                                                      .$etc.","
                                                      .$eun.","
                                                      .$etc.")";
      if($this -> db -> exec($qsdet)){
        return "SUCCESS";
      }
      else{
        return $qsdet;//"Could not add customer details. Contact Admin.";
      }
    } {
      return $qs;//"Customer addition failed";
    }
    //return $this -> db -> exec($qs);
  }
  
  
  function getEnrollments($from, $to, $branch){
    $qs = 'SELECT _cust_un, 
                  _cust_name,
                  _cust_service,
                  _cust_branch,
                  _cust_status,
                  _cust_addedby,
                  _cust_addedon FROM viv_cust_en WHERE ';
    
    if($branch != 'all'){
      $qs .= '_cust_branch = ' . $branch . ' AND ';
    }
    
    $qs .= '_cust_addedon BETWEEN ' . $from . ' AND ' . $to;
    
    $qr = $this -> db -> query($qs);
    //return $qs;
    if($qr) return $qr -> fetchAll(PDO::FETCH_ASSOC);
    else return $qs;
  }
}