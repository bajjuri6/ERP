<?php

class Viven_Business_Followup extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    if(isset($_POST['flw'])){
      var_dump($_POST);
    }else{
      
      $form = new Form();
      $form_fields = array();
      
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
      
      
      $fid = array("name" => "fid",
                  "id" => "fid",
                  "class" => "none",
                  "options" => array("one" => array("value" => "1"),
                                     "two" => array("value" => "2")
                                    ));
      $followid = $form ->Viven_AddSelect($fid);
      $form_fields['Followup ID:'] = $followid;
      
      
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
      $form_fields['Enquiry:'] = $question;
      
      
      $fr = array("name" => "fr",
                  "id" => "fr",
                  "class" => "none",
                  "options" => array("Enrolled" => array("value" => "1"),
                                     "Pending" => array("value" => "2"),
                                     "Not Interested" => array("value" => "3")
                    ));
      $fresult = $form ->Viven_AddSelect($fr);
      $form_fields['Followup Result:'] = $fresult;
      
      
      $fd = array("type" => "text", 
                  "name" => "fd",
                  "id" => "fd",
                  "size" => "27",
                  "readonly" => "readonly",
                  "class" => "none datepicker");
      $fdate = $form -> Viven_AddInput($fd);      
      $form_fields['Follow Up Date:'] = $fdate;
      
      
      $inc = array("type" => "text", 
                  "name" => "incharge",
                  "id" => "incharge",
                  "size" => "27",
                  "class" => "none");
      $incharge = $form -> Viven_AddInput($inc);
      $form_fields['Follow Up Incharge:'] = $incharge;
      
      
      $remarks = array("type" => "input", 
                  "name" => "remarks",
                  "id" => "remarks",
                  "rows" => "3",          
                  "cols" => "26",
                  "class" => "none");
      $aremarks = $form -> Viven_AddText($remarks);
      $form_fields['Comments:'] = $aremarks;
      
      $flw = array("type" => "hidden", 
                   "name" => "flw",
                   "value" => "1");
      $followup = $form -> Viven_AddInput($flw);
      $form_fields[''] = $followup;
      
      $outForm = '<form id="vf_flw" class="renderform" method="post" action="/business/followup/new">';
      $outForm .= $form -> Viven_ArrangeForm($form_fields,2,0,false);
      $outForm .= '</form>';
      
      $this -> view-> followupform = $outForm;
      
    }
    $this -> view -> render('followup/index','business');
  }
  
  function getOpenFollowup(){
    require '/business/models/followup.php';
    $model = new Business_Model_Followup;
  }

}