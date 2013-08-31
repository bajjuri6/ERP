<?php

class Viven_Customer_Attendance extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  
  public function getForm(){
    
    $form = new Form();
    $form_fields = array();

    /**
     * Attendance Form Elements
     */
    $cid = array("type" => "text", 
                "name" => "cid",
                "id" => "cid",
                "size" => "27",
                "class" => "none getud");
    $cidentity = $form -> Viven_AddInput($cid);

    $form_fields['Customer ID:'] = $cidentity;

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

    $attachments .= $form -> Viven_ArrangeForm($form_fields,2,1);
    return $attachments;
    
    

  }
  
  function newAction(){
   
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if(isset($_POST['cattn'])){
        
        require_once MODULES.'/customer/models/customer.php';
        $model = new Viven_Customer_Model;
        $res = $model -> addAttendance($_POST);
        echo $res;
        
      }
      else{
        
        $outForm = '<form id="vf_cattn" class="popform" method="post">';
        $outForm .= $this -> getForm();
        $outForm .= '</form>';
        echo $outForm;

      } // End Else
      
    } // End XMLHTTPREQUEST check
    
  } // End newAction()
  
}