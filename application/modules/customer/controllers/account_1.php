<?php

class Viven_Customer_Account extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  
  function forgotAction(){
    if($_POST['frgt']){
      return 0;
    }
    else{
      $form = new Form();
      $form_fields = array();
      
      /**
       * Forgot ID Form Elements
       */
      $pn = array("type" => "text", 
                  "name" => "pn",
                  "id" => "pn",
                  "size" => "27",
                  "class" => "none");
      $pnum = $form -> Viven_AddInput($pn);      
      $form_fields['Phone Number:'] = $pnum;
      
      
      $remarks = array("type" => "input", 
                  "name" => "remarks",
                  "id" => "remarks",
                  "rows" => "3",
                  "cols" => "26",
                  "class" => "none");
      $aremarks = $form ->Viven_AddText($remarks);
      $form_fields['Comments:'] = $aremarks;
      
      
      $frgt = array("type" => "hidden", 
                   "name" => "frgt",
                   "value" => "1");
      $cfrgt = $form -> Viven_AddInput($frgt);
      $form_fields[''] = $cfrgt;
      
      $outForm = '<form method="post" action="/customer/account/forgot">';
      $outForm .= $form -> Viven_ArrangeForm($form_fields,1,1);
      $outForm .= '</form>';
      
      echo $outForm;
      
    } // End Else
  } // End forgotAction()
}