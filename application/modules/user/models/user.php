<?php 

class Viven_User_Model extends Model{

  function __construct() {
    parent::__construct();
  }
  
  
  /**
   * 
   * @param type $details - Array of User Details such as UserName, PassWord, UserLevel, UserBranch
   * @return boolean - True => SUCCESS; False => FAILURE
   * 
   */
  public function addUser($details){
    
    /**
     * Check if the username exists before adding user to the db
     */
    $cu = $this -> db -> query("SELECT _emp_un FROM viv_emp_en WHERE _emp_un = ".
                                  $this -> db -> quote($details['un']));
    $valid = $cu -> fetchAll(PDO::FETCH_ASSOC);
    if($valid) return "User Name <strong>".$valid[0]['_emp_un']."</strong> exists. Please select a unique one.";
    
    $qs = "INSERT INTO viv_emp_en (_emp_branch,
                                  _emp_un,
                                  _emp_pw,
                                  _emp_level,
                                  _emp_status) VALUES (".$this -> db -> quote($details['branch']).",".
                                                        $this -> db -> quote($details['un']).",".
                                                        $this -> db -> quote(md5($details['pw'])).",".
                                                        $this -> db -> quote($details['level']).",".
                                                        "1".")";
    
    if($this -> db -> exec($qs)) return "User added SUCCESSFULLY";
    else return "Could not ADD USER. Contact Admin";
    
  }
  
  function getUser($un, $pw){
    
    /**
     * Escape the input before performing db operations
     */
    $eun = $this -> db -> quote($un);
    $epw = $this -> db -> quote(md5($pw));    
    
    $temp = $this -> db -> query("SELECT _emp_level, _emp_branch FROM viv_emp_en WHERE _emp_un =". 
                                  $eun.
                                  " AND _emp_pw =".
                                  $epw.
                                  " AND _emp_status > 0"
                                );
    return $temp -> fetch(PDO::FETCH_ASSOC);
    
  }
  
  
  /**
   * 
   * @param type $un - Username
   * @param type $pw - Password
   * @return int - 0 => NON-EXISTANT, 1 => LOGIN SUCCESS but LOGIN RECORD FAILED, 2 => SUCCESS
   */
  public function loginUser($un, $pw){
    
    
    
    if($result = $this -> getUser($un, $pw)){
      
      /**
       * Store identifiers for the current session
       */
      VivenAuth::setSession($un, 
                            $result['_emp_level'], 
                            $result['_emp_branch']);
      
      $eserver = $this -> db -> quote($_SERVER['REMOTE_ADDR']);
      
      $remote = geoip_record_by_name($_SERVER['REMOTE_ADDR']);
      $loc = $this -> db -> quote($remote['city']. '/'. $remote['country_name']);
      //$loc = $this -> db -> quote("Hyderabad/India");
      $qs = "INSERT INTO viv_lgn_rec_en ( _lgn_un,
                                          _lgn_ip,
                                          _lgn_loc,
                                          _lgn_time ) VALUES (".$eun.",".
                                                              $eserver.",".
                                                              $loc.",".
                                                              time().")";
      /**
       * Return 2 indicates LOGIN AND RECORDING SUCCESSFUL
       * Return 1 indicates LOGIN SUCCESS, BUT RECORDING FAIL
       */
      if($this -> db -> exec($qs)) return 2;
      else return 1;
    }
    
    /**
     * Return 0 indicates FAILED LOGIN
     */
    else return 0;    
  }
  
  
  /**
   * 
   * @param type $un - UserName to be affected
   * @param type $opw - Original Password for the User
   * @param type $pw - New Password for the User
   * @param type $level - New User Level
   * @param type $status - New User Status
   * @return boolean - True => SUCCESS, False => FAILURE
   * 
   */
  public function updateUser($un, $opw, $pw, $level=-9, $status=-9){
    /**
     * Escape supplied input before performing db operations
     */
    $eun = $this -> db -> quote($un);
    $epw = $this -> db -> quote(md5($pw));
    
    if($result = $this -> getUser($un, $opw)){
    
      if($level != -9) $elevel = $this -> db -> quote($level);
      else $elevel = '_emp_level';

      if($status != -9) $estatus = $this -> db -> quote($status);
      else $estatus = '_emp_status';

      $qs = "UPDATE viv_emp_en SET _emp_pw = ". $epw .", 
                                   _emp_level = ". $elevel . ", 
                                   _emp_status = ". $estatus. " WHERE _emp_un = ".$eun;


      if($this -> db -> exec($qs)) return "SUCCESS";
      else return $qs;
      
    } else return "Current Password is incorrect";
    
  }
  
}
