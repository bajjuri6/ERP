<?php

require_once MODULES.'/install/models/install.php';

class Install extends Controller{

  function __construct() {
    parent::__construct();
  }

  public function installProduct($installationCode){
    
    $installProductModel = new Install_Model();
    
    if(!empty($_POST['uname']) && !empty($_POST['pwd']) && !empty($_POST['c_pwd']) && !empty($_POST['code'])){
      
      $status = $installProductModel ->checkInstallationCode($_POST['code']);
      if($status == 1){
        if($_POST['pwd'] != $_POST['c_pwd']){
        $this -> view -> error = "Password and confirm password doesn't match";
        $this -> view -> uname = $_POST['uname'];
        $this -> view -> render('install/install', 'install');
        }
        else{
          $status = $installProductModel -> createDB($_POST['code']);

          if($status == 'success'){
            $result = $installProductModel -> createUser($_POST['uname'], $_POST['pwd']);

            if($result){
              //Trigger expiration time
              $installProductModel -> startExpiryTimeAndSuperUser($_POST['code'], $_POST['uname']);
              echo "User created successfully!! Please go here to login ---> http://localhost/".$_SESSION['Company_SName'];
            }
            else{
              echo "There was error creating user. Please try again!!";
            }
          }
          else{
            echo "Something went wrong, Please try again!!";
          }
        }
      }
      else{
        echo "User already created!!";
      }
      
    }
    else{
      $installationCode = empty($installationCode) ? $_POST['code'] : $installationCode;
      $status = $installProductModel ->checkInstallationCode($installationCode);

      if($status == 1){
        $this -> view -> code = $installationCode;
        $this -> view -> render('install/install', 'install');
      }
      else if($status == 2){
        echo "Expired installation code!";
      }
      else{
        echo "Invalid installation code!";
      }
    }
  }
  
  public function generateInstallationCode(){
    
    if(!empty($_POST['prdct']) && !empty($_POST['cmpny_name']) && !empty($_POST['cmpny_addrss']) && !empty($_POST['cmpny_prsn']) 
            && !empty($_POST['cmpny_cntnct_num']) && !empty($_POST['crtr']) && !empty($_POST['drtn'])){
      $installProductModel = new Install_Model();
      $installationCode = $installProductModel -> generateInstallationCode($_POST['prdct'], 
                                                                            $_POST['cmpny_name'], 
                                                                            $_POST['short_hand'], 
                                                                            $_POST['cmpny_addrss'], 
                                                                            $_POST['cmpny_prsn'], 
                                                                            $_POST['cmpny_cntnct_num'], 
                                                                            $_POST['remarks'],
                                                                            $_POST['crtr'], 
                                                                            $_POST['drtn']);
    
      if($installationCode){
        $url = $_SERVER['HTTP_HOST']."/demo/$installationCode";
        echo "Please share this URL with the company contact person ".$url;
      }
      else{
        echo "Something went wrong, Please try again!!";
      }
    }
    else{
      $this -> view -> render('install/create', 'install');
    }
  }
}