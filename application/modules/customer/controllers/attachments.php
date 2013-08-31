<?php

class Viven_Customer_Attachments extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  
  public function getForm(){
    
    $form = new Form();
    $form_fields = array();
    
    $cid = array("type" => "text", 
                "name" => "cid",
                "id" => "cid",
                "size" => "27",
                "class" => "none populateun");
    $cidentity = $form -> Viven_AddInput($cid);      
    $form_fields['Customer ID:'] = $cidentity;


    $fl = array("type" => "file", 
                "name" => "doc",
                "id" => "doc",
                "size" => "27",
                "class" => "none");
    $file = $form->Viven_AddInput($fl);
    $form_fields['Attach:'] = $file;
    
    $ac = array("name" => "ac",
                    "id" => "ac",
                    "rows" => "2",
                    "cols" => "26",
                    "class" => "none");
    $acomments = $form -> Viven_AddText($ac);      
    $form_fields['Comments:'] = $acomments;

    
    $attach = array("type" => "hidden",
                  "name" => "attach",
                  "value" => "1");
    $attachmenthidden = $form->Viven_AddInput($attach);
    $form_fields[''] = $attachmenthidden;

    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      $attachments = $form -> Viven_ArrangeForm($form_fields,2,1,false);
    }
    else{
      $attachments = $form -> Viven_ArrangeForm($form_fields,2,0,false);
    }
    
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
        
        $outForm = '<form id="vf_cea" class="popform" method="post">';
        $outForm .= $this -> getForm();
        $outForm .= '</form>';

        echo $outForm;

      } // End Else
      
    } // End XMLHTTPREQUEST check
    
  } // End newAction()
  
}