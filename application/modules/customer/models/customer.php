<?php 

class Viven_Customer_Model extends Model{

  function __construct() {
    parent::__construct();
  }  
  

  /**
   * Record Attendance of a customer
   * @param type $details Form elements
   * @return string Success/Failure status
   */
  function addAttendance($details){
    
    $eun = $this -> db -> quote($details['cn']);
    $edate = $this -> db -> quote($details['date']);
    $estatus = $this -> db -> quote($details['status']);
    $eremarks = $this -> db -> quote($details['remarks']);
    
    $qs = "INSERT INTO viv_cust_att_en (_cust_att_un,
                                       _cust_att_date,
                                       _cust_att_mark,
                                       _cust_att_remarks,
                                       _cust_att_addedby,
                                       _cust_att_addedon,
                                       _cust_att_lastmodby,
                                       _cust_att_lastmodon) VALUES (". $eun.", "
                                                                    . $edate.", "
                                                                    . $estatus.", "
                                                                    . $eremarks.", "
                                                                    . $_SESSION['un'].", "
                                                                    . "NOW(), "
                                                                    . $_SESSION['un'].", "
                                                                    . "NOW())";
    
    if($this -> db -> exec($qs)){
      return "Successfully added CUSTOMER ATTENDANCE";
    }
    else{
      return "Cannot record attendance. Please check your Internet connection or call ADMIN";
    }    
    
  }
  
  
  /**
   * Get Attendance Records of a customer
   * @param type $cun Customers Unique/User Name
   * @return string Success/Failure status
   */
  function getAttendance($cun){
    
    $eun = $this -> db -> quote($cun['un']);
    
    $qs = "SELECT * FROM viv_cust_att_en WHERE _cust_att_un = ". $eun." SORT BY _cust_att_addedon";
    $qr = $this -> db -> query($qs);
    return $qr -> fetchAll(PDO::FETCH_ASSOC);
    
  }
  
  
  /**
   * Add Feedback of a customer
   * @param type $cun Customers Unique/User Name
   * @return string Success/Failure status
   */
  function addFeedback($details){
    
    $cn = $this -> db -> quote($details['cn']);
    $date = $this -> db -> quote($details['date']);
    $remarks = $this -> db -> quote($details['remarks']);
    
    $qs = "INSERT INTO viv_cust_fdb_en (_cust_fdb_un,
                                       _cust_fdb_date,
                                       _cust_fdb_remarks,
                                       _cust_fdb_addedby,
                                       _cust_fdb_addedon,
                                       _cust_fdb_lastmodby,
                                       _cust_fdb_lastmodon) VALUES (". $cn . ", "
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
   * Get List of Customers
   * @param type $type All, Active, Inactive
   * @return string Success/Failure status
   */
  function getCustomerList($type){
    
    $etype = $this -> db -> quote($type);
    $qs = "SELECT _cust_un, _cust_name FROM viv_cust_en WHERE ";
    
    if($type == 0){
      $qs .= "1";
    }
    else{
      $qs .= "_cust_status = " . $etype;
    }
    
    $res = $this -> db -> query($qs); 
    $custlist = $res->fetchAll(PDO::FETCH_ASSOC); 
    $sla = array();
    if($custlist){
      foreach($custlist as $val){
        $sla[$val['_cust_name']] = array("value" => $val['_cust_un']);
      }
    }
    return $sla;    
    
  } // End GetCustomerList()
  
}