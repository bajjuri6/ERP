<?php

class Viven_User_Register extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  public function newAction(){
    
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
    
      if(isset($_POST['reg'])){
        require_once MODULES.'/user/models/user.php';
        $model = new Viven_User_Model();
        if($_POST['pw'] == $_POST['cpw']) {
          $res = $model -> addUser($_POST);
        }
        echo $res;
      }
      else{
        
        $dataController = new Viven_Api_Generic;
        $rolelist = $dataController ->getUserRolesAction();

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
                    "options" => $rolelist);        
        $ulevel = $form ->Viven_AddSelect($ul);
        $form_fields['User Level:'] = $ulevel;

        
        $branchlist = $dataController -> activeBranchesAction();
        
        $branch = array("name" => "branch",
                    "id" => "branch",
                    "class" => "none",
                    "options" => $branchlist
                      );
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
        $outForm = '<form id="vf_register" class="popform" method="post">';
        $outForm .= $form -> Viven_ArrangeForm($form_fields,2,1);
        $outForm .= '</form>';

        echo $outForm;

      } //End Else
    
    } //END XMLHTTPRESQUEST IF
    
    else {
      
      header("location:/"); 
      
    }
    
  } // End newAction()
  
}