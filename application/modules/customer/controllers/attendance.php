<?php

class Viven_Customer_Attendance extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    if($_POST['cattn']){
      return 0;
    }
    else{
      $form = new Form();
      $form_fields = array();
      
      /**
       * Attendance Form Elements
       */
      $cn = array("type" => "text", 
                  "name" => "cn",
                  "id" => "cn",
                  "size" => "30",
                  "class" => "none");
      $cname = $form -> Viven_AddInput($cn);
      
      $form_fields['Customer Name:'] = $cname;
      
      $date = array("type" => "input", 
                  "name" => "pdate",
                  "id" => "pdate",
                  "size" => "30",
                  "readonly" => "readonly",
                  "class" => "none datepicker");
      $adate = $form -> Viven_AddInput($date);
      $form_fields['Date:'] = $adate;
      
      
      $status = array("name" => "level",
                  "id" => "level",
                  "class" => "none",
                  "options" => array("Select" => array("value" => "0"),
                                     "Present" => array("value" => "1"),
                                     "Absent" => array("value" => "2")
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
      
      $attn = array("type" => "hidden", 
                   "name" => "cattn",
                   "value" => "1");
      $cattn = $form -> Viven_AddInput($attn);
      $form_fields[''] = $cattn;
      
      $outForm = '<form method="post" action="/customer/attendance/new">';
      $outForm .= $form -> Viven_ArrangeForm($form_fields,2);
      $outForm .= '</form>';
      
      echo $outForm;
      
    }
  } 
}