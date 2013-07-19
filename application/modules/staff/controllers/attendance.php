<?php

class Viven_Staff_Attendance extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  
  function newAction(){
    if($_POST['sattn']){
      return 0;
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
      
      $form_fields['User Name:'] = $uname;
      
      $date = array("type" => "input", 
                  "name" => "date",
                  "id" => "date",
                  "size" => "27",
                  "readonly" => "readonly",
                  "class" => "none");
      $adate = $form -> Viven_AddInput($date);
      $form_fields['Date:'] = $adate;
      
      
      $status = array("name" => "level",
                  "id" => "level",
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
      
      $outForm = '<form method="post" action="/staff/attendance/new">';
      $outForm .= $form -> Viven_ArrangeForm($form_fields,2,1);
      $outForm .= '</form>';
      
      echo $outForm;
      //$this -> view -> attendanceForm = $outForm;
    }
      //$this -> view -> render('attendance/index','staff');
  }  

}