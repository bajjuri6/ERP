<?php

class Viven_Business_Enroll extends Controller{

  
  function __construct() {
    parent::__construct();
  }
  
  
  function newAction(){
    
    /**
     * Customer Basics Sub-Form
     */
    require_once APP_PATH.'/modules/customer/controllers/basics.php';
    $basicsClass = new Viven_Customer_Basics;
    $this -> view -> basics = $basicsClass -> getForm();
    
    
    /**
     * Customer Attachments Sub-Form
     */
    require_once APP_PATH.'/modules/customer/controllers/attachments.php';
    $attachmentsClass = new Viven_Customer_Attachments;
    $this -> view -> attachments = $attachmentsClass -> getForm();
    
    
    /**
     * Emergency Sub-Form Elements
     */
    require_once APP_PATH.'/modules/customer/controllers/emergency.php';
    $emergencyClass = new Viven_Customer_Emergency;
    $this -> view -> emergency = $emergencyClass -> getForm();


    /**
     * Personal Sub-Form Elements
     */
    require_once APP_PATH.'/modules/customer/controllers/personal.php';
    $personalClass = new Viven_Customer_Personal;
    $this -> view -> personal = $personalClass -> getForm();


    /**
     * Medical Sub-Form Elements
     */
    require_once APP_PATH.'/modules/customer/controllers/medical.php';
    $medicalClass = new Viven_Customer_Medical;
    $this -> view -> medical = $medicalClass -> getForm();
    
    
    /**
     * Physical Sub-Form Elements
     */    
    require_once APP_PATH.'/modules/customer/controllers/physical.php';
    $physicalClass = new Viven_Customer_Physical;
    $this -> view -> physical = $physicalClass -> getForm();
      
    $this -> view -> render('enroll/index','business');
  } //End newAction
  
  
  
  /**
   * Add Basic Customer Details
   * @return type Status update
   */
  function addbasicAction(){
    
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if (isset($_POST['basics'])) {

        /**
         * Verify that all required fields are set
         */
        foreach ($_POST as $option) {
          if (!$option) {
            echo "All fields are required";
            return;
          }
        }

        require_once MODULES . '/business/models/enroll.php';
        $model = new Viven_Enroll_Model;
        $res = $model -> addCustomer($_POST);

        if ($res == "SUCCESS") {

          /**
           * If basic information is successfully added, add a subscription to the service
           */
          require_once MODULES . '/business/models/service.php';
          $srvModel = new Viven_Service_Model;
          echo $srvModel -> addSub($_POST);

        }

        else {
          echo $res;
        } //End Else for checking return of addCustomer()

      } // End checking BASICS hidden element  
      
    } //End XMLHTTPREQUEST check
    
    else{
      header('location:/');
    }
    
  } // End addBasic()
  
  
  function getEnrollmentsAction($from = -1, $to = -1, $branch = 'all'){
    
    require_once MODULES . '/business/models/enroll.php';
    $model = new Viven_Enroll_Model;
    
    if($from == -1 || $to == -1) {
      $from = strtotime(date('Y-m-d',time() - 10*86400));
      $to = strtotime(date('Y-m-d',time()+86400));
    }
    
    return $model -> getEnrollments($from, $to, $branch);
  }

}