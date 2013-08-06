<?php

class Viven_Business_Service extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if(isset($_POST['ns'])){
        
        require_once MODULES.'/business/models/service.php';
        $model = new Viven_Service_Model;
        $res = $model -> addService($_POST);
        echo $res;
        
      }
      
      else{
        
        $dataController = new Viven_Api_Generic;
        $branchlist = $dataController -> activeBranchesAction(); 
      
        $form = new Form();
        $form_fields = array();

        /**
         * Add New Service Form
         */
        $sd = array("type" => "input", 
                    "name" => "sd",
                    "id" => "sd",
                    "size" => "27",
                    "readonly" => "readonly",
                    "class" => "none datepicker");
        $sdate = $form -> Viven_AddInput($sd);
        $form_fields['Start Date:'] = $sdate;

        $sl = array("type" => "input", 
                    "name" => "sl",
                    "id" => "sl",
                    "size" => "27",
                    "class" => "none");
        $slength = $form -> Viven_AddInput($sl);
        $form_fields['Service Length:'] = $slength;


        $sn = array("type" => "text", 
                    "name" => "sn",
                    "id" => "sn",
                    "size" => "27",
                    "class" => "none");
        $sname = $form -> Viven_AddInput($sn);
        $form_fields['Service Name:'] = $sname;
        
        
        $sh = array("type" => "text", 
                    "name" => "sh",
                    "id" => "sh",
                    "size" => "27",
                    "class" => "none");
        $shand = $form -> Viven_AddInput($sh);
        $form_fields['Service Shorthand:'] = $shand;
        
        
        $st = array("type" => "text", 
                    "name" => "st",
                    "id" => "st",
                    "size" => "27",
                    "class" => "none");
        $stype = $form -> Viven_AddInput($st);
        $form_fields['Service Type:'] = $stype;


        $branch = array("name" => "branch[]",
                    "id" => "branch",
                    "class" => "none",
                    "multiple" => "multiple",
                    "options" => $branchlist
                      );
        $ubranch = $form ->Viven_AddSelect($branch);
        $form_fields['Branch:'] = $ubranch;


        $remarks = array("type" => "input", 
                    "name" => "remarks",
                    "id" => "remarks",
                    "rows" => "6",          
                    "cols" => "28",
                    "class" => "none");
        $aremarks = $form ->Viven_AddText($remarks);
        $form_fields['Comments:'] = $aremarks;

        $ns = array("type" => "hidden", 
                     "name" => "ns",
                     "value" => "1");
        $nservice = $form -> Viven_AddInput($ns);
        $form_fields[''] = $nservice;

        $outForm = '<form id="vf_ns" class="popform" method="post">';
        $outForm .= $form -> Viven_ArrangeForm($form_fields,2,1);
        $outForm .= '</form>';

        echo $outForm;

      } //End Else    
      
    } // End XMLHTTPREQUEST check
    
  }  //End newAction()
  
  
  
 
    function subAction(){
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if(isset($_POST['nsub'])){
        
        require_once MODULES.'/business/models/service.php';
        $model = new Viven_Service_Model;
        $res = $model -> addSub($_POST);
        echo $res;
        
      }
      else{
        
        $dataController = new Viven_Api_Generic;
        $activeStafflist = $dataController->getActiveStaffAction('all');
        /*$activeServicesList = $dataController->getActiveServicesAction();*/
        
        $activeServicesList = $this -> getServiceTypesAction();
        
        
        $form = new Form();
        $form_fields = array();

        /**
         * Personal Training Subscription Form 
         */
                    
        $cun = array("type" => "input", 
                    "name" => "un",
                    "id" => "un",
                    "size" => "27",
                    "class" => "none validateun");
        $cuname = $form -> Viven_AddInput($cun);
        $form_fields['Customer ID:'] = $cuname;


        $sn = array("type" => "text", 
                    "name" => "service",
                    "id" => "service",
                    "class" => "none",
                    "options" => $activeServicesList);
        $sname = $form -> Viven_AddSelect($sn);
        $form_fields['Service Name:'] = $sname;
        
        
        $ss = array("type" => "text", 
                    "name" => "ss",
                    "id" => "ss",
                    "size" => "27",
                    "readonly" => "readonly",
                    "class" => "none datepicker");
        $sstart = $form -> Viven_AddInput($ss);
        $form_fields['Service Start Date:'] = $sstart;


        $tn = array("name" => "tn",
                    "id" => "tn",
                    "class" => "none",
                    "options" => $activeStafflist);
        $tname = $form -> Viven_AddSelect($tn);
        $form_fields['Subscription Incharge:'] = $tname;


        $remarks = array("type" => "input", 
                    "name" => "remarks",
                    "id" => "remarks",
                    "rows" => "3",          
                    "cols" => "26",
                    "class" => "none");
        $aremarks = $form ->Viven_AddText($remarks);
        $form_fields['Comments:'] = $aremarks;

        $ns = array("type" => "hidden", 
                     "name" => "nsub",
                     "value" => "1");
        $nsub = $form -> Viven_AddInput($ns);
        $form_fields[''] = $nsub;

        $outForm = '<form id="vf_nsub" class="popform" method="post">';
        $outForm .= $form -> Viven_ArrangeForm($form_fields,2,1,true);
        $outForm .= '</form>';

        echo $outForm;

      } //End Else    
      
    } // End XMLHTTPREQUEST Check
    
  } //End subAction()
  
  
  
  /**
   * Get a list of All Active Services
   * @return type
   */
  function getServiceTypesAction($branch = null, $status = 1){
    
    require_once MODULES . '/business/models/service.php';
    $model = new Viven_Service_Model;
    
    if(!isset($branch)){
      $branch = $_SESSION['branch'];
    }
    return $model -> getServicesList($branch, $status);    
    
  }
  
} //End Class