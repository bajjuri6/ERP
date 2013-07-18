<?php

class Viven_Data_Model extends Model{

  function __construct() {
    parent::__construct();
  }
  
  public function getRecords($limit){
    $loginRecords = $this -> db -> query("SELECT _lgn_un,
                                                _lgn_ip,
                                                _lgn_loc,
                                                _lgn_time FROM viv_lgn_rec_en LIMIT ". $limit);
    return $loginRecords -> fetchAll(PDO::FETCH_ASSOC);
  }
  
}