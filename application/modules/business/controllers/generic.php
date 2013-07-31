<?php

class Viven_Business_Generic extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  
  function getDesignationsAction(){
    
    require_once MODULES . 'business/models/generic.php';
    $model = new Viven_Model_Generic;
    
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
     echo $model -> getDesignationList();
    }
    else{
      return $model -> getDesignationList();
    } //End ELSE for XMLHTTPREQUEST check
    
    
  } //End GetDesignationsAction()  
  
  
  function expenseTypeAction(){
    
    require_once MODULES . '/business/models/generic.php';
    $model = new Viven_Generic_Model;
    
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if(isset($_POST['exptype'])){
        echo $model -> addExpenseType($_POST);
      }
      else{
        
        $form = new Form();
        $form_fields = array();

        /**
         * Enquiry Form Elements
         */
        $etn = array("type" => "text",
                    "name" => "etn",
                    "id" => "etn",
                    "size" => "27",
                    "class" => "none");
        $etname = $form -> Viven_AddInput($etn);
        $form_fields['Expense Type Name:'] = $etname;


        $remarks = array("type" => "input", 
                    "name" => "remarks",
                    "id" => "remarks",
                    "rows" => "3",          
                    "cols" => "26",
                    "class" => "none");
        $etremarks = $form -> Viven_AddText($remarks);
        $form_fields['Comments:'] = $etremarks;

        $et = array("type" => "hidden", 
                     "name" => "exptype",
                     "value" => "1");
        $newet = $form -> Viven_AddInput($et);
        $form_fields[''] = $newet;

        $outForm = '<form id="vf_exptype" class="popform" method="post">';
        $outForm .= $form -> Viven_ArrangeForm($form_fields, 2, 1, false);
        $outForm .= '</form>';

        echo $outForm;
        
      } //End ELSE
      
    } //End XMLHTTPREQUEST check
    
  } //End GetDesignationsAction()
  
  
  function getExpenseTypesAction(){
    
    require_once MODULES . '/business/models/generic.php';
    $model = new Viven_Generic_Model;
    
    return $model -> getExpenseTypes();    
    
  }
  
  
}