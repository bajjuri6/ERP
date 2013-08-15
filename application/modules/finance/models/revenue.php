<?php 

class Viven_Revenue_Model extends Model{

  function __construct() {
    parent::__construct();
  }
  
  
  function addRevenue($details){
    $pdate = $this -> db -> quote(strtotime($details['pdate'])); 
    $cn = $this -> db -> quote($details['cn']);
    $tn = $this -> db -> quote($details['tn']);
    $mode = $this -> db -> quote($details['mode']);
    $det = $this -> db -> quote($details['det']);
    $due = $this -> db -> quote($details['due']);
    $epaid = $this -> db -> quote($details['paid']);
    $bal = $this -> db -> quote($details['bal']);
    $remarks = $this -> db -> quote($details['remarks']);
    $time = time();
    $qs = 'INSERT INTO viv_payment_en (_payment_branch,
                                      _payment_tn,
                                      _payment_un,
                                      _payment_date,
                                      _payment_amt,
                                      _payment_comments,
                                      _payment_addedby,
                                      _payment_addedon,
                                      _payment_lastmodby,
                                      _payment_lastmodon) VALUES ( '
                                                         . $this -> ebranch .', '
                                                         . $tn .', '
                                                         . $cn .', '
                                                         . $pdate .', '
                                                         . $epaid .', '
                                                         . $remarks .', '
                                                         . $this -> eun .', '
                                                         . $time .', '
                                                         . $this -> eun .', '
                                                         . $time .')';
    
    if($this -> db -> exec($qs)) {
      
      $qsdet = 'INSERT INTO viv_payment_peri_en (_payment_peri_fk,
                                                _payment_peri_rcvdby,
                                                _payment_peri_mode,
                                                _payment_peri_details,
                                                _payment_peri_due,
                                                _payment_peri_bal,
                                                _payment_peri_next,
                                                _payment_peri_incharge,
                                                _payment_peri_addedby,
                                                _payment_peri_addedon) VALUES ('
                                                                        . $tn .', '
                                                                        . $this -> eun .', '
                                                                        . $mode .', '
                                                                        . $det .', '
                                                                        . $due .', '
                                                                        . $bal .', '
                                                                        . $time .', '
                                                                        . $this -> eun .', '
                                                                        . $this -> eun .', '
                                                                        . $time .')';
      if($this -> db -> exec($qsdet)) {
        return "Success";
      } else {
        echo $qsdet;
      }
    }
    else {
      echo $qs;
    }
        
  }
  
  
  function getRevenues($from, $to, $branch){
    $qs = 'SELECT * FROM viv_payment_en WHERE _payment_status = 1 AND ';
    if(!$branch == 'all'){
      
      $qs .= '_payment_branch = ' . $branch . ' AND ';
      
    }
    
    else{
      
      $qs .= '_payment_date BETWEEN ' . $from . ' AND ' . $to;
    }
    
    $qr = $this -> db -> query($qs);
    //return $qs;
    return $qr -> fetchAll(PDO::FETCH_ASSOC);
  }
  
  
  function getPendingRevenues($from, $to, $branch){
    
    $qs = 'SELECT * FROM viv_payment_en WHERE _payment_status = 0 AND ';
    if(!$branch == 'all'){
      
      $qs .= '_payment_branch = ' . $branch . ' AND ';
      
    }
    
    else{
      
      $qs .= '_payment_date BETWEEN ' . $from . ' AND ' . $to;
    }
    
    $qr = $this -> db -> query($qs);
    //return $qs;
    return $qr -> fetchAll(PDO::FETCH_ASSOC);
    
  }
  
}