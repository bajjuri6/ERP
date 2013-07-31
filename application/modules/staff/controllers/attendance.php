<?php

class Viven_Staff_Attendance extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  
  function newAction(){
    
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if($_POST['sattn']){
        
        require_once MODULES.'/staff/models/staff.php';
        $model = new Viven_Staff_Model();
        $res = $model -> addAttendance($_POST);
        echo $res;
        
      }
      
      else{
        $form = new Form();
        $form_fields = array();

        /**
         * Attendance Form Elements
         */
        $un = array("type" => "text", 
                    "name" => "un",
                    "id" => "un",
                    "size" => "27",
                    "class" => "none");
        $uname = $form -> Viven_AddInput($un);
        $form_fields['Staff Name:'] = $uname;
        

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
                                       "Partial" => array("value" => "2"),
                                       "Absent" => array("value" => "3")
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
                     "name" => "sattn",
                     "value" => "1");
        $sattn = $form -> Viven_AddInput($attn);
        $form_fields[''] = $sattn;

        $outForm = '<form id="vf_sattn" class="popform" method="post">';
        $outForm .= $form -> Viven_ArrangeForm($form_fields,2,1);
        $outForm .= '</form>';

        echo $outForm;
      } // End ELSE
      
    } // End XMLHTTPREQUEST check
    
  } // End newAction()

}