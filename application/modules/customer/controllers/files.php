<?php

class Viven_Customer_Feedback extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
    
      if(isset($_POST['cfdb'])){
        require MODULES.'/customer/models/customer.php';
        $model = new Viven_Customer_Model;
        $res = $model -> addFeedback($_POST);
        echo $res;
      }
      
      else{
      
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
                    "name" => "cn",
                    "id" => "cn",
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

        $outForm = '<form id="vf_cfdb" class="popform" method="post">';
        $outForm .= $form -> Viven_ArrangeForm($form_fields,2,1);
        $outForm .= '</form>';

        echo $outForm;

      } //End ELSE
    
      
    } // End XMLHTTPREQUEST check
    
  } //End newAction()

}