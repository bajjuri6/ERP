<?php

class Viven_Staff_Feedback extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if(isset($_POST['sfdb'])){
        require MODULES.'/staff/models/staff.php';
        $model = new Viven_Staff_Model;
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


        $sn = array("type" => "text", 
                    "name" => "sn",
                    "id" => "sn",
                    "size" => "27",
                    "class" => "none");
        $sname = $form -> Viven_AddInput($sn);
        $form_fields['Staff Name:'] = $sname;


        $remarks = array("type" => "input", 
                    "name" => "remarks",
                    "id" => "remarks",
                    "rows" => "6",          
                    "cols" => "28",
                    "class" => "none");
        $aremarks = $form ->Viven_AddText($remarks);
        $form_fields['Feedback:'] = $aremarks;

        $sfdb = array("type" => "hidden", 
                     "name" => "sfdb",
                     "value" => "1");
        $sfeedback = $form -> Viven_AddInput($sfdb);
        $form_fields[''] = $sfeedback;

        $outForm = '<form id="vf_sfdb" class="popform" method="post" action="/staff/feedback/new">';
        $outForm .= $form -> Viven_ArrangeForm($form_fields,2,1);
        $outForm .= '</form>';

        echo $outForm;

      } //End ELSE
      
    } //End XMLHTTPREQUEST check
    
  } //End newAction()
}