<?php

class Viven_Mode_Model extends Model{

  function __construct() {
    parent::__construct();
  }
  
  function addPaymentMode($details){
    
    $name = $this -> db -> quote(strtolower($details['name']));
    //$modeid = $this -> db -> quote(strtolower($details['name']) . "_viven");   _payment_md_un,
    $comments = $this -> db -> quote($details['remarks']);
    $un = $this -> db -> quote($_SESSION['un']);
    $time = time();
    
    foreach($details['branch'] as $val){
      $qs = "INSERT INTO viv_payment_md_en (_payment_md_branch,
                                            _payment_md_name,
                                            _payment_md_comments,
                                            _payment_md_addedby,
                                            _payment_md_addedon,
                                            _payment_md_lastmodby,
                                            _payment_md_lastmodon) VALUES ( ". $this -> db -> quote($val) . ", "
                                                                            //. $modeid . ", "
                                                                            . $name . ", "
                                                                            . $comments . ", " 
                                                                            . $un . ", " 
                                                                            . $time . ", " 
                                                                            . $un . ", " 
                                                                            . $time . ")";
      if(!$this -> db -> exec($qs)){
        return $qs;
      } //End EXEC IF statement
      
    } //End FOREACH loop
    
    return "SUCCESS";
    
  }
  
  
  
  
  
  function getPaymentModes(){
    $qs = "SELECT _payment_md_name from viv_payment_md_en WHERE _payment_md_branch = " . $this -> db -> quote($_SESSION['branch']);
    $qr = $this -> db -> query($qs);
    //return var_dump($qs);
    $res = $qr -> fetchAll(PDO::FETCH_ASSOC);
    $mla = array();
    if($res){      
      foreach($res as $val){
        $mla[ucfirst($val['_payment_md_name'])] = array("value" => $val['_payment_md_name']);
      }
    }
    var_dump($mla);
    return $mla;
  }

}