<?php

class Viven_Customer_Basics extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  
  public function getForm(){
    
    $dataController = new Viven_Api_Generic;
    $activeStafflist = $dataController->getActiveStaffAction();
    $activeServicesList = $dataController->getActiveServicesAction();
    
    $form = new Form();
    $form_fields = array();

    
    $cn = array("type" => "text", 
                "name" => "cn",
                "id" => "cn",
                "size" => "27",
                "class" => "none");
    $cname = $form -> Viven_AddInput($cn);      
    $form_fields['Customer Name:'] = $cname;


    $cid = array("type" => "text", 
                "name" => "cid",
                "id" => "cid",
                "size" => "27",
                "class" => "none validateun enrollbun");
    $cidentity = $form -> Viven_AddInput($cid);
    $form_fields['Customer ID:'] = $cidentity;

    $pn = array("type" => "text", 
                "name" => "pn",
                "id" => "pn",
                "size" => "27",
                "class" => "none");
    $pnumber = $form -> Viven_AddInput($pn);      
    $form_fields['Phone Number:'] = $pnumber;


    $em = array("type" => "text", 
                "name" => "em",
                "id" => "em",
                "size" => "27",
                "class" => "none");
    $email = $form -> Viven_AddInput($em);      
    $form_fields['Email Address:'] = $email;
    
    $addrss = array("name" => "addrss",
                    "id" => "addrss",
                    "rows" => "3",
                    "cols" => "27",
                    "class" => "none");
    $addrssarr = $form->Viven_AddText($addrss);
    $form_fields['Address:'] = $addrssarr;
    
    $date = array("type" => "input", 
                "name" => "date",
                "id" => "date",
                "size" => "27",
                "readonly" => "readonly",
                "class" => "none datepicker");
    $adate = $form -> Viven_AddInput($date);
    $form_fields['Date Of Joining:'] = $adate;
    
    
    //By default, the branch should be fetched from the logged in user information. 
    //Of course, this assumes that a person can add people to only his branch.
    
    /*$branch = array("name" => "branch",
                    "id" => "branch",
                    "class" => "none",
                    "options" => $activeBrancheslist);
    $ibranch = $form ->Viven_AddSelect($branch);
    $form_fields['Branch:'] = $ibranch;*/

    $service = array("name" => "service",
                    "id" => "service",
                    "class" => "none",
                    "options" => $activeServicesList);
    $iservice = $form ->Viven_AddSelect($service);
    $form_fields['Service:'] = $iservice;
    
    
    $tn = array("name" => "tn",
                "id" => "tn",
                "class" => "none",
                "options" => $activeStafflist);
    $tname = $form -> Viven_AddSelect($tn);
    $form_fields['Customer Incharge:'] = $tname;



    $bas = array("type" => "hidden",
                  "name" => "basics",
                  "value" => "1");
    $basicshidden = $form->Viven_AddInput($bas);
    $form_fields[''] = $basicshidden;

    //Get the First Sub Form of the Enrollment
    $basics = $form -> Viven_ArrangeForm($form_fields,2,0,false);
    return $basics;    

  }
  
  function newAction(){
   
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if(isset($_POST['cattn'])){
        
        require_once MODULES.'/customer/models/customer.php';
        $model = new Viven_Customer_Model;
        $res = $model -> addAttendance($_POST);
        echo $res;
        
      }
      else{
        
        $this -> view -> basics = $this -> getForm();
        $this -> view -> render('basics/index','customer');

      } // End Else
      
    } // End XMLHTTPREQUEST check
    
  } // End newAction()
  
}