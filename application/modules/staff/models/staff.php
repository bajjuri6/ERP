<?php 

class Viven_Staff_Model extends Model{

  function __construct() {
    parent::__construct();
  }
  
  
  /**
   * Record Attendance of an employee
   * @param type $details Form elements
   * @return string Success/Failure status
   */
  function addAttendance($details){
    
    $eun = $this -> db -> quote($details['un']);
    $edate = $this -> db -> quote($details['date']);
    $estatus = $this -> db -> quote($details['status']);
    $eremarks = $this -> db -> quote($details['remarks']);
    
    $qs = "INSERT INTO viv_emp_att_en (_emp_att_un,
                                       _emp_att_date,
                                       _emp_att_mark,
                                       _emp_att_remarks,
                                       _emp_att_addedby,
                                       _emp_att_addedon,
                                       _emp_att_lastmodby,
                                       _emp_att_lastmodon) VALUES (". $eun.", "
                                                                    . $edate.", "
                                                                    . $estatus.", "
                                                                    . $eremarks.", "
                                                                    . $_SESSION['un'].", "
                                                                    . "NOW(), "
                                                                    . $_SESSION['un'].", "
                                                                    . "NOW())";
    
    if($this -> db -> exec($qs)){
      return "Successfully added STAFF ATTENDANCE";
    }
    else{
      return "Cannot record attendance. Please check your Internet connection or call ADMIN";
    }    
    
  }
  
  
  /**
   * Get Attendance Logs of Employees
   * @param type $param
   * @return type
   */  
  function getAttendance($param){
    
    return;
    
  }
  
  
  /**
   * Add New Employee to the Database
   * @param type $details
   * @return type
   */
  function addStaff($details){
    
    return;
    
  }
  
  
  /**
   * Get Get Information of Employees
   * @param type $param
   * @return type
   */  
  function getStaffInfo($param){
    
    return;
    
  }
  
  
  /**
   * Get Get List of Employees
   * @param type $param Type of employee
   * @return type
   */  
  function getStaffList($type, $status){
    $etype = $this -> db -> quote($type);
    $estatus = $this -> db -> quote($status);
    
    $qs = "SELECT _emp_pro_un FROM viv_emp_pro_en WHERE ";
    
    if($type == 'all'){
      
      if($estatus == 0){
        $qs .= "1";
      }
      else{
        $qs .= "_emp_pro_status = " . $estatus;
      }
      
    }
    else{
      
      if($estatus == 0){
        "_emp_pro_designation = " . $etype;
      }
      else{
      $qs .= "_emp_pro_designation = " . $etype . " AND _emp_pro_status = 1";
      }
    }
    
    if($res = $this -> db -> query($qs)){ 
      $stafflist = $res->fetchAll(PDO::FETCH_ASSOC); 
      $sla = array();
      if($stafflist){
        foreach($stafflist as $val){
          $sla[$val['_emp_pro_un']] = array("value" => $val['_emp_pro_un']);
        }
      }
      return $sla;    
    }else return array();
    
  }
  
  
  /**
   * Record Employees Feedback
   * @param type $param
   * @return type
   */  
  function addFeedback($details){
    
    $sn = $this -> db -> quote($details['sn']);
    $date = $this -> db -> quote($details['date']);
    $remarks = $this -> db -> quote($details['remarks']);
    
    $qs = "INSERT INTO viv_emp_fdb_en (_emp_fdb_un,
                                       _emp_fdb_date,
                                       _emp_fdb_remarks,
                                       _emp_fdb_addedby,
                                       _emp_fdb_addedon,
                                       _emp_fdb_lastmodby,
                                       _emp_fdb_lastmodon) VALUES (". $sn . ", "
                                                                     . $date . ", "
                                                                     . $remarks . ", "
                                                                     . $_SESSION['un'] . ", "
                                                                     . "NOW(), "
                                                                     . $_SESSION['un'] . ", "
                                                                     ." NOW())";
    if( $this -> db -> exec($qs) ){
      return "SUCCESS";
    }
    else{
      return $qs;
    } 
    
  }
  
  
  /**
   * Get Employees Feedback
   * @param type $param
   * @return type
   */  
  function getFeedback($param){
    
    return;
    
  }
  
  function addEmployee($data){
    $timeCreated = time();
    $query = "INSERT INTO `viv_emp_pro_en` (`_emp_pro_un`, `_emp_pro_branch`, `_emp_pro_shift`, 
              `_emp_pro_type`, `_emp_pro_supervisor_un`, `_emp_pro_doj`, `_emp_pro_designation`, `_emp_pro_sal`, 
              `_emp_pro_remarks`, `_emp_pro_addedby`, `_emp_pro_addedon`, `_emp_pro_lastmodby`, `_emp_pro_lastmodon`) 
              VALUES (".$this -> db -> quote($data['en']).","
                      .$this -> db -> quote($data['br']).","
                      .$this -> db -> quote($data['sft']).","
                      .$this -> db -> quote($data['type']).","
                      .$this -> db -> quote($data['sn']).","
                      .$this -> db -> quote($data['doj']).","
                      .$this -> db -> quote($data['dsg']).","
                      .$this -> db -> quote($data['sal']).","
                      .$this -> db -> quote($data['rm']).","
                      .$this -> db -> quote($_SESSION['un']).","
                      .$this -> db -> quote($timeCreated).","
                      .$this -> db -> quote($_SESSION['un']).","
                      .$this -> db -> quote($timeCreated).")";
    
    return $this -> db -> exec($query);
  }
}