<?php

class Viven_Business_Followup extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if(isset($_POST['flwup'])){
        require_once MODULES . '/business/models/followup.php';
        $model = new Viven_Followup_Model;
        $res = $model -> addFollowup($_POST);

        echo $res;
        
      } //End POST functionality
      
    }else{
      
      $form = new Form();
      $form_fields = array();
      
      require_once APP_PATH . '/modules/business/controllers/enquiry.php';
      
      $dataController = new Viven_Api_Generic;
      $activeStafflist = $dataController->getActiveStaffAction('all');
      
      $enqController = new Viven_Business_Enquiry;
      $enquirylist = $enqController -> getListAction(1);
      
      /**
       * Enquiry Form Elements
       */
      $eid = array("name" => "eid",
                  "id" => "eid",
                  "class" => "none getenquirydetails",
                  "options" => $enquirylist);
      $enquiryid = $form ->Viven_AddSelect($eid);
      $form_fields['Enquiry ID:'] = $enquiryid;
      
      
      $idt = array("type" => "text", 
                  "name" => "idt",
                  "id" => "idt",
                  "size" => "27",
                  "class" => "none");
      $idate = $form -> Viven_AddInput($idt);      
      $form_fields['Enquiry Date:'] = $idate;
      
      
      $cn = array("type" => "text", 
                  "name" => "cn",
                  "id" => "cn",
                  "size" => "27",
                  "class" => "none");
      $cname = $form -> Viven_AddInput($cn);      
      $form_fields['Customer Name:'] = $cname;
      
      
      $pn = array("type" => "text", 
                  "name" => "pn",
                  "id" => "pn",
                  "size" => "27",
                  "class" => "none");
      $pnumber = $form -> Viven_AddInput($pn);      
      $form_fields['Phone Number:'] = $pnumber;
      
      
      $ques = array("type" => "text", 
                  "name" => "question",
                  "id" => "question",
                  "rows" => "3",          
                  "cols" => "26",
                  "class" => "none");
      $question = $form ->Viven_AddText($ques);
      $form_fields['Customer Question:'] = $question;
      
      $date = array("type" => "input", 
                  "name" => "date",
                  "id" => "date",
                  "size" => "27",
                  "readonly" => "readonly",
                  "class" => "none datepicker");
      $adate = $form -> Viven_AddInput($date);
      $form_fields['Followup Date:'] = $adate;
      
      
      $fb = array("name" => "fb",
                  "id" => "fb",
                  "class" => "none",
                  "options" => $activeStafflist);
      $fby = $form ->Viven_AddSelect($fb);
      $form_fields['Followup By:'] = $fby;
      
      
      $fr = array("name" => "fr",
                  "id" => "fr",
                  "class" => "none",
                  "options" => array("Enrolled" => array("value" => "Enrolled"),
                                     "Pending" => array("value" => "Pending"),
                                     "Not Interested" => array("value" => "Not Interested")
                    ));
      $fresult = $form ->Viven_AddSelect($fr);
      $form_fields['Followup Result:'] = $fresult;
      
      
      $remarks = array("type" => "input", 
                  "name" => "remarks",
                  "id" => "remarks",
                  "rows" => "3",          
                  "cols" => "26",
                  "class" => "none");
      $aremarks = $form -> Viven_AddText($remarks);
      $form_fields['Comments:'] = $aremarks;
      
      $flw = array("type" => "hidden", 
                   "name" => "flwup",
                   "value" => "1");
      $followup = $form -> Viven_AddInput($flw);
      $form_fields[''] = $followup;
      
      $outForm = $form -> Viven_ArrangeForm($form_fields,2,0,false);     
      $this -> view-> followupform = $outForm;
      
      $this -> view -> render('followup/index','business');
    
      
    }//End else
    
    
  }
  
  function getOpenFollowup(){
    require_once '/business/models/followup.php';
    $model = new Business_Model_Followup;
  }

}