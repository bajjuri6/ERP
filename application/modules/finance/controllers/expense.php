<?php

class Viven_Finance_Expense extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  
  function newAction(){
    if(isset($_POST['expense'])){
      require_once MODULES . '/finance/models/expense.php';
      $expenseModel = new Viven_Expense_Model;

      echo $expenseModel -> addExpense($_POST);
    }
    else{
      
      $dataController = new Viven_Api_Generic;
      $expensetypelist = $dataController -> getExpenseTypesAction();
      
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
      
      
      $type = array("name" => "type",
                  "id" => "type",
                  "class" => "none",
                  "options" => $expensetypelist);
      $etype = $form ->Viven_AddSelect($type);
      $form_fields['Expense Type:'] = $etype;
      
      
      $name = array("type" => "text", 
                  "name" => "cn",
                  "id" => "cn",
                  "size" => "27",
                  "class" => "none");
      $cname = $form -> Viven_AddInput($name);
      $form_fields['Paid To:'] = $cname;
      
      $pn = array("type" => "text", 
                  "name" => "pn",
                  "id" => "pn",
                  "size" => "27",
                  "class" => "none");
      $pnumber = $form -> Viven_AddInput($pn);
      $form_fields['Contact To:'] = $pnumber;
      
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