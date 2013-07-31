<?php

class Viven_Business_Service extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if($_POST['ns']){
        
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
         * Enquiry Form Elements
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
  
} //End Class