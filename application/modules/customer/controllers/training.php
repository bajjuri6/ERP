<?php

class Viven_Customer_Training extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    if($_POST['cattn']){
      return 0;
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
      
      
      $status = array("name" => "level",
                  "id" => "level",
                  "class" => "none",
                  "options" => array("Trainer1" => array("value" => "1"),
                                     "Trainer2" => array("value" => "2")
                    ));
      $astatus = $form ->Viven_AddSelect($status);
      $form_fields['Trainer:'] = $astatus;
      
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
      
      $attn = array("type" => "hidden", 
                   "name" => "cattn",
                   "value" => "1");
      $cattn = $form -> Viven_AddInput($attn);
      $form_fields[''] = $cattn;
      
      $outForm .= $form -> Viven_ArrangeForm($form_fields,2);
      $this -> view -> personaltraining = $outForm;
      
    } //End Else
      $this -> view -> render('training/index','customer');
  } //End newAction()
}