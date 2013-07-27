<?php

class Viven_Business_Department extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
    
      if(isset($_POST['dept'])){
      
        //process the enquiry on submit
        require MODULES . '/business/models/department.php';
        $model = new Viven_Model_Department;
        $res = $model -> addDepartment($_POST);
        if($res == 0) {
          echo "SUCCESS";
        }
        else {
          echo "FAIL!";
        }
        
      }
      else{

        $form = new Form();
        $form_fields = array();

        /**
         * Enquiry Form Elements
         */
        $dn = array("type" => "text",
                    "name" => "dn",
                    "id" => "dn",
                    "size" => "27",
                    "class" => "none");
        $dname = $form -> Viven_AddInput($dn);
        $form_fields['Department Name:'] = $dname;


        $branch = array("type" => "input", 
                    "name" => "db",
                    "id" => "db",
                    "size" => "27",
                    "class" => "none");
        $nbranch = $form -> Viven_AddInput($branch);
        $form_fields['Branch Name:'] = $nbranch;


        $dm = array("type" => "text", 
                    "name" => "dm",
                    "id" => "dm",
                    "size" => "27",
                    "class" => "none");
        $dmanager = $form -> Viven_AddInput($dm);      
        $form_fields['Department Manager:'] = $dmanager;


        $remarks = array("type" => "input", 
                    "name" => "dc",
                    "id" => "dc",
                    "rows" => "2",          
                    "cols" => "25",
                    "class" => "none");
        $bremarks = $form -> Viven_AddText($remarks);
        $form_fields['Comments:'] = $bremarks;

        $dept = array("type" => "hidden", 
                     "name" => "dept",
                     "value" => "1");
        $newdept = $form -> Viven_AddInput($dept);
        $form_fields[''] = $newdept;

        $outForm = '<form id="vf_dept" class="popform" method="post">';
        $outForm .= $form -> Viven_ArrangeForm($form_fields, 2, 1, false);
        $outForm .= '</form>';

        echo $outForm;
        //$this -> view -> form = $outForm;
        //$this -> view -> render('department/index','business');
      } //End else
    
      //$this -> view -> render('branch/index','business');
      
    } //END XMLREQUEST CHECK
    else{
      header('location:/');
    }
    
    
  } //End newAction()
  
}