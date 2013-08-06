<?php

class Viven_Business_Enquiry extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if(isset($_POST['enq'])){
        foreach($_POST as $option){
          if($option == null){
            $error = true;
            break;
          }
        }

        if(isset($error)){
          echo 'All fields are required!';
        }
        else{
          require_once MODULES . '/business/models/enquiry.php';
          $model = new Viven_Model_Enquiry();
          $res = $model -> addEnquiry($_POST);

          echo $res;
        }
        
      } //End POST functionality
      
    }else{
    
      $form = new Form();
      $form_fields = array();

      /**
       * All Data Lists required to render this form
       */

      $dataController = new Viven_Api_Generic;
      $activeStafflist = $dataController->getActiveStaffAction('all');
      //$designationList = $dataController ->getActiveDesignationList('all');
      //$shiftsList = $dataController -> getShiftsList('all');

      //$activeStafflist

      /**
       * Enquiry Form Elements
       */
      $date = array("type" => "input", 
                  "name" => "date",
                  "id" => "date",
                  "size" => "27",
                  "readonly" => "readonly",
                  "class" => "none datepicker");
      $adate = $form -> Viven_AddInput($date);
      $form_fields['Date:'] = $adate;


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


      $em = array("type" => "text", 
                  "name" => "em",
                  "id" => "em",
                  "size" => "27",
                  "class" => "none");
      $email = $form -> Viven_AddInput($em);
      $form_fields['Email Address:'] = $email;

      $incType = array("type" => "text", 
                  "name" => "enqtype",
                  "id" => "enqtype",
                  "size" => "27",
                  "class" => "none");
      $type = $form -> Viven_AddInput($incType);
      $form_fields['Enquiry Type:'] = $type;

      $ques = array("type" => "text", 
                  "name" => "question",
                  "id" => "question",
                  "rows" => "3",          
                  "cols" => "28",
                  "class" => "none");
      $question = $form -> Viven_AddText($ques);
      $form_fields['Enquiry comments:'] = $question;


      $fd = array("type" => "text", 
                  "name" => "fd",
                  "id" => "fd",
                  "size" => "27",
                  "readonly" => "readonly",
                  "class" => "none datepicker");
      $fdate = $form -> Viven_AddInput($fd);      
      $form_fields['Follow Up Date:'] = $fdate;


      $inc = array("name" => "sn",
          "id" => "sn",
          "class" => "none",
          "options" => $activeStafflist);
      $incharge = $form->Viven_AddSelect($inc);
      $form_fields['Follow Up Incharge:'] = $incharge;


      $remarks = array("type" => "input", 
                  "name" => "remarks",
                  "id" => "remarks",
                  "rows" => "3",          
                  "cols" => "28",
                  "class" => "none");
      $aremarks = $form ->Viven_AddText($remarks);
      $form_fields['Followup Comments:'] = $aremarks;


      $enq = array("type" => "hidden", 
                   "name" => "enq",
                   "value" => "1");
      $enquiry = $form -> Viven_AddInput($enq);
      $form_fields[''] = $enquiry;

      $outForm = $form -> Viven_ArrangeForm($form_fields,2,0,false);

      $this -> view-> enquiryform = $outForm;

      $this -> view -> render('enquiry/index','business');
      
    } //End ELSE
  
  } //End newAction()
  
} //End Class