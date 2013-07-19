<?php

class Viven_Business_Department extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    if(isset($_POST['dept'])){
      //process the enquiry on submit
      require MODULES . '/business/models/business.php';
      
      $model = new Viven_Model_Department;
      return $model;
      
    }else{
      
      $form = new Form();
      $form_fields = array();
      
      /**
       * Enquiry Form Elements
       */
      $dn = array("type" => "text",
                  "name" => "dn",
                  "id" => "dn",
                  "size" => "27",
                  "class" => "none");
      $dname = $form -> Viven_AddInput($dn);
      $form_fields['Department Name:'] = $dname;
      
      
      $branch = array("type" => "input", 
                  "name" => "branch",
                  "id" => "branch",
                  "size" => "27",
                  "class" => "none");
      $nbranch = $form -> Viven_AddInput($branch);
      $form_fields['Branch Name:'] = $nbranch;
      
      
      $dm = array("type" => "text", 
                  "name" => "dm",
                  "id" => "dm",
                  "size" => "27",
                  "class" => "none");
      $dmanager = $form -> Viven_AddInput($dm);      
      $form_fields['Department Manager:'] = $dmanager;
      
      
      $remarks = array("type" => "input", 
                  "name" => "remarks",
                  "id" => "remarks",
                  "rows" => "2",          
                  "cols" => "25",
                  "class" => "none");
      $bremarks = $form -> Viven_AddText($remarks);
      $form_fields['Comments:'] = $bremarks;
      
      $dept = array("type" => "hidden", 
                   "name" => "dept",
                   "value" => "1");
      $newdept = $form -> Viven_AddInput($dept);
      $form_fields[''] = $newdept;
      
      $outForm = '<form method="post" action="/business/department/new">';
      $outForm .= $form -> Viven_ArrangeForm($form_fields, 2, 1, false);
      $outForm .= '</form>';
      
      echo $outForm;
      
    } //End else
    //$this -> view -> render('branch/index','business');
  } //End newAction()
  
}