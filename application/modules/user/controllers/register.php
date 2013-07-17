<?php

class Viven_User_Register extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  public function indexAction(){
    
    if(isset($_POST['reg'])){
      require MODULES.'/user/models/user.php';
      $model = new Viven_User_Model();
      if($_POST['pw'] == $_POST['cpw']) {
        $res = $model -> addUser(array('branch' => $_POST['branch'], 
                                      'un' => $_POST['un'],
                                      'pw' => $_POST['pw'],
                                      'level' => $_POST['level']));
      }
      $result = "Registration Status: ";
      
      switch($res){
        case 0:
          $result .= "Successful";
          break;
        case 1:
          $result .= "Failed";
          break;
        case 2:
          $result .= "UserName exists, please select a new one";
          break;
      }
      
      $this -> view -> regResult = $result;
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
      
      
      $cpw = array("type" => "password", 
                  "name" => "cpw",
                  "id" => "cpw",
                  "size" => "30",
                  "class" => "none");
      $cpword = $form ->Viven_AddInput($cpw);      
      $form_fields['Confirm Password:'] = $cpword;
      
      
      $ul = array("name" => "level",
                  "id" => "level",
                  "class" => "none",
                  "options" => array("ADMIN" => array("value" => "1"),
                                     "STANDARD" => array("value" => "2")
                    ));
      $ulevel = $form ->Viven_AddSelect($ul);
      $form_fields['User Level:'] = $ulevel;
      
      
      $branch = array("name" => "branch",
                  "id" => "branch",
                  "class" => "none",
                  "options" => array("DSNR" => array("value" => "0"),
                                     "Film Nagar" => array("value" => "1")
                    ));
      $ubranch = $form ->Viven_AddSelect($branch);
      $form_fields['Branch:'] = $ubranch;
      
      
      $lgn = array("type" => "hidden", 
                   "name" => "reg",
                   "value" => "1");
      $login = $form -> Viven_AddInput($lgn);
      $form_fields[''] = $login;
            
      
      
      /**
       * Create Form string
       */
      $outForm = '<form method="post" action="/user/register">';
      $outForm .= $form -> Viven_ArrangeForm($form_fields,2);
      $outForm .= '</form>';
      
      echo $outForm;
      //$this -> view -> form = $outForm;      
    } 
    //$this -> view -> render('register/index', 'user');
  }
}