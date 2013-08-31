<?php

class Viven_Followup_Model extends Model{

  function __construct() {
    parent::__construct();
  }
  
  
  public function addFollowup($details){
    $eid = $this -> db -> quote($details['eid']);
    $efb = $this -> db -> quote($details['fb']);
    $edate = $this -> db -> quote(strtotime($details['date']));
    $efr = $this -> db -> quote($details['fr']);
    $eremarks = $this -> db -> quote($details['remarks']);
    $timeCreated = $this -> db -> quote(time());
    $eun = $this -> db -> quote($details['un']);
    
    $qs = "INSERT INTO viv_inq_flw_en ( _inq_flw_inq_id,
                                        _inq_flw_emp_un,
                                        _inq_flw_date,
                                        _inq_flw_status,
                                        _inq_flw_cmnts,
                                        _inq_flw_addedby,
                                        _inq_flw_addedon,
                                        _inq_flw_lastmodby,
                                        _inq_flw_lastmodon) VALUES ("
                                            . $eid .", "
                                            . $efb .", "
                                            . $edate .", "
                                            . $efr .", "
                                            . $eremarks .", "
                                            . $eun .", "
                                            . $timeCreated .", "
                                            . $eun .", "
                                            . $timeCreated . ")";
    if($this -> db -> exec($qs)){
      $qsd = "UPDATE viv_inq_en SET _inq_status = 0 WHERE _inq_id = " . $eid;
      if($this -> db -> exec($qsd)){
        return "SUCCESS";
      }else return $qsd;
    }
    else{
      return $qs;//"FAILED";
    }
  }
  
}