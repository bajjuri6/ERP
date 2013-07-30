<?php

class Viven_Model_Training extends Model{

  function __construct() {
    parent::__construct();
  }
  
  function addCustomerTraining($data){
    $timeCreated = time();
    $query = "INSERT INTO `viv_srv_sub_en` (`_srv_sub_unq_id`, `_srv_sub_cust`, `_srv_sub_date`, `_srv_sub_start`, 
              `_srv_sub_end`, `_srv_sub_addedby`, `_srv_sub_addedon`, `_srv_sub_lastmodby`, `_srv_sub_lastmodon`)
              VALUES (".$this -> db -> quote($data['srvce']).","
                      .$this -> db -> quote($data['customer']).","
                      .$this -> db -> quote($data['subdate']).","
                      .$this -> db -> quote($data['sdate']).","
                      .$this -> db -> quote($data['edate']).","
                      .$this -> db -> quote($_SESSION['un']).","
                      .$this -> db -> quote($timeCreated).","
                      .$this -> db -> quote($_SESSION['un']).","
                      .$this -> db -> quote($timeCreated).")";
    return $this -> db -> exec($query);
  }
}