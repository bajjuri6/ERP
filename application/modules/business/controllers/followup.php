<?php

class Viven_Business_Followup extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    if(isset($_POST['flw'])){
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
                  "class" => "none datepicker");
      $adate = $form -> Viven_AddInput($date);
      $form_fields['Date:'] = $adate;
      
      
      $fid = array("name" => "fid",
                  "id" => "fid",
                  "class" => "none",
                  "options" => array("-- Select --" => array("value" => "0")
                    ));
      $followid = $form ->Viven_AddSelect($fid);
      $form_fields['Followup ID:'] = $followid;
      
      
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
                  "rows" => "4",          
                  "cols" => "28",
                  "class" => "none");
      $question = $form ->Viven_AddText($ques);
      $form_fields['Enquiry:'] = $question;
      
      
      $fr = array("name" => "fr",
                  "id" => "fr",
                  "class" => "none",
                  "options" => array("-- Select --" => array("value" => "0"),
                                     "Enrolled" => array("value" => "1"),
                                     "Pending" => array("value" => "2"),
                                     "Not Interested" => array("value" => "3")
                    ));
      $fresult = $form ->Viven_AddSelect($fr);
      $form_fields['Followup Result:'] = $fresult;
      
      
      $fd = array("type" => "text", 
                  "name" => "fd",
                  "id" => "fd",
                  "size" => "30",
                  "readonly" => "readonly datepicker",
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
      
      
      $remarks = array("type" => "input", 
                  "name" => "remarks",
                  "id" => "remarks",
                  "rows" => "4",          
                  "cols" => "28",
                  "class" => "none");
      $aremarks = $form -> Viven_AddText($remarks);
      $form_fields['Comments:'] = $aremarks;
      
      $flw = array("type" => "hidden", 
                   "name" => "flw",
                   "value" => "1");
      $followup = $form -> Viven_AddInput($flw);
      $form_fields[''] = $followup;
      
      $outForm = '<form method="post" action="/business/followup/new">';
      $outForm .= $form -> Viven_ArrangeForm($form_fields,2);
      $outForm .= '</form>';
      
      $this -> view-> followupform = $outForm;
      
    }
    $this -> view -> render('followup/index','business');
  }

}