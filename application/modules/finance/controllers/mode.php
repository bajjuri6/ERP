<?php

class Viven_Finance_Mode extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  function newAction(){
    
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if(isset($_POST['pmode'])){
        
        require_once MODULES.'/finance/models/mode.php';
        $model = new Viven_Mode_Model;
        $res = $model -> addPaymentMode($_POST);
        echo $res;
        
      }
      else{
        
        $dataController = new Viven_Api_Generic;
        $branchlist = $dataController -> activeBranchesAction(); 
        
        $form = new Form();
        $form_fields = array();


        $name = array("type" => "text", 
                    "name" => "name",
                    "id" => "name",
                    "size" => "27",
                    "class" => "none");
        $cname = $form -> Viven_AddInput($name);
        $form_fields['Payment Mode Name:'] = $cname;
        

        $rem = array("type" => "text", 
                    "name" => "remarks",
                    "id" => "remarks",
                    "rows" => "3",
                    "cols" => "26",
                    "class" => "none");
        $remarks = $form -> Viven_AddText($rem);
        $form_fields['Comments:'] = $remarks;
        

        $branch = array("name" => "branch[]",
                    "id" => "branch",
                    "class" => "none",
                    "multiple" => "multiple",
                    "options" => $branchlist
                      );
        $ubranch = $form ->Viven_AddSelect($branch);
        $form_fields['Branch Availability:'] = $ubranch;
        

        $pmnt = array("type" => "hidden", 
                     "name" => "pmode",
                     "value" => "1");
        $ipmnt = $form -> Viven_AddInput($pmnt);
        $form_fields[''] = $ipmnt;

        $outForm = '<form id="vf_pmode" class="popform" method="post">';
        $outForm .= $form -> Viven_ArrangeForm($form_fields,2,1);
        $outForm .= '</form>';

        echo $outForm;

      } //End Else
      
    } // End XMLHTTPREQUEST check
    
  } //End newAction()
  
  
  function getModeListAction($param = "active"){
    
    require_once MODULES . '/finance/models/mode.php';
    $model = new Viven_Mode_Model;
    
    return $model -> getPaymentModes($param);
    
  }

}