<?php

class Viven_Model_Enroll extends Model{

  function __construct() {
    parent::__construct();
  }
  
  function addCustomer($data){
    $timeCreated = time();
    $query = "INSERT INTO `viv_cust_en` (`_cust_un`, `_cust_name`, `_cust_ph`, `_cust_addr`, `_cust_email`, `_cust_branch`, 
              `_cust_addedby`, `_cust_addedon`, `_cust_lastmodby`, `_cust_lastmodon`) 
              VALUES (".$this -> db -> quote($_SESSION['un']).","
                      .$this -> db -> quote($_SESSION['cn']).","
                      .$this -> db -> quote($data['pn']).","
                      .$this -> db -> quote($data['addrss']).","
                      .$this -> db -> quote($data['em']).","
                      .$this -> db -> quote($data['branch']).","
                      .$this -> db -> quote($_SESSION['un']).","
                      .$this -> db -> quote($timeCreated).","
                      .$this -> db -> quote($_SESSION['un']).","
                      .$this -> db -> quote($timeCreated).")";
    return $this -> db -> exec($query);
  }
}