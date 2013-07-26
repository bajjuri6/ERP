<?php

class Viven_Customer_Attendance extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
   
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if($_POST['cattn']){
        
        require MODULES.'/customer/models/customer.php';
        $model = new Viven_Customer_Model;
        $res = $model -> addAttendance($_POST);
        echo $res;
        
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
                    "size" => "27",
                    "class" => "none");
        $cname = $form -> Viven_AddInput($cn);

        $form_fields['Customer Name:'] = $cname;

        $date = array("type" => "input", 
                    "name" => "date",
                    "id" => "date",
                    "size" => "27",
                    "readonly" => "readonly",
                    "class" => "none datepicker");
        $adate = $form -> Viven_AddInput($date);
        $form_fields['Date:'] = $adate;


        $status = array("name" => "status",
                    "id" => "status",
                    "class" => "none",
                    "options" => array("Present" => array("value" => "1"),
                                       "Absent" => array("value" => "2")
                      ));
        $astatus = $form ->Viven_AddSelect($status);
        $form_fields['Attendance:'] = $astatus;


        $remarks = array("type" => "input", 
                    "name" => "remarks",
                    "id" => "remarks",
                    "rows" => "3",
                    "cols" => "26",
                    "class" => "none");
        $aremarks = $form ->Viven_AddText($remarks);
        $form_fields['Comments:'] = $aremarks;

        $attn = array("type" => "hidden", 
                     "name" => "cattn",
                     "value" => "1");
        $cattn = $form -> Viven_AddInput($attn);
        $form_fields[''] = $cattn;

        $outForm = '<form id="vf_cattn" class="popform" method="post">';
        $outForm .= $form -> Viven_ArrangeForm($form_fields,2,1);
        $outForm .= '</form>';

        echo $outForm;

      } // End Else
      
    } // End XMLHTTPREQUEST check
    
  } // End newAction()
  
}