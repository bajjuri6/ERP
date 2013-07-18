<?php

class Viven_Business_Service extends Controller{

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
      $sd = array("type" => "input", 
                  "name" => "sd",
                  "id" => "sd",
                  "size" => "27",
                  "readonly" => "readonly",
                  "class" => "none datepicker");
      $sdate = $form -> Viven_AddInput($sd);
      $form_fields['Start Date:'] = $sdate;
      
      $ed = array("type" => "input", 
                  "name" => "ed",
                  "id" => "ed",
                  "size" => "27",
                  "readonly" => "readonly",
                  "class" => "none datepicker");
      $edate = $form -> Viven_AddInput($ed);
      $form_fields['End Date:'] = $edate;
      
      
      $sn = array("type" => "text", 
                  "name" => "sn",
                  "id" => "sn",
                  "size" => "30",
                  "class" => "none");
      $sname = $form -> Viven_AddInput($sn);
      $form_fields['Srvice Name:'] = $sname;
      
      
      $br = array("type" => "text", 
                  "name" => "br",
                  "id" => "br",
                  "size" => "30",
                  "class" => "none");
      $brnch = $form -> Viven_AddInput($br);
      $form_fields['Branch Name:'] = $brnch;
      
            
      $remarks = array("type" => "input", 
                  "name" => "remarks",
                  "id" => "remarks",
                  "rows" => "6",          
                  "cols" => "28",
                  "class" => "none");
      $aremarks = $form ->Viven_AddText($remarks);
      $form_fields['Feedback:'] = $aremarks;
      
      $ns = array("type" => "hidden", 
                   "name" => "ns",
                   "value" => "1");
      $nservice = $form -> Viven_AddInput($ns);
      $form_fields[''] = $nservice;
      
      $outForm = '<form method="post" action="/business/service/new">';
      $outForm .= $form -> Viven_ArrangeForm($form_fields,2);
      $outForm .= '</form>';
      
      echo $outForm;
      
    } //End Else
    
  }  //End newAction()
  
} //End Class