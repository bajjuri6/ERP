<?php

class Viven_Model_Enquiry extends Model{

  function __construct() {
    parent::__construct();
  }
  
  function addEnquiry($data){
    $timeCreated = time();
    $query = "INSERT INTO `viv_inq_en` (`_inq_emp_un`, 
                                        `_inq_branch`, 
                                        `_inq_cus_name`, 
                                        `_inq_cus_pnum`,
                                        `_inq_cus_email`, 
                                        `_inq_time`, 
                                        `_inq_ref`, 
                                        `_inq_type`, 
                                        `_inq_cmnts`, 
                                        `_inq_ref_cmnts`, 
                                        `_inq_status`, 
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
                                              .$this -> db -> quote($data['incharge']).","
                                              .$this -> db -> quote($data['en_type']).","
                                              .$this -> db -> quote($data['question']).","
                                              .$this -> db -> quote($data['remarks']).","
                                              .$this -> db -> quote(1).","
                                              .$this -> db -> quote($_SESSION['un']).","
                                              .$this -> db -> quote($timeCreated).","
                                              .$this -> db -> quote($_SESSION['un']).","
                                              .$this -> db -> quote($timeCreated).")";
    return $this -> db -> exec($query);
  }
}