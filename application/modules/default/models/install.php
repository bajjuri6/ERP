<?php 

class Install_Model extends Model{

  function __construct() {
    parent::__construct();
  }
  
  public function checkInstallationCode($installationCode){
    
    $temp = $this -> db -> query("SELECT _Cde_St_Ts FROM _viven_demo_table WHERE _Instl_Cde =". $this -> db -> quote($installationCode));
    $result = $temp -> fetch(PDO::FETCH_ASSOC);
    
    if($result){
      if($result['_Cde_St_Ts'] == 0){
        return 1;
      }
      else{
        return 2;
      }
    }
    else{
      return false;
    }
  }
  
  public function generateInstallationCode( $productName, 
                                            $companyName,
                                            $shortHand,
                                            $companyAddress, 
                                            $companyContactPerson, 
                                            $companyContactNumber, 
                                            $remarks, 
                                            $createdBy, 
                                            $duration ){
    $timecreated = time();
    $id = md5($timecreated.rand(23, 342).'$#Adsfa#$%');
    $installationCode = md5(uniqid(rand(23, 234324), true));
    
    $query = "INSERT INTO _viven_demo_table VALUES(".$this ->db -> quote($productName).",
              '$id',".
              $this ->db -> quote($companyName).",".
              $this ->db -> quote($shortHand).",".
              $this ->db -> quote($companyAddress).",".
              $this ->db -> quote($companyContactPerson).",".
              $this ->db -> quote($companyContactNumber).",".
              $this ->db -> quote($remarks).",".
              $this ->db -> quote($createdBy).",".
              "'$timecreated', 
              '$installationCode', 
              0,
              ".$this ->db -> quote($duration).")";
    
    if($this -> db -> exec($query)){
      return $installationCode;
    }
    else{
      return false;
    }
  }
  
  public function createDB($installationCode){
    
    $temp = $this -> db -> query("SELECT _Prdct_Name, _Cmpny_Shrt, _Cmpny_ID FROM _viven_demo_table WHERE _Instl_Cde =". 
            $this -> db -> quote($installationCode));
    
    $result = $temp -> fetch(PDO::FETCH_ASSOC);
    
    $connection = new PDO('mysql:host=localhost', 'root', 'vivenfarms');
    $dbName = 'AutoInstall_'.$result['_Cmpny_Shrt'].'_'.rand(100, 9999).'_db';
    $dbCreated = $connection -> exec("CREATE DATABASE `$dbName`");
    
    if($dbCreated){
      switch($result['_Prdct_Name']){
        case 'gym':
          $filename = APP_PATH.'/../library/db_schemas/gym.sql';
          break;
        case "ims":
          $filename = APP_PATH.'/../library/db_schemas/ims.sql';
          break;
        default:
          return false;
      }
      $connection = new PDO("mysql:host=localhost;dbname=$dbName", 'root', 'vivenfarms');
        
      $templine = '';
      $error = array();
      $lines = file($filename);

      foreach ($lines as $line){
        if (substr($line, 0, 2) == '--' || $line == ''){
          continue;
        }

        $templine .= $line;
        if (substr(trim($line), -1, 1) == ';'){
            if($connection -> exec($templine)){
              $templine = '';
            }
            else{
              $tmp = $connection -> errorInfo();

              if($tmp[0] != '00000'){
                $error = $tmp;
                break;
              }
            }
        }
      }

      if(!empty($error) && ($error[0] != '00000')){
        return $error;
      }
      else{
        $_SESSION['DB_Name'] = $dbName;
        $_SESSION['Product_Name'] = $result['_Prdct_Name'];
        $_SESSION['Company_SName'] = $result['_Cmpny_Shrt'];
        $_SESSION['Installation_Code'] = $installationCode;
        return 'success';
      }
    }
  }
  
  public function createUser($username, $password){
    
    $id = 1;
    $password = md5($password);
    $timecreated = time();
    $username = strtolower($_SESSION['Company_SName'].'_'.$username);
    
    switch($_SESSION['Product_Name']){
        case 'gym':
          $query = "INSERT INTO viv_emp_en VALUES('$id', '1', '$username', '$password', '10', '$timecreated')";
          break;
        case "ims":
          $query = "INSERT INTO users VALUES('$id', '$username', '$password', '1', '$timecreated', '$timecreated', '$username')";
          break;
        default:
          return false;
    }
    $dbName = $_SESSION['DB_Name'];
    $connection = new PDO("mysql:host=localhost;dbname=$dbName", 'root', 'vivenfarms');
    
    if($connection -> exec($query)){
     // $this ->updateSuperTableWithRootUser($username, $_SESSION['Company_SName']);
      return true;
    }
    else{
      return false;
    }
  }
  
  public function startExpiryTimeAndSuperUser($installationCode, $superUser){
    
    $superUser = strtolower($_SESSION['Company_SName'].'_'.$superUser);
    $temp = $this -> db -> query("SELECT _Prdct_Expry FROM _viven_demo_table WHERE _Instl_Cde =". $this -> db -> quote($installationCode));
    $result = $temp -> fetch(PDO::FETCH_ASSOC);
    
    $expiryTime = $result['_Prdct_Expry']*86400 + time();
    $this -> db -> exec("UPDATE _viven_demo_table SET _Prdct_Expry='$expiryTime', _Cde_St_Ts=1, _Root_User='$superUser' WHERE _Instl_Cde =". $this -> db -> quote($installationCode));
  }
}
