<?php

class Viven_User_Roles extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
    
      if(isset($_POST['role'])){
        require MODULES.'/user/models/roles.php';
        $model = new Viven_Roles_Model;
        $res = $model -> addRole($_POST);
        echo $res;
      }
      else{
        $form = new Form();
        $form_fields = array();

        /**
         * Add Role Form Elements
         */
        $rn = array("type" => "text", 
                    "name" => "rn",
                    "id" => "rn",
                    "size" => "30",
                    "class" => "none");
        $rname = $form -> Viven_AddInput($rn);
        $form_fields['Role Name:'] = $rname;


        $rle = array("type" => "hidden", 
                     "name" => "role",
                     "value" => "1");
        $role = $form -> Viven_AddInput($rle);
        $form_fields[''] = $role;


        /**
         * Create Form string
         */
        $outForm = '<form id="vf_role" class="popform" method="post">';
        $outForm .= $form -> Viven_ArrangeForm($form_fields,2,1);
        $outForm .= '</form>';

        echo $outForm;

      } //End Else
      
    } //End XMLHTTPREQUEST Check
    
  } //End newAction()
  
  
  public function getRolesAction(){
    require MODULES . '/user/models/roles.php';
    $model = new Viven_Roles_Model;
    
    return $model -> getList();
  }
  
}