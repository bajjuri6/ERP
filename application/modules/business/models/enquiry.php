<?php

class Viven_Enquiry_Model extends Model{

  function __construct() {
    parent::__construct();
  }
  
  function addEnquiry($data){
    $timeCreated = time();
    $qs = "INSERT INTO `viv_inq_en` (`_inq_emp_un`, 
                                    `_inq_branch`, 
                                    `_inq_cus_name`, 
                                    `_inq_cus_pnum`,
                                    `_inq_cus_email`, 
                                    `_inq_time`,
                                    `_inq_type`, 
                                    `_inq_inq_cmnts`, 
                                    `_inq_flwup_inc`, 
                                    `_inq_flwup_date`, 
                                    `_inq_cmnts`,
                                    `_inq_addedby`,
                                    `_inq_addedon`, 
                                    `_inq_lastmodby`, 
                                    `_inq_lastmodon`) VALUES (" . 
                                          $this -> db -> quote($_SESSION['un']).","
                                          .$this -> db -> quote($_SESSION['branch']).","
                                          .$this -> db -> quote($data['cn']).","
                                          .$this -> db -> quote($data['pn']).","
                                          .$this -> db -> quote($data['em']).","
                                          .$this -> db -> quote($timeCreated).","
                                          .$this -> db -> quote($data['enqtype']).","
                                          .$this -> db -> quote($data['question']).","
                                          .$this -> db -> quote($data['sn']).","
                                          .$this -> db -> quote($data['fd']).","
                                          .$this -> db -> quote($data['remarks']).","
                                          .$this -> db -> quote($_SESSION['un']).","
                                          .$this -> db -> quote($timeCreated).","
                                          .$this -> db -> quote($_SESSION['un']).","
                                          .$this -> db -> quote($timeCreated).")";
  
    if($this -> db -> exec($qs)){
      return "SUCCESS";
    }
    else {
      return $qs;
    }
    
  } //End Enquiry List


  /**
   * 
   * @param type $type Type of Enquiries - Active or Inactive
   */
  function getEnquiryList($type){
    
    $qs = "SELECT _inq_id, _inq_cus_name FROM viv_inq_en WHERE _inq_status = " . $this -> db -> quote($type);
    
    if($result = $this -> db -> query($qs)){
      $enquirylist = $result->fetchAll(PDO::FETCH_ASSOC); 
      $ela = array();
      foreach($enquirylist as $val){
        $ela[$val['_inq_id'] . ' - ' . $val['_inq_cus_name']] = array("value" => $val['_inq_id']);
      }
      return $ela;
    }
    else {
      return $qs;
    }
    
  }
  
  
  /**
   * 
   * @param type $id Get Details of a particular enquiry
   * @return string
   */
  function getEnquiryDetails($id){
    
    $qs = "SELECT _inq_time, _inq_cus_name, _inq_cus_pnum, _inq_inq_cmnts FROM viv_inq_en WHERE _inq_id = " . $this -> db -> quote($id);
    
    if($result = $this -> db -> query($qs)){
      return json_encode($result->fetch(PDO::FETCH_ASSOC)); 
    }
    else {
      return "Could not fetch enquiry details";
    }
    
  }
  
} //End Class
