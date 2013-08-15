<?php 

class Viven_Expense_Model extends Model{

  function __construct() {
    parent::__construct();
  }
  
  
  function addExpense($details){
    
    $edate = $this -> db -> quote(strtotime($details['edate']));
    $etn = $this -> db -> quote($details['tn']);
    $ebranch = $this -> db -> quote($_SESSION['branch']);
    $type = $this -> db -> quote($details['type']);
    $pt = $this -> db -> quote($details['pt']);
    $pn = $this -> db -> quote($details['pn']);
    $amt = $this -> db -> quote($details['amt']);
    $mode = $this -> db -> quote($details['mode']);
    $det = $this -> db -> quote($details['details']);
    $remarks = $this -> db -> quote($details['remarks']);
    
    $time = time();
    
    $qs = 'INSERT INTO viv_exp_en (_exp_tn,
                                  _exp_owed_to,
                                  _exp_branch,
                                  _exp_type,
                                  _exp_amount,
                                  _exp_date,
                                  _exp_remarks,
                                  _exp_addedby,
                                  _exp_addedon,
                                  _exp_lastmodby,
                                  _exp_lastmodon) VALUES ('
                                                  . $etn .', '
                                                  . $pt .', '
                                                  . $ebranch .', '
                                                  . $type .', '
                                                  . $amt .', '
                                                  . $edate .', '
                                                  . $remarks .', '
                                                  . $this -> eun .', '
                                                  . $time .', '
                                                  . $this -> eun .', '
                                                  . $time .')';
    
    if($this -> db -> exec($qs)){
      $qsdet = 'INSERT INTO viv_exp_det_en (_exp_det_fk,
                                            _exp_det_phone_number,
                                            _exp_det_payment_mode,
                                            _exp_det_payment_mode_details,
                                            _exp_det_remarks,
                                            _exp_det_addedby,
                                            _exp_det_addedon,
                                            _exp_det_lastmodby,
                                            _exp_det_lastmodon) VALUES ( '
                                                               . $etn .', '
                                                               . $pn .', '
                                                               . $mode .', '
                                                               . $det .', '
                                                               . $remarks .', '
                                                               . $this -> eun .', '
                                                               . $time .', '
                                                               . $this -> eun .', '
                                                               . $time .')';

      if($this -> db -> exec($qsdet)) {
        return "Success";
      }
      else {
        return $qsdet;//"Partial Success";
      }
    }    
    else {
      return $qs;
    }
    
  }
  
  
  function getExpenses($from, $to, $branch){
    
    $qs = 'SELECT * FROM viv_exp_en WHERE _exp_status = 1 AND ';
    
    if($branch != 'all'){
      $qs .= '_exp_branch = ' . $branch . ' AND ';
    }
    
    $qs .= '_exp_date BETWEEN ' . $from . ' AND ' . $to;
    
    //return $qs;
    $qr = $this -> db -> query($qs);
    return $qr -> fetchAll(PDO::FETCH_ASSOC);
  }
  
  
  
  
  function getPendingExpenses($from, $to, $branch){
    
    $qs = 'SELECT * FROM viv_exp_det_en WHERE _exp_status = 0 AND ';
    
    if($branch != 'all'){
      $qs .= '_exp_branch = ' . $branch . ' AND';
    }
    
    $qs .= '_exp_date BETWEEN ' . $from . ' AND ' . $to;
    
    $qr = $this -> db -> query($qs);
    return $qr -> fetchAll(PDO::FETCH_ASSOC);
  }
  
}