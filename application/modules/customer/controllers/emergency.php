<?php

class Viven_Customer_Emergency extends Controller{

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


    $en = array("type" => "text", 
                "name" => "en",
                "id" => "en",
                "size" => "27",
                "class" => "none");
    $ename = $form -> Viven_AddInput($en);
    $form_fields['Contact Name:'] = $ename;


    $ep = array("type" => "text", 
                "name" => "ep",
                "id" => "ep",
                "size" => "27",
                "class" => "none");
    $ephone = $form -> Viven_AddInput($ep);      
    $form_fields['Contact Number:'] = $ephone;
    
    $eem = array("type" => "text", 
                "name" => "eem",
                "id" => "eem",
                "size" => "27",
                "class" => "none");
    $eemail = $form->Viven_AddInput($eem);
    $form_fields['Email Address:'] = $eemail;
    
    $eaddr = array("name" => "eaddr",
                    "id" => "eaddr",
                    "rows" => "3",
                    "cols" => "26",
                    "class" => "none");
    $eaddress = $form -> Viven_AddText($eaddr);      
    $form_fields['Contact Address:'] = $eaddress;

    $erem = array("name" => "eremarks",
                  "id" => "eremarks",
                  "rows" => "3",
                  "cols" => "26",
                  "class" => "none");
    $eremarks = $form -> Viven_AddText($erem);
    $form_fields['Contact Notes:'] = $eremarks;
    
    $emer = array("type" => "hidden",
                  "name" => "emer",
                  "value" => "1");
    $emergencyhidden = $form->Viven_AddInput($emer);
    $form_fields[''] = $emergencyhidden;
    
    $emergency = $form -> Viven_ArrangeForm($form_fields,2,0,false);
    return $emergency;
    
  }
  
  function newAction(){
    
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if($_POST['emer']){
        
        require_once MODULES . '/customer/models/customer.php';
        $model = new Viven_Customer_Model;
        echo $model -> addEmergency($_POST);
        return;
    
        } //End Form Processing
      
    } //End XMLHTTPREQUEST check
    else{
      
      $this -> view -> emergency = $this -> getForm();
      $this -> view -> render('emergency/index','customer');
      
    }
    
  } //End newAction()
  
}