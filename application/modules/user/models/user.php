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
    $cu = $this -> db -> query("SELECT _usr_un FROM viv_usr_en WHERE _usr_un = ".
                                  $this -> db -> quote($details['un']));
    $valid = $cu -> fetchAll(PDO::FETCH_ASSOC);
    if($valid) return "User Name <strong>".$valid[0]['_usr_un']."</strong> exists. Please select a unique one.";
    
    $qs = "INSERT INTO viv_usr_en (_usr_branch,
                                  _usr_un,
                                  _usr_pw,
                                  _usr_level,
                                  _usr_status) VALUES (".$this -> db -> quote($details['branch']).",".
                                                        $this -> db -> quote($details['un'] . '&@^#948sRUn&36#7ej').",".
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
    $epw = $this -> db -> quote(md5($pw . '&@^#948sRUn&36#7ej'));    
    
    $temp = $this -> db -> query("SELECT _usr_level, _usr_branch FROM viv_usr_en WHERE _usr_un =". 
                                  $eun.
                                  " AND _usr_pw =".
                                  $epw.
                                  " AND _usr_status > 0"
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
    
    
    $eun = $this -> db -> quote($un);
    if($result = $this -> getUser($un, $pw)){
      
      /**
       * Store identifiers for the current session
       */
      VivenAuth::setSession($un, 
                            $result['_usr_level'], 
                            $result['_usr_branch']);
      
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
      else return $qs;
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
      else $elevel = '_usr_level';

      if($status != -9) $estatus = $this -> db -> quote($status);
      else $estatus = '_usr_status';

      $qs = "UPDATE viv_usr_en SET _usr_pw = ". $epw .", 
                                   _usr_level = ". $elevel . ", 
                                   _usr_status = ". $estatus. " WHERE _usr_un = ".$eun;


      if($this -> db -> exec($qs)) return "SUCCESS";
      else return $qs;
      
    } else return "Current Password is incorrect";
    
  }
  
}
