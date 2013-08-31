<?php

class Viven_Customer_Medical extends Controller{

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
                "class" => "none getud populateun");
    $cidentity = $form -> Viven_AddInput($cid);      
    $form_fields['Customer ID:'] = $cidentity;

   $md = array("type" => "text", 
                "name" => "md",
                "id" => "md",
                "size" => "27",
                "readonly" => "readonly",
                "class" => "none datepicker");
    $mdate = $form -> Viven_AddInput($md);      
    $form_fields['Date of Medical Check:'] = $mdate;

   $smoke = array("name" => "smoke",
                    "id" => "smoke",
                    "class" => "none",
                    "options" => array("Never" => array("value" => "1"),
                                       "Occasionally" => array("value" => "2"),
                                       "Regularly" => array("value" => "3")
                                      ));
    $smoking = $form ->Viven_AddSelect($smoke);
    $form_fields['Smoking:'] = $smoking;


    $alco = array("name" => "alcohol",
                    "id" => "alcohol",
                    "class" => "none",
                    "options" => array("Never" => array("value" => "1"),
                                       "Occasionally" => array("value" => "2"),
                                       "Regularly" => array("value" => "3")
                                      ));
    $alcohol = $form ->Viven_AddSelect($alco);
    $form_fields['Alcohol:'] = $alcohol;

    $med = array("type" => "hidden",
                    "name" => "medical",
                    "value" => "1");
    $medicalhidden = $form->Viven_AddInput($med);
    $form_fields[''] = $medicalhidden;
    
    $medical = $form -> Viven_ArrangeForm($form_fields,2,0,false);
    
    return $medical;
  }
  
  function newAction(){
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if($_POST['medical']){
        
        require_once MODULES . '/customer/models/customer.php';
        $model = new Viven_Customer_Model;
        echo $model -> addMedical($_POST);
        return;
    
        } //End Form Processing
      
    } //End XMLHTTPREQUEST check
    
    else{
      
      $this -> view -> medical = $this -> getForm();
      $this -> view -> render('medical/index','customer');
    
    } // End Else Statement
    
  } //End newAction()

} //End Class