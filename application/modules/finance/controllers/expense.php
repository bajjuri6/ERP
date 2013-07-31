<?php

class Viven_Finance_Expense extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  
  function newAction(){
    
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      
      if(isset($_POST['expense'])){
        require_once MODULES . '/finance/models/expense.php';
        $expenseModel = new Viven_Expense_Model;

        echo $expenseModel -> addExpense($_POST);
      }
      
    }
    
    else{
      
      $dataController = new Viven_Api_Generic;
      $expensetypelist = $dataController -> getExpenseTypesAction();
      $branchlist = $dataController -> activeBranchesAction();
      
      $form = new Form();
      $form_fields = array();
      
      
      $date = array("type" => "text", 
                  "name" => "edate",
                  "id" => "edate",
                  "size" => "27",
                  "readonly" => "readonly",
                  "class" => "none datepicker");
      $edate = $form -> Viven_AddInput($date);
      $form_fields['Expense Date:'] = $edate;
      
      
      $branch = array("name" => "branch",
                  "id" => "branch",
                  "class" => "none",
                  "options" => $branchlist);
      $ebranch = $form ->Viven_AddSelect($branch);
      $form_fields['Branch:'] = $ebranch;
      
      
      $type = array("name" => "type",
                  "id" => "type",
                  "class" => "none",
                  "options" => $expensetypelist);
      $etype = $form ->Viven_AddSelect($type);
      $form_fields['Expense Type:'] = $etype;
      
      
      $pt = array("type" => "text", 
                  "name" => "pt",
                  "id" => "pt",
                  "size" => "27",
                  "class" => "none");
      $pto = $form -> Viven_AddInput($pt);
      $form_fields['Paid To:'] = $pto;
      
      $pn = array("type" => "text", 
                  "name" => "pn",
                  "id" => "pn",
                  "size" => "27",
                  "class" => "none");
      $pnumber = $form -> Viven_AddInput($pn);
      $form_fields['Contact Number:'] = $pnumber;
      
      $amt = array("type" => "text", 
                   "name" => "amt",
                  "id" => "amt",
                  "size" => "27",
                  "class" => "none");
      $amount = $form -> Viven_AddInput($amt);
      $form_fields['Amount:'] = $amount;
      
      $mode = array("name" => "mode",
                  "id" => "mode",
                  "class" => "none",
                  "options" => array("Credit/Debit Card" => array("value" => "1"),
                                     "Cheque" => array("value" => "2"),
                                     "Cash" => array("value" => "3")
                                    ));
      $pmode = $form ->Viven_AddSelect($mode);
      $form_fields['Payment Mode:'] = $pmode;
      
      
      $pdet = array("name" => "details",
                    "id" => "details",
                    "rows" => "3",
                    "cols" => "26",
                    "class" => "none");
      $pdetail = $form ->Viven_AddText($pdet);
      $form_fields['Payment Mode Details:'] = $pdetail;
      
      
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
      
      $exp = array("type" => "hidden", 
                   "name" => "expense",
                   "value" => "1");
      $expense = $form -> Viven_AddInput($exp);
      $form_fields[''] = $expense;
      
      $outForm .= $form -> Viven_ArrangeForm($form_fields,2);
      $this -> view -> newexpense = $outForm;
      $this -> view -> render('expense/index','finance');
    } //End Else
      
  } //End newAction()
  

}