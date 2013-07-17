<?php

class Viven_Business_Enquiry extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    if(isset($_POST['enq'])){
      //process the enquiry on submit
    }else{
      
      $form = new Form();
      $form_fields = array();
      
      /**
       * Enquiry Form Elements
       */
      $date = array("type" => "input", 
                  "name" => "date",
                  "id" => "date",
                  "size" => "30",
                  "readonly" => "readonly",
                  "class" => "none");
      $adate = $form -> Viven_AddInput($date);
      $form_fields['Date:'] = $adate;
      
      
      $cn = array("type" => "text", 
                  "name" => "cn",
                  "id" => "cn",
                  "size" => "30",
                  "class" => "none");
      $cname = $form -> Viven_AddInput($cn);      
      $form_fields['Customer Name:'] = $cname;
      
      
      $pn = array("type" => "text", 
                  "name" => "pn",
                  "id" => "pn",
                  "size" => "30",
                  "class" => "none");
      $pnumber = $form -> Viven_AddInput($pn);      
      $form_fields['Phone Number:'] = $pnumber;
      
      
      $ques = array("type" => "text", 
                  "name" => "question",
                  "id" => "question",
                  "size" => "30",
                  "class" => "none");
      $question = $form -> Viven_AddInput($ques);
      $form_fields['Enquiry Question:'] = $question;
      
      
      $fd = array("type" => "text", 
                  "name" => "fd",
                  "id" => "fd",
                  "size" => "30",
                  "readonly" => "readonly",
                  "class" => "none");
      $fdate = $form -> Viven_AddInput($fd);      
      $form_fields['Follow Up Date:'] = $fdate;
      
      
      $inc = array("type" => "text", 
                  "name" => "incharge",
                  "id" => "incharge",
                  "size" => "30",
                  "class" => "none");
      $incharge = $form -> Viven_AddInput($inc);
      $form_fields['Follow Up Incharge:'] = $incharge;
      
      
      $status = array("name" => "level",
                  "id" => "level",
                  "class" => "none",
                  "options" => array("Select" => array("value" => "0"),
                                     "Present" => array("value" => "1"),
                                     "Partial" => array("value" => "2"),
                                     "Absent" => array("value" => "3")
                    ));
      $astatus = $form ->Viven_AddSelect($status);
      $form_fields['Attendance:'] = $astatus;
            
      
      $remarks = array("type" => "input", 
                  "name" => "date",
                  "id" => "date",
                  "size" => "30",
                  "class" => "none");
      $aremarks = $form -> Viven_AddInput($remarks);
      $form_fields['Comments:'] = $aremarks;
      
      $enq = array("type" => "hidden", 
                   "name" => "enq",
                   "value" => "1");
      $enquiry = $form -> Viven_AddInput($enq);
      $form_fields[''] = $enquiry;
      
      $outForm = '<form method="post" action="/staff/enquiry/new">';
      $outForm .= $form -> Viven_ArrangeForm($form_fields,2);
      $outForm .= '</form>';
      
      $this -> view-> enquiryform = $outForm;
      
    }
    $this -> view -> render('enquiry/index','business');
  }
}