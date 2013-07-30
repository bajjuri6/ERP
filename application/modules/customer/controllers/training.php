<?php

class Viven_Customer_Training extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    
    if (isset($_POST['train'])) {
      foreach ($_POST as $option) {
        if (!$option) {
          $error = true;
          break;
        }
      }
      var_dump($_POST);
      if (isset($error)) {
        $this->view->msg = 'All fields are required!';
      } else {
        require MODULES . '/customer/models/training.php';
        $model = new Viven_Model_Training();
        $res = $model->addCustomerTraining($_POST);

        if ($res) {
          $this->view->msg = 'Subscription added successfully!!';
        } else {
          $this->view->msg = 'Error in processing. Please try after sometime.';
        }
      }
    }  
    $form = new Form();
    $form_fields = array();


    $date = array("type" => "text", 
                "name" => "subdate",
                "id" => "subdate",
                "size" => "27",
                "readonly" => "readonly",
                "class" => "none datepicker");
    $adate = $form -> Viven_AddInput($date);
    $form_fields['Date:'] = $adate;


    $dataController = new Viven_Api_Generic;
    $trainerlist = $dataController -> getActiveStaffList("t");
    $customerlist = $dataController -> getActiveCutomerList();
    //$serviceslist = $dataController -> getActiveCutomerList();


    $cust = array("name" => "customer",
                "id" => "customer",
                "class" => "none",
                "options" => $customerlist);        
    $customer = $form ->Viven_AddSelect($cust);
    $form_fields['Customer:'] = $customer;


    $service = array("name" => "srvce",
                "id" => "srvce",
                "class" => "none",
                "options" => array("Service one" => array("value" => "one")));        
    $subscbservice = $form ->Viven_AddSelect($service);
    $form_fields['Service:'] = $subscbservice;
    
    $sdate = array("type" => "text", 
                "name" => "sdate",
                "id" => "sdate",
                "size" => "27",
                "readonly" => "readonly",
                "class" => "none datepicker");
    $asdate = $form -> Viven_AddInput($sdate);
    $form_fields['Subscription Starting Date:'] = $asdate;
    
    $edate = array("type" => "text", 
                "name" => "edate",
                "id" => "edate",
                "size" => "27",
                "readonly" => "readonly",
                "class" => "none datepicker");
    $aedate = $form -> Viven_AddInput($edate);
    $form_fields['Subscription Ending Date:'] = $aedate;
    
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
    
    $remarks = array("type" => "text", 
                "name" => "date",
                "id" => "date",
                "rows" => "3",
                "cols" => "27",
                "class" => "none");
    $aremarks = $form ->Viven_AddText($remarks);
    $form_fields['Comments:'] = $aremarks;

    $train = array("type" => "hidden", 
                 "name" => "train",
                 "value" => "1");
    $traininghidden = $form -> Viven_AddInput($train);
    $form_fields[''] = $traininghidden;

    $outForm .= $form -> Viven_ArrangeForm($form_fields,2,0,false);
    $this -> view -> personaltraining = $outForm;
      
    $this -> view -> render('training/index','customer');
  } //End newAction()
}