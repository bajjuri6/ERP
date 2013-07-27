<?php

class Viven_Customer_Training extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    
    if($_POST['train']){
      var_dump($_POST);
    }
    else{
      $form = new Form();
      $form_fields = array();
      
      
      $date = array("type" => "text", 
                  "name" => "pdate",
                  "id" => "pdate",
                  "size" => "27",
                  "readonly" => "readonly",
                  "class" => "none datepicker");
      $adate = $form -> Viven_AddInput($date);
      $form_fields['Date:'] = $adate;
      
      
      $dataController = new Viven_Api_Generic;
      $trainerlist = $dataController -> getActiveStaffList("trainer");
      $customerlist = $dataController -> getActiveCutomerList();
      

      $cust = array("name" => "customer",
                  "id" => "customer",
                  "class" => "none",
                  "options" => $customerlist);        
      $customer = $form ->Viven_AddSelect($cust);
      $form_fields['Customer:'] = $customer;
      
      
      $trainer = array("name" => "trainer",
                  "id" => "trainer",
                  "class" => "none",
                  "options" => $trainerlist);        
      $ptrainer = $form ->Viven_AddSelect($trainer);
      $form_fields['Trainer:'] = $ptrainer;
      
      
      $remarks = array("type" => "text", 
                  "name" => "date",
                  "id" => "date",
                  "rows" => "3",
                  "cols" => "27",
                  "class" => "none");
      $aremarks = $form ->Viven_AddText($remarks);
      $form_fields['Comments:'] = $aremarks;
      
      $cos = array("type" => "text", 
                  "name" => "cost",
                  "id" => "cost",
                  "size" => "27",
                  "class" => "none");
      $cost = $form -> Viven_AddInput($cos);
      $form_fields['Cost:'] = $cost;
      
      $pay = array("type" => "text", 
                  "name" => "paid",
                  "id" => "paid",
                  "size" => "27",
                  "class" => "none");
      $paid = $form -> Viven_AddInput($pay);
      $form_fields['Paid:'] = $paid;
      
      $bal = array("type" => "text", 
                  "name" => "cost",
                  "id" => "cost",
                  "size" => "27",
                  "class" => "none");
      $balance = $form -> Viven_AddInput($bal);
      $form_fields['Balance:'] = $balance;
      
      $train = array("type" => "hidden", 
                   "name" => "train",
                   "value" => "1");
      $traininghidden = $form -> Viven_AddInput($train);
      $form_fields[''] = $traininghidden;
      
      $outForm .= $form -> Viven_ArrangeForm($form_fields,2,0,false);
      $this -> view -> personaltraining = $outForm;
      
    } //End Else
      $this -> view -> render('training/index','customer');
  } //End newAction()
}