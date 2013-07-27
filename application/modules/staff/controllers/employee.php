<?php

class Viven_Staff_Employee extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  //Add new employee
  function newAction(){
  
    if(isset($_POST['train'])){
      var_dump($_POST);
    }
    else{
    }  
    $form = new Form();
    $form_fields = array();


    $name = array("type" => "text", 
                "name" => "en",
                "id" => "en",
                "class" => "none",
                "size" => "27");
    $ename = $form -> Viven_AddInput($name);
    $form_fields['Employee Name:'] = $ename;


    $dataController = new Viven_Api_Generic;
    $activeBrancheslist = $dataController ->activeBranchesAction();
    $activeStafflist = $dataController ->getActiveStaffList('all');
    //$designationList = $dataController ->getActiveStaffList('all');


    $br = array("name" => "br",
                "id" => "br",
                "class" => "none",
                "options" => $activeBrancheslist);        
    $branch = $form ->Viven_AddSelect($br);
    $form_fields['Branch:'] = $branch;

    $type = array("name" => "type",
                "id" => "br",
                "class" => "none",
                "options" => array("Part time" => array("value" => "pt"),
                                      "Full time" => array("value" => "ft")));        
    $stfType = $form ->Viven_AddSelect($type);
    $form_fields['Type:'] = $stfType;


    $sup = array("name" => "sn",
                "id" => "sn",
                "class" => "none",
                "options" => array_merge(array("Owner" => array("value" => "admin")), $activeStafflist));        
    $supervisor = $form ->Viven_AddSelect($sup);
    $form_fields['Supervisor:'] = $supervisor;


    $doj = array("type" => "text", 
                "name" => "pdate",
                "id" => "pdate",
                "size" => "27",
                "readonly" => "readonly",
                "class" => "none datepicker");
    $stfDOJ = $form ->Viven_AddInput($doj);
    $form_fields['Date of Joining:'] = $stfDOJ;

    $dl = array("name" => "dsg",
                "id" => "dsg",
                "class" => "none",
                "options" => array("Trainer" => array("value" => "t"),
                                  "Frontdesk" => array("value" => "f"),
                                  "House keeping" => array("value" => "h"),
                                  "Manager" => array("value" => "m")));       
    $dlist = $form ->Viven_AddSelect($dl);
    $form_fields['Designation:'] = $dlist;
    
    $sal = array("type" => "text", 
                "name" => "sal",
                "id" => "sal",
                "size" => "27",
                "class" => "none");
    $stfSal = $form -> Viven_AddInput($sal);
    $form_fields['Salary:'] = $stfSal;

    $remarks = array("type" => "text", 
                  "name" => "rm",
                  "id" => "date",
                  "rows" => "3",
                  "cols" => "27",
                  "class" => "none");
    $aremarks = $form ->Viven_AddText($remarks);
    $form_fields['Remarks:'] = $aremarks;
    
    $outForm .= $form -> Viven_ArrangeForm($form_fields,2,0,false);
    $this -> view -> employeeForm = $outForm;
      
    $this -> view -> render('employee/new','staff');
  }
  
  function getStaffListAction($type, $status){
    require MODULES . '/staff/models/staff.php';
    $model = new Viven_Staff_Model;
    $slist = $model -> getStaffList($type, $status);
    return $slist;
  }
}