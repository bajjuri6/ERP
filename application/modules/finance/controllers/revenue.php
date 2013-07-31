<?php

class Viven_Finance_Revenue extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    if(isset($_POST['pmnt'])){
      require_once MODULES . '/finance/models/revenue.php';
      $revenueModel = new Viven_Revenue_Model;

      echo $revenueModel -> addRevenue($_POST);
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
                  "name" => "cn",
                  "id" => "cn",
                  "size" => "27",
                  "class" => "none");
      $cname = $form -> Viven_AddInput($name);
      $form_fields['Customer Name:'] = $cname;
      
      
      $mode = array("name" => "mode",
                  "id" => "mode",
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
                  "name" => "remarks",
                  "id" => "remarks",
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
      $this -> view -> render('revenue/index','finance');
    } //End Else
      
  } //End newAction()
  
  
  /**
   * Get Revenue Information
   * @param type $from
   * @param type $to
   * @param type $branch
   * @return type
   */
  function getRevenueAction($from = -1, $to = -1, $branch = 'all'){
    
    require_once MODULES . '/finance/models/revenue.php';
    $revenueModel = new Viven_Revenue_Model;
    
    return $revenueModel -> getRevenues($from, $to, $branch);
    
  }
  
  
  /**
   * Get Pending Revenue Information
   * @param type $from
   * @param type $to
   * @param type $branch
   * @return type
   */
  function getPendingRevenuesAction($from, $to, $branch){
    
    require_once MODULES . '/finance/models/revenue.php';
    $revenueModel = new Viven_Revenue_Model;
    
    return $revenueModel -> getPendingRevenues($from, $to, $branch);
    return ;
  }

}