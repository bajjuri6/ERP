<?php

class Viven_Finance_Revenue extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    if(isset($_POST['pmnt'])){
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
      $pdate = $form -> Viven_AddInput($date);
      $form_fields['Payment Date:'] = $pdate;
      
      
      $name = array("type" => "text", 
                  "name" => "name",
                  "id" => "name",
                  "size" => "27",
                  "class" => "none");
      $cname = $form -> Viven_AddInput($name);
      $form_fields['Customer Name:'] = $cname;
      
      
      $mode = array("name" => "level",
                  "id" => "level",
                  "class" => "none",
                  "options" => array("Credit/Debit Card" => array("value" => "1"),
                                     "Cheque" => array("value" => "2"),
                                     "Cash" => array("value" => "3")
                                    ));
      $pmode = $form ->Viven_AddSelect($mode);
      $form_fields['Payment Mode:'] = $pmode;
      
      
      $details = array("type" => "text", 
                  "name" => "details",
                  "id" => "details",
                  "rows" => "3",
                  "cols" => "27",
                  "class" => "none");
      $pdetails = $form ->Viven_AddText($details);
      $form_fields['Payment Details:'] = $pdetails;
      
      $due = array("type" => "text", 
                  "name" => "due",
                  "id" => "due",
                  "size" => "27",
                  "class" => "none");
      $pdue = $form -> Viven_AddInput($due);
      $form_fields['Payment Due:'] = $pdue;
      
      $paid = array("type" => "text", 
                  "name" => "paid",
                  "id" => "paid",
                  "size" => "27",
                  "class" => "none");
      $apaid = $form -> Viven_AddInput($paid);
      $form_fields['Amount Paid:'] = $apaid;
      
      
      $bal = array("type" => "text", 
                  "name" => "bal",
                  "id" => "bal",
                  "size" => "27",
                  "class" => "none");
      $balance = $form -> Viven_AddInput($bal);
      $form_fields['Balance:'] = $balance;
      
      
      $remarks = array("type" => "text", 
                  "name" => "date",
                  "id" => "date",
                  "rows" => "3",
                  "cols" => "27",
                  "class" => "none");
      $aremarks = $form ->Viven_AddText($remarks);
      $form_fields['Comments:'] = $aremarks;
      
      $pmnt = array("type" => "hidden", 
                   "name" => "pmnt",
                   "value" => "1");
      $ipmnt = $form -> Viven_AddInput($pmnt);
      $form_fields[''] = $ipmnt;
      
      $outForm .= $form -> Viven_ArrangeForm($form_fields,2);
      $this -> view -> newpayment = $outForm;
      
    } //End Else
      $this -> view -> render('revenue/index','finance');
  } //End newAction()

}