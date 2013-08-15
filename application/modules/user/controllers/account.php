<?php

class Viven_User_Account extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  public function updateAction(){
    
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      
      //$this -> view -> LoginStatus = "Initialized";
      if(isset($_POST['np'])){
      
        if($_POST['pw'] == $_POST['cnp']){
          require_once MODULES . '/user/models/user.php';
          $model = new Viven_User_Model();
          $res = $model -> updateUser($_SESSION['un'], $_POST['cp'], $_POST['pw']);
          echo $res;
        }
        else echo "Passwords failed to match";

      }else{
        
        $form = new Form();

        /**
         * Current Account Info
         */
        $form_fields_info['User Name: '] = "<strong>". strtoupper($_SESSION['un'])."</strong>";
        $form_fields_info['User Level: '] = "<strong>". strtoupper($_SESSION['level'])."</strong>";
        $infoform = $form -> Viven_ArrangeForm($form_fields_info,0,0,FALSE);

        /**
         * Change Password Form Elements
         */
        $cp = array("type" => "password", 
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

        $outform = '<form id="vf_pass" method="post">';
        $outform .= $infoform;
        $outform .= $form -> Viven_ArrangeForm($form_fields,2,1);
        $outform .= '</form>';
        echo $outform;

      }//end ELSE
      
    } //end XMLHTTPREQUEST check
    
  } //end passwordAction()
  
  
  /**
   * Populate the Home Page to show critical reports based on login information
   * If the Owner has logged in, show Payments Received/Receivable, New Enrollments, New Enquiries
   */
  function homeAction(){
    
    switch($_SESSION['level']){
      
      case 'Admin':
        require_once MODULES.'/finance/controllers/revenue.php';
        require_once MODULES.'/finance/controllers/expense.php';
        require_once MODULES.'/business/controllers/enroll.php';
        
        /**
         * Get Cash Receipts from Finance Module
         */
        $cr = new Viven_Finance_Revenue;
        $creceipts = $cr -> getRevenueAction();
        
        $er = new Viven_Finance_Expense;
        $ereports = $er -> getExpensesAction();
        
        $ne = new Viven_Business_Enroll;
        $nenrollments = $ne -> getEnrollmentsAction();
        
        $this -> view -> revenue = $creceipts;
        $this -> view -> expense = $ereports;
        $this -> view -> enrollment = $nenrollments;
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
    
  }
  
}