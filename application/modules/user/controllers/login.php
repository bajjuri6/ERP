<?php

class User_Login extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  public function indexAction(){
    
    if(isset($_POST['lgn'])){
      $model = new User_Model();
      $res = $model ->loginUser($_POST['un'], $_POST['pw']);
      $result = "Login: ";
      switch($res){
        case 0:
          $result .= "FAILURE";
          break;
        case 1:
          $result .= "PARTIAL SUCCESS";
          break;
        case 2:
          $result .= "SUCCESS !!";  
          break;
      }
       $this -> view -> LoginStatus = $result;
    }else{
      $form = new Form();
      $form_fields = array();
      
      /**
       * Login Form Elements
       */
      $un = array("type" => "text", 
                  "name" => "un",
                  "id" => "un",
                  "size" => "30",
                  "class" => "none");
      $uname = $form -> Viven_AddInput($un);
      
      $form_fields['User Name:'] = $uname;
      
      $pw = array("type" => "password", 
                  "name" => "pw",
                  "id" => "pw",
                  "size" => "30",
                  "class" => "none");
      $pword = $form -> Viven_AddInput($pw);
      
      $form_fields['Password:'] = $pword;
      
      $lgn = array("type" => "hidden", 
                   "name" => "lgn",
                   "value" => "1");
      $login = $form -> Viven_AddInput($lgn);
      $form_fields[''] = $login;
            
      $this -> view -> form = $form -> Viven_ArrangeForm($form_fields,2);
      
    } 
    $this -> view -> render('login/index', 'user');
  }
}