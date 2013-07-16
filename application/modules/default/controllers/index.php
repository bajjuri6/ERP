<?php

class Default_Index extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  public function indexAction(){
    
    if(isset($_POST['lgn'])){
      echo $_POST['un']."<br />";
      echo $_POST['pw'].'jk';
    }else{
      $form = new Form();
      $form_fields = array();
      
      /**
       * Login Form Elements
       */
      $un = array("type" => "text", 
                  "name" => "un",
                  "id" => "un",
                  "class" => "none");
      $uname = $form -> Viven_AddInput($un);
      $form_fields['User Name:'] = $uname;
      
      $pw = array("type" => "password", 
                  "name" => "pw",
                  "id" => "pw",
                  "class" => "none");
      $pword = $form -> Viven_AddInput($pw);
      
      $form_fields['Password:'] = $pword;
      
      $lgn = array("type" => "hidden", 
                   "name" => "lgn",
                   "value" => "1");
      $login = $form -> Viven_AddInput($lgn);
      $form_fields[''] = $login;
            
      
      
      /**
       * Create Form string
       */
      $outForm = '<form method="post" action="/user/login">';
      $outForm .= $form -> Viven_ArrangeForm($form_fields,2);
      $outForm .= '</form>';
      
      $this -> view -> form = $outForm;
      $this -> view -> render('index/index', 'default');
    } 
  }
}