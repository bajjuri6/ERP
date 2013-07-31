<?php

class Viven_User_Account extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  public function passwordAction(){
    //$this -> view -> LoginStatus = "Initialized";
    if(isset($_POST['lgn'])){
      $model = new Viven_User_Model();
      $res = $model ->updateUser($_POST['un'], $_POST['pw']);
      $result = "Update: ";
      switch($res){
        case 0:
          $result .= "FAILURE";
          break;
        case 1:
          $result .= "PARTIAL SUCCESS";
          break;
        case 2:
          $result .= "SUCCESS !!";
          header("location:/data/logins");
          break;
      }
       $this -> view -> LoginStatus = $result;
    }else{
      $form = new Form();
      //$form_fields = array();
      //$form_fields_info = array();
      
      /**
       * Current Account Info
       */
      $form_fields_info['User Name: '] = $_SESSION['un'];
      $form_fields_info['User Level: '] = $_SESSION['level'];
      $infoform = $form -> Viven_ArrangeForm($form_fields_info,0,0,FALSE);
      
      /**
       * Change Password Form Elements
       */
      $cp = array("type" => "text", 
                  "name" => "cp",
                  "id" => "cp",
                  "size" => "25",
                  "class" => "none");
      $cpassword = $form -> Viven_AddInput($cp);
      
      $form_fields['Current Password:'] = $cpassword;
      
      $pw = array("type" => "password", 
                  "name" => "pw",
                  "id" => "pw",
                  "size" => "25",
                  "class" => "none");
      $pword = $form -> Viven_AddInput($pw);
      
      $form_fields['New Password:'] = $pword;
      
      
      $cnp = array("type" => "password", 
                  "name" => "cnp",
                  "id" => "cnp",
                  "size" => "25",
                  "class" => "none");
      $cnpassword = $form -> Viven_AddInput($cnp);
      
      $form_fields['Confirm New Password:'] = $cnpassword;
      
      $np = array("type" => "hidden", 
                   "name" => "np",
                   "value" => "1");
      $npass = $form -> Viven_AddInput($np);
      $form_fields[''] = $npass;
            
      $outform = '<form action="/user/account/update">';
      $outform .= $infoform;
      $outform .= $form -> Viven_ArrangeForm($form_fields,2,1);
      $outform .= '</form>';
      echo $outform;
      
    }//end ELSE
    
  } //end passwordAction()
  
  
  /**
   * Populate the Home Page to show critical reports based on login information
   * If the Owner has logged in, show Payments Received/Receivable, New Enrollments, New Enquiries
   */
  function homeAction(){
    
    switch($_POST['level']){
      
      case 'Admin':
        require_once MODULES.'/finance/controllers/revenue.php';
        require_once MODULES.'/business/controllers/enroll.php';
        
        /**
         * Get Cash Receipts from Finance Module
         */
        $cr = new Viven_Finance_Revenue();
        $records = $obj -> getRecords('0,100');
        
        $this -> view -> data1 = $records;
        $this -> view -> data2 = $records;
        $this -> view -> data3 = $records;
        $this -> view -> data4 = $records;
        $this -> view -> render('account/home','user');
        break;
  
      case 'Manager':
        require_once MODULES.'/data/models/logindata.php';
        $obj = new Viven_Data_Model();
        $records = $obj -> getRecords('0,100');

        $this -> view -> data1 = $records;
        $this -> view -> data2 = $records;
        $this -> view -> data3 = $records;
        $this -> view -> data4 = $records;
        $this -> view -> render('account/home','user');
        break;
  
      case 'Standard':        
      default:
        require_once MODULES.'/data/models/logindata.php';
        $obj = new Viven_Data_Model();
        $records = $obj -> getRecords('0,100');

        $this -> view -> data1 = $records;
        $this -> view -> data2 = $records;
        $this -> view -> data3 = $records;
        $this -> view -> data4 = $records;
        $this -> view -> render('account/home','user');
        break;
      
    }
    
    require_once MODULES . '/';
    
    
  }
  
}