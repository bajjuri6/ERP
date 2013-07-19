<?php

class Viven_Customer_Feedback extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    if(isset($_POST['sfdb'])){
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
                  "size" => "27",
                  "readonly" => "readonly",
                  "class" => "none datepicker");
      $adate = $form -> Viven_AddInput($date);
      $form_fields['Date:'] = $adate;
      
      
      $cn = array("type" => "text", 
                  "name" => "sn",
                  "id" => "sn",
                  "size" => "27",
                  "class" => "none");
      $cname = $form -> Viven_AddInput($cn);
      $form_fields['Customer Name:'] = $cname;
      
            
      $remarks = array("type" => "input", 
                  "name" => "remarks",
                  "id" => "remarks",
                  "rows" => "6",          
                  "cols" => "28",
                  "class" => "none");
      $aremarks = $form ->Viven_AddText($remarks);
      $form_fields['Feedback:'] = $aremarks;
      
      $cfdb = array("type" => "hidden", 
                   "name" => "cfdb",
                   "value" => "1");
      $cfeedback = $form -> Viven_AddInput($cfdb);
      $form_fields[''] = $cfeedback;
      
      $outForm = '<form method="post" action="/customer/feedback/new">';
      $outForm .= $form -> Viven_ArrangeForm($form_fields,2,1);
      $outForm .= '</form>';
      
      echo $outForm;
      
    }
  }

}