<?php

class Viven_Customer_Physical extends Controller{

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

   $pd = array("type" => "text", 
                "name" => "pd",
                "id" => "pd",
                "size" => "27",
                "readonly" => "readonly",
                "class" => "none datepicker");
    $phydate = $form -> Viven_AddInput($pd);      
    $form_fields['Date of Physical:'] = $phydate;

   $wt = array("type" => "text", 
                "name" => "wt",
                "id" => "wt",
                "size" => "27",
                "class" => "none");
    $weight = $form -> Viven_AddInput($wt);      
    $form_fields['Weight:'] = $weight;


    $ht = array("type" => "text", 
                "name" => "ht",
                "id" => "ht",
                "size" => "27",
                "class" => "none");
    $height = $form -> Viven_AddInput($ht);
    $form_fields['Height:'] = $height;


    $chst = array("type" => "text", 
                "name" => "chst",
                "id" => "chst",
                "size" => "27",
                "class" => "none");
    $chest = $form -> Viven_AddInput($chst);
    $form_fields['Chest:'] = $chest;


    $sldr = array("type" => "text", 
                "name" => "sldr",
                "id" => "sldr",
                "size" => "27",
                "class" => "none");
    $shoulder = $form -> Viven_AddInput($sldr);      
    $form_fields['Shoulder:'] = $shoulder;


    $wst = array("type" => "text", 
                "name" => "wst",
                "id" => "wst",
                "size" => "27",
                "class" => "none");
    $waist = $form -> Viven_AddInput($wst);      
    $form_fields['Waist:'] = $waist;


    $bcp = array("type" => "text", 
                "name" => "bcp",
                "id" => "bcp",
                "size" => "27",
                "class" => "none");
    $bicep = $form -> Viven_AddInput($bcp);      
    $form_fields['Bicep:'] = $bicep;


    $clf = array("type" => "text", 
                "name" => "clf",
                "id" => "clf",
                "size" => "27",
                "class" => "none");
    $calf = $form -> Viven_AddInput($clf);
    $form_fields['Calf:'] = $calf;


    $premarks = array("type" => "text", 
                "name" => "premarks",
                "id" => "premarks",
                "rows" => "3",
                "cols" => "26",
                "class" => "none");
    $phyremarks = $form -> Viven_AddText($premarks);      
    $form_fields['Comments on Physical:'] = $phyremarks;


    $phy = array("type" => "hidden",
                    "name" => "physical",
                    "value" => "1");
    $phyhidden = $form->Viven_AddInput($phy);
    $form_fields[''] = $phyhidden;

    //Get the First Sub Form of the Enrollment
    $physical = $form -> Viven_ArrangeForm($form_fields,2,0,false);
    return $physical;
  }
  
  
  /**
   * 
   */
  function newAction(){
    if(isset($_POST['physical'])){
        
      require_once MODULES . '/customer/models/customer.php';
      $model = new Viven_Customer_Model;
      echo $model -> addPhysical($_POST);

    } //End Form Processing
    else{
      
      $this -> view -> physical = $this -> getForm();
      $this -> view -> render('physical/index','customer');
      
    }
    
  }

}