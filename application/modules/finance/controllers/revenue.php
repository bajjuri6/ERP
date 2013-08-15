<?php

class Viven_Finance_Revenue extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if(isset($_POST['pmnt'])){
        require_once MODULES . '/finance/models/revenue.php';
        $revenueModel = new Viven_Revenue_Model;

        echo $revenueModel -> addRevenue($_POST);
      }
    }
    else{
      
      require_once MODULES . '/api/controllers/generic.php';
      $genericController = new Viven_Api_Generic;
      $modelist = $genericController -> activeModesAction();
      $form = new Form();
      $form_fields = array();


      $name = array("type" => "text", 
                  "name" => "cn",
                  "id" => "cn",
                  "size" => "27",
                  "class" => "none");
      $cname = $form -> Viven_AddInput($name);
      $form_fields['Customer ID:'] = $cname;


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


      $date = array("type" => "text", 
                  "name" => "pdate",
                  "id" => "pdate",
                  "size" => "27",
                  "readonly" => "readonly",
                  "class" => "none datepicker");
      $pdate = $form -> Viven_AddInput($date);
      $form_fields['Payment Date:'] = $pdate;


      $tn = array("type" => "text", 
                  "name" => "tn",
                  "id" => "tn",
                  "size" => "27",
                  "class" => "none");
      $tnumber = $form -> Viven_AddInput($tn);
      $form_fields['Transaction Number:'] = $tnumber;


      $mode = array("name" => "mode",
                  "id" => "mode",
                  "class" => "none",
                  "options" => $modelist);
      $pmode = $form ->Viven_AddSelect($mode);
      $form_fields['Payment Mode:'] = $pmode;


      $details = array("type" => "text", 
                  "name" => "det",
                  "id" => "det",
                  "rows" => "2",
                  "cols" => "27",
                  "class" => "none");
      $pdetails = $form ->Viven_AddText($details);
      $form_fields['Payment Details:'] = $pdetails;


      $remarks = array("type" => "text", 
                  "name" => "remarks",
                  "id" => "remarks",
                  "rows" => "2",
                  "cols" => "27",
                  "class" => "none");
      $aremarks = $form ->Viven_AddText($remarks);
      $form_fields['Comments:'] = $aremarks;

      $pmnt = array("type" => "hidden", 
                   "name" => "pmnt",
                   "value" => "1");
      $ipmnt = $form -> Viven_AddInput($pmnt);
      $form_fields[''] = $ipmnt;

      $outForm .= $form -> Viven_ArrangeForm($form_fields,2,0,false);
      $this -> view -> newpayment = $outForm;
      $this -> view -> render('revenue/index','finance');
    } //End Else
      
  } //End newAction()
  
  
  /**
   * Get Revenue Information
   * @param type $from date
   * @param type $to date
   * @param type $branch branch name
   * @return type
   */
  function getRevenueAction($from = -1, $to = -1, $branch = 'all'){
    
    require_once MODULES . '/finance/models/revenue.php';
    $revenueModel = new Viven_Revenue_Model;
    
    if($from == -1 || $to == -1) {
      $from = strtotime(date('Y-m-d',time() - 3*86400));
      $to = strtotime(date('Y-m-d',time() + 3*86400));
      //$to = strtotime(date('Y-m-d',time()+86399));
    }
    
    return $revenueModel -> getRevenues($from, $to, $branch);
    
  }
  
  
  /**
   * Get Pending Revenue Information
   * @param type $from date
   * @param type $to date
   * @param type $branch branchname
   * @return type
   */
  function getPendingRevenuesAction($from = -1, $to = -1, $branch = 'all'){
    
    require_once MODULES . '/finance/models/revenue.php';
    $revenueModel = new Viven_Revenue_Model;
    
    if($from == -1 || $to == -1) {
      $from = $to = strtotime(date('Y-m-d',time()));
      //$to = strtotime(date('Y-m-d',time()+86399));
    }
    
    return $revenueModel -> getPendingRevenues($from, $to, $branch);
  }

}