<?php

class Viven_Api_Finance extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  
  /**
   * Get Revenue details
   * @param type $from The Date from which you need the details (optional)
   * @param type $to The Date until which you need the details (optional)
   * @param type $branch The Branch for which you need the details (Default: All branches)
   * @return type
   */
  public function getRevenue($from = -1, $to = -1, $branch = 'all'){
    require_once MODULES.'/finance/controllers/revenue.php';
    $financeController = new Viven_Finance_Revenue;
    return $financeController -> getRevenueAction($from, $to, $branch);
  }
  
  
  /**
   * Get Expense details
   * @param type $from The Date from which you need the details (optional)
   * @param type $to The Date until which you need the details (optional)
   * @param type $branch The Branch for which you need the details (Default: All branches)
   * @return type
   */
  public function getExpenses($from = -1, $to = -1, $branch = 'all'){
    require_once MODULES.'/finance/controllers/expense.php';
    $financeController = new Viven_Finance_Expense;
    return $financeController -> getExpenseAction($from, $to, $branch);
  }
  
  
  /**
   * Get Pending Revenuedetails
   * @param type $from The Date from which you need the details (optional)
   * @param type $to The Date until which you need the details (optional)
   * @param type $branch The Branch for which you need the details (Default: All branches)
   * @return type
   */
  public function getPendingRevenues($from = -1, $to = -1, $branch = 'all'){
    require_once MODULES.'/finance/controllers/expense.php';
    $financeController = new Viven_Finance_Revenue;
    return $financeController -> getPendingRevenuesAction($from, $to, $branch);
  }
  
}