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
                                                                    . $this -> db -> quote($_SESSION['un']).", "
                                                                    . "NOW(), "
                                                                    . $this -> db -> quote($_SESSION['un']).", "
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
                                                                     . $this -> db -> quote($_SESSION['un']) . ", "
                                                                     . "NOW(), "
                                                                     . $this -> db -> quote($_SESSION['un']) . ", "
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
  
  
  /**
   * Add Personal Details of a Customer
   * @param type $details Associate array, perhaps $_POST variable
   */
  function addPersonal($details){
    $un = $this -> db -> quote($details['pcun']);
    $dob = $this -> db -> quote($details['dob']);
    switch($details['marital']){
      case "S":
        $marital = 0;
        break;
      case "M":
        $marital = 1;
        break;
      case "D":
        $marital = 2;
        break;
      default:
        $marital = 0;
        break;
    }    
    $gender = ($details['gender'] == "Male")? 1 : 0;
    $pro = $this -> db -> quote($details['pro']);
    $ref = $this -> db -> quote($details['ref']);
    
    $qs = "INSERT INTO viv_cust_det_en (_cust_det_un,
                                        _cust_det_sex,
                                        _cust_det_dob,
                                        _cust_det_ref,
                                        _cust_det_pro,
                                        _cust_det_marital,
                                        _cust_det_addedby,
                                        _cust_det_addedon,
                                        _cust_det_lastmodby,
                                        _cust_det_lastmodon) VALUES (" .
                                              $un . ", " .
                                              $gender . ", " .
                                              $dob . ", " .
                                              $ref . ", " .
                                              $pro . ", " .
                                              $marital . ", " .
                                              $this -> db -> quote($_SESSION['un']) . ", " .
                                              time() . ", " .
                                              $this -> db -> quote($_SESSION['un']) . ", " .
                                              time() . ")";
    if($this -> db -> exec($qs))
    {
      return "Personal Details Added Successfully";
    }
    else{
      return $qs;//"Could not add Personal Details. Contact Admin";
    }
  } //End addPersonal()
  
  
  /**
   * Add Emergency Contact Details of a Customer
   * @param type $details Associate array, perhaps $_POST variable
   */
  function addEmergency($details){
    $un = $this -> db -> quote($details['ecun']);
    $en = $this -> db -> quote($details['en']);
    $ep = $this -> db -> quote($details['ep']);
    $eaddr = $this -> db -> quote($details['eaddr']);
    $eem = $this -> db -> quote($details['eem']);
    $eremarks = $this -> db -> quote($details['eremarks']);
    
    $qs = "INSERT INTO viv_cust_emer_en (_cust_emer_un,
                                        _cust_emer_name,
                                        _cust_emer_ph,
                                        _cust_emer_email,
                                        _cust_emer_addr,
                                        _cust_emer_remarks,
                                        _cust_emer_addedby,
                                        _cust_emer_addedon,
                                        _cust_emer_lastmodby,
                                        _cust_emer_lastmodon) VALUES (" .
                                              $un . ", " .
                                              $en . ", " .
                                              $ep . ", " .
                                              $eem . ", " .
                                              $eaddr . ", " .
                                              $eremarks . ", " .
                                              $this -> db -> quote($_SESSION['un']) . ", " .
                                              time() . ", " .
                                              $this -> db -> quote($_SESSION['un']) . ", " .
                                              time() . ")";
    if($this -> db -> exec($qs))
    {
      return "Emergency Details Added Successfully";
    }
    else{
      return $qs;
    }
  } //End addEmergency()
  
  
  /**
   * Add Physical Details of a Customer
   * @param type $details Associate array, perhaps $_POST variable
   */
  function addPhysical($details){
    $un = $this -> db -> quote($details['phycun']);
    $wt = $this -> db -> quote($details['wt']);
    $ht = $this -> db -> quote($details['ht']);
    $chst = $this -> db -> quote($details['chst']);
    $sldr = $this -> db -> quote($details['sldr']);
    $wst = $this -> db -> quote($details['wst']);
    $bcp = $this -> db -> quote($details['bcp']);
    $clf = $this -> db -> quote($details['clf']);
    $pd = $this -> db -> quote($details['pd']);
    $premarks = $this -> db -> quote($details['premarks']);
    
    $qs = "INSERT INTO viv_cust_phy_en (_cust_phy_date,
                                        _cust_phy_un,
                                        _cust_phy_wt,
                                        _cust_phy_ht,
                                        _cust_phy_chest,
                                        _cust_phy_shoulder,
                                        _cust_phy_waist,
                                        _cust_phy_bicep,
                                        _cust_phy_calf,
                                        _cust_phy_remarks,
                                        _cust_phy_addedby,
                                        _cust_phy_addedon,
                                        _cust_phy_lastmodby,
                                        _cust_phy_lastmodon) VALUES (" .
                                              $pd . ", " .
                                              $un . ", " .
                                              $wt . ", " .
                                              $ht . ", " .
                                              $chst . ", " .
                                              $sldr . ", " .
                                              $wst . ", " .
                                              $bcp . ", " .
                                              $clf . ", " .
                                              $premarks . ", " .
                                              $this -> db -> quote($_SESSION['un']) . ", " .
                                              time() . ", " .
                                              $this -> db -> quote($_SESSION['un']) . ", " .
                                              time() . ")";
    if($this -> db -> exec($qs))
    {
      return "Physical Details Added Successfully";
    }
    else{
      return $qs;//"Could not add Physical Details. Contact Admin";
    }
  } //End addPhysical()
  
  
  /**
   * Add Medical Details of a Customer
   * @param type $details Associate array, perhaps $_POST variable
   */
  function addMedical($details){
    $un = $this -> db -> quote($details['mcun']);
    $md = $this -> db -> quote($details['md']);
    $smoke = $this -> db -> quote($details['smoke']);
    $alcohol = $this -> db -> quote($details['alcohol']);
    //$premarks = $this -> db -> quote($details['premarks']);
    
    $qs = "INSERT INTO viv_cust_phy_en (_cust_med_un,
                                        _cust_med_date,
                                        _cust_med_smoke,
                                        _cust_med_alcohol,
                                        _cust_phy_addedby,
                                        _cust_phy_addedon,
                                        _cust_phy_lastmodby,
                                        _cust_phy_lastmodon) VALUES (" .
                                              $un . ", " .
                                              $md . ", " .
                                              $smoke . ", " .
                                              $alcohol . ", " .
                                              $this -> db -> quote($_SESSION['un']) . ", " .
                                              time() . ", " .
                                              $this -> db -> quote($_SESSION['un']) . ", " .
                                              time() . ")";
    if($this -> db -> exec($qs))
    {
      return "Medical Details Added Successfully";
    }
    else{
      return "Could not add Medical Details. Contact Admin";
    }
  } //End addMedical()
  
  
  /**
   * Verify if the UserName is valid and exists in the DB
   * @param type $un UserName to be validated
   */
  function validateUserName($un){
    $un = $this -> db -> quote($un);
    
    $qs = "SELECT _cust_un FROM viv_cust_en WHERE _cust_un = " . $un;
    $qr = $this -> db -> query($qs);
    $qd = $qr -> fetch(PDO::FETCH_ASSOC);
    if($qd) return 1;
    else return 0;
  }
  
}