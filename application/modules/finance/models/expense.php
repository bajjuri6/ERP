<?php 

class Viven_Expense_Model extends Model{

  function __construct() {
    parent::__construct();
  }
  
  
  function addExpense($details){
    
    $edate = $this -> db -> quote($details['edate']);
    $ebranch = $this -> db -> quote($details['branch']);
    $type = $this -> db -> quote($details['type']);
    $pt = $this -> db -> quote($details['pt']);
    $pn = $this -> db -> quote($details['pn']);
    $amt = $this -> db -> quote($details['amt']);
    $mode = $this -> db -> quote($details['mode']);
    $details = $this -> db -> quote($details['details']);
    $bal = $this -> db -> quote($details['bal']);
    $remarks = $this -> db -> quote($details['remarks']);
    
    $time = time();
    $qs = 'INSERT INTO viv_exp_det_en (_exp_date,
                                      _exp_branch,
                                      _exp_type,
                                      _exp_paid_to,
                                      _exp_phone_number,
                                      _exp_amount,
                                      _exp_payment_mode,
                                      _exp_payment_mode_details,
                                      _exp_bal,
                                      _exp_comments,
                                      _exp_addedby,
                                      _exp_addedon,
                                      _exp_lastmodby,
                                      _exp_lastmodon) VALUES ( '
                                                         . $edate .', '
                                                         . $ebranch .', '
                                                         . $type .', '
                                                         . $pt .', '
                                                         . $pn .', '
                                                         . $amt .', '
                                                         . $mode .', '
                                                         . $details .', '
                                                         . $bal .', '
                                                         . $remarks .', '
                                                         . $this -> eun .', '
                                                         . $time .', '
                                                         . $this -> eun .', '
                                                         . $time .')';
    
    if($this -> db -> exec($qs)) return "Success";
    else return $qs;
    
  }
  
  
  function getExpenses($from, $to, $branch){
    $qs = 'SELECT * FROM viv_exp_det_en ';
    if($from == -1 || $to == -1){
      
      if($branch == 'all'){
        $qs .= 'WHERE 1';
      }
      else{
        $qs .= 'WHERE _exp_branch = ' . $branch;
      }
      
    }
    else{
      
      $qs .= 'WHERE _exp_date BETWEEN ' . $from . ' AND ' . $to;
    }
    
    $qr = $this -> db -> query($qs);
    return $qr -> fetchAll(PDO::FETCH_ASSOC);
  }
  
}