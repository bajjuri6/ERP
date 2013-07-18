<?php

class Viven_Business_Branch extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    if(isset($_POST['brnch'])){
      //process the enquiry on submit
    }else{
      
      $form = new Form();
      $form_fields = array();
      
      /**
       * Enquiry Form Elements
       */
      $branch = array("type" => "input", 
                  "name" => "branch",
                  "id" => "branch",
                  "size" => "27",
                  "class" => "none");
      $nbranch = $form -> Viven_AddInput($branch);
      $form_fields['Branch Name:'] = $nbranch;
      
      
      $ba = array("name" => "ba",
                  "id" => "ba",
                  "rows" => "3",          
                  "cols" => "25",
                  "class" => "none");
      $baddr = $form -> Viven_AddText($ba);      
      $form_fields['Branch Address:'] = $baddr;
      
      
      $bm = array("type" => "text", 
                  "name" => "bm",
                  "id" => "bm",
                  "size" => "27",
                  "class" => "none");
      $bmanager = $form -> Viven_AddInput($bm);      
      $form_fields['Branch Manager:'] = $bmanager;
      
      
      $bot = array("type" => "text", 
                  "name" => "bot",
                  "id" => "bot",
                  "size" => "27",
                  "class" => "none");
      $botime = $form -> Viven_AddInput($bot);
      $form_fields['Branch Opening Time:'] = $botime;
      
      
      $bct = array("type" => "text", 
                  "name" => "bct",
                  "id" => "bct",
                  "size" => "27",
                  "class" => "none");
      $bctime = $form -> Viven_AddInput($bct);
      $form_fields['Branch Closing Time:'] = $bctime;
      
      
      $remarks = array("type" => "input", 
                  "name" => "remarks",
                  "id" => "remarks",
                  "rows" => "2",          
                  "cols" => "25",
                  "class" => "none");
      $bremarks = $form -> Viven_AddText($remarks);
      $form_fields['Comments:'] = $bremarks;
      
      $brnch = array("type" => "hidden", 
                   "name" => "brnch",
                   "value" => "1");
      $newbranch = $form -> Viven_AddInput($brnch);
      $form_fields[''] = $newbranch;
      
      $outForm = '<form method="post" action="/business/branch/new">';
      $outForm .= $form -> Viven_ArrangeForm($form_fields,2);
      $outForm .= '</form>';
      
      echo $outForm;
      
    }
    //$this -> view -> render('branch/index','business');
  }
  
}