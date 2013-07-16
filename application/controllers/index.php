<?php

class Index extends Controller{

    function __construct() {
        parent::__construct();
    }
    
    public function index(){
      
      //$installModel = new checkIfInstalled();
      $this -> view -> render('index/index');
    }
}