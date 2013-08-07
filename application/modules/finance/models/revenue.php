<?php 

class Viven_Revenue_Model extends Model{

  function __construct() {
    parent::__construct();
  }
  
  
  function addRevenue($details){
    
    $pdate = $this -> db -> quote($details['pdate']);
    $cn = $this -> db -> quote($details['cn']);
    $mode = $this -> db -> quote($details['mode']);
    $details = $this -> db -> quote($details['details']);
    $due = $this -> db -> quote($details['due']);
    $paid = $this -> db -> quote($details['paid']);
    $bal = $this -> db -> quote($details['bal']);
    $remarks = $this -> db -> quote($details['remarks']);
    
    $time = time();
    $qs = 'INSERT INTO viv_payment_en (_payment_branch,
                                      _payment_un,
                                      _payment_date,
                                      _payment_amt,
                                      _payment_mode,
                                      _payment_rcvdby,
                                      _payment_det,
                                      _payment_comments,
                                      _payment_addedby,
                                      _payment_addedon,
                                      _payment_lastmodby,
                                      _payment_lastmodon) VALUES ( '
                                                         . $this -> ebranch .', '
                                                         . $cn .', '
                                                         . $pdate .', '
                                                         . $paid .', '
                                                         . $mode .', '
                                                         . $this -> eun .', '
                                                         . $details .', '
                                                         . $remarks .', '
                                                         . $this -> eun .', '
                                                         . $time .', '
                                                         . $this -> eun .', '
                                                         . $time .')';
    
    if($this -> db -> exec($qs)) return "Success";
    else return $qs;
        
  }
  
  
  function getRevenues($from, $to, $branch){
    $qs = 'SELECT * FROM viv_payment_en WHERE ';
    if($from == -1 || $to == -1){
      
      if($branch == 'all'){
        $qs .= 'WHERE 1';
      }
      else{
        $qs .= 'WHERE _payment_branch = ' . $branch;
      }
      
    }
    else{
      
      $qs .= 'WHERE _payment_date BETWEEN ' . $from . ' AND ' . $to;
    }
    
    $qr = $this -> db -> query($qs);
    return $qr -> fetchAll(PDO::FETCH_ASSOC);
  }
  
  
  function getPendingRevenues($from, $to, $branch){
    
    return;
  }
  
}