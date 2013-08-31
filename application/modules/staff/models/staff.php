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
   * Get Get Information of an Employee
   * @param type $id
   * @return type
   */  
  function getStaffInfo($id){
    $qs = "SELECT * FROM viv_emp_en LEFT JOIN viv_emp_pro_en ON _emp_un = _emp_pro_un 
                                    LEFT JOIN viv_emp_per_en PN _emp_un = _emp_per_un
                                    WHERE viv_emp_en = " . $id;
    if($res = $this -> db -> query($qs)){ 
      return $res->fetchAll(PDO::FETCH_ASSOC); 
    }
    else{
      return $qs;
    }
    
  }
  
  
  /**
   * Get Get List of Employees
   * @param type $dsg Designation of employee
   * @param status $status Employement Status 
   * @param branch $branch Branch of the employees in the list
   * @return type Associate array (Username => Username)
   */  
  function getStaffList($dsg, $status, $branch){
    $edsg = $this -> db -> quote($dsg);
    $estatus = $this -> db -> quote($status);
    $ebranch = $this -> db -> quote($branch);
    
    $qs = "SELECT _emp_name, _emp_pro_un FROM viv_emp_pro_en INNER JOIN viv_emp_en ON _emp_un = _emp_pro_un WHERE _emp_pro_branch = " . $ebranch;
    
    if(strcmp($dsg, 'all') != 0){
      $qs .= ' AND _emp_pro_designation = ' . $edsg;
    }
   
    if($estatus != 2){
      $qs .= " AND _emp_pro_status = " . $status;
    }
      
    if($res = $this -> db -> query($qs)){ 
      $stafflist = $res->fetchAll(PDO::FETCH_ASSOC); 
      $sla = array();
      if($stafflist){
        foreach($stafflist as $val){
          $sla[$val['_emp_pro_un'].' - '.$val['_emp_name']] = array("value" => $val['_emp_pro_un']);
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
  
  function addEmployeeBasics($data){
    $timeCreated = $this -> db -> quote(time());
    $eun = $this -> db -> quote($_SESSION['un']);
    
    $qs = "INSERT INTO viv_emp_en (_emp_name,
                                  _emp_branch,
                                  _emp_un,
                                  _emp_addedby,
                                  _emp_addedon) VALUES (" 
                                          . $this -> db -> quote($data['en']) . ","
                                          . $this -> db -> quote($data['branch']).","
                                          . $this -> db -> quote($data['eid']).","
                                          . $eun . ","
                                          . $timeCreated . ")";
    
    if($this -> db -> exec($qs)){
      
      $qsd = "INSERT INTO `viv_emp_pro_en` (_emp_pro_un, 
                                            _emp_pro_branch, 
                                            _emp_pro_shift,
                                            _emp_pro_type,
                                            _emp_pro_supervisor_un,
                                            _emp_pro_doj,
                                            _emp_pro_designation,
                                            _emp_pro_sal,
                                            _emp_pro_remarks,
                                            _emp_pro_addedby,
                                            _emp_pro_addedon,
                                            _emp_pro_lastmodby,
                                            _emp_pro_lastmodon) VALUES (" 
                                                  . $this -> db -> quote($data['eid']) . ","
                                                  . $this -> db -> quote($data['branch']).","
                                                  . $this -> db -> quote($data['sft']).","
                                                  . $this -> db -> quote($data['type']).","
                                                  . $this -> db -> quote($data['sn']).","
                                                  . $this -> db -> quote(strtotime($data['doj'])).","
                                                  . $this -> db -> quote($data['dsg']).","
                                                  . $this -> db -> quote($data['sal']).","
                                                  . $this -> db -> quote($data['rm']).","
                                                  . $eun . ","
                                                  . $timeCreated . ","
                                                  . $eun . ","
                                                  . $timeCreated . ")";

      if($this -> db -> exec($qsd)){
        return 'SUCCESS';
      } // All izz well
      else{
        return $qsd;
      } //viv_emp_pro_en failed
      
    }
    else{
      return $qs; //viv_emp_en failed
    }
    
    
  } // End EMPLOYEE BASICS
  
  
  
  function addEmployeeAttachments($data){
    $timeCreated = $this -> db -> quote(time());
    $eun = $this -> db -> quote($_SESSION['un']);
    $empun = $this -> db -> quote($data['en']);
    
    
    $allowedExts = array("jpeg", "jpg", "png", "doc", "docx", "odt", "pdf");
    $uploadName = explode(".", $_FILES["doc"]["tmp_name"]);
    $extension = strtolower(end($uploadName)); //Ignore Case by converting the extension into lower case
    
    if(!in_array($extension, $allowedExts)) {
      return var_dump($_FILES["doc"]["tmp_name"]);
      return "Invalid File Type";
      
    }
    
    $fname = $empun . rand() . $extension;
    if ($_FILES["doc"]["error"] > 0)
    {
      return "Error: " . $_FILES["doc"]["error"] . "<br>";
    }
    else
    {
      move_uploaded_file($_FILES['doc']['tmp_name'], APP_PATH . '/../attachments/' . $fname);
    }

    
    $qs = "INSERT INTO viv_emp_attach_en (_emp_attach_un,
                                          _emp_attach_url,
                                          _emp_attach_addedby,
                                          _emp_attach_addedon) VALUES (" 
                                                  . $empun . ","
                                                  . $this -> db -> quote($fname).","
                                                  . $eun . ","
                                                  . $timeCreated . ")";
    
    if($this -> db -> exec($qs)){

      return 'SUCCESS';
      
    } // All izz well
    
    else{
      
      return $qs; //viv_emp_en failed
      
    }
    
  } // End EMPLOYEE ATTACHMENTS
  
  
  
  function addEmployeeEmergency($data){
    $timeCreated = $this -> db -> quote(time());
    $eun = $this -> db -> quote($_SESSION['un']);
    
    $qs = "INSERT INTO viv_emp_emer_en (_emp_emer_un,
                                        _emp_emer_name,
                                        _emp_emer_phone,
                                        _emp_emer_email,
                                        _emp_emer_address,
                                        _emp_emer_remarks,
                                        _emp_emer_addedby,
                                        _emp_emer_addedon,
                                        _emp_emer_lastmodby,
                                        _emp_emer_lastmodon) VALUES (" 
                                                . $this -> db -> quote($data['eeun']) . ","
                                                . $this -> db -> quote($data['ecn']) . ","
                                                . $this -> db -> quote($data['pn']).","
                                                . $this -> db -> quote($data['eem']).","
                                                . $this -> db -> quote($data['eaddr']).","
                                                . $this -> db -> quote($data['eremarks']).","
                                                . $eun . ","
                                                . $timeCreated . ","
                                                . $eun . ","
                                                . $timeCreated . ")";
    
    if($this -> db -> exec($qs)){

      return 'SUCCESS';
      
    } // All izz well
    
    else{
      
      return $qs; //viv_emp_en failed
      
    }
    
  } // End EMPLOYEE ATTACHMENTS
  
  
  
  function addEmployeePersonals($data){
    $timeCreated = $this -> db -> quote(time());
    $eun = $this -> db -> quote($_SESSION['un']);
    $edob = strtotime($data['epdob']);//$this -> db -> quote($data['epdob'])
    
    $qs = "INSERT INTO viv_emp_per_en (_emp_per_un,
                                       _emp_per_sex,
                                       _emp_per_marital,
                                       _emp_per_dob,
                                       _emp_per_address,
                                       _emp_per_phone,
                                       _emp_per_addedby,
                                       _emp_per_addedon,
                                       _emp_per_lastmodby,
                                       _emp_per_lastmodon) VALUES (" 
                                              . $this -> db -> quote($data['epun']) . ","
                                              . $this -> db -> quote($data['epgender']) . ","
                                              . $this -> db -> quote($data['epmarital']) . ","
                                              . $edob .","
                                              . $this -> db -> quote($data['epaddr']).","
                                              . $this -> db -> quote($data['eppn']).","
                                              . $eun . ","
                                              . $timeCreated . ","
                                              . $eun . ","
                                              . $timeCreated . ")";
    
    if($this -> db -> exec($qs)){

      return 'SUCCESS';
      
    } // All izz well
    
    else{
      
      return $qs; //viv_emp_en failed
      
    }
    
  } // End EMPLOYEE ATTACHMENTS
  
  
}