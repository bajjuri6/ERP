<?php

require_once MODULES . '/staff/models/staff.php';

class Viven_Staff_Employee extends Controller {

  function __construct() {
    parent::__construct();
  }

  /**
   * Add New Employee
   */
  function newAction() {

    if (isset($_POST['newemp'])) {
      foreach ($_POST as $option) {
        if (!$option) {
          $error = true;
          break;
        }
      }

      if (isset($error)) {
        $this->view->msg = 'All fields are required!';
      } else {
        $model = new Viven_Staff_Model();
        $res = $model->addEmployee($_POST);

        if ($res) {
          $this->view->msg = 'Employee added successfully!!';
        } else {
          $this->view->msg = 'Error in processing. Please try after sometime.';
        }
      }
    }
    $form = new Form();
    $form_fields = array();
    
    /**
     * All Data Lists required to render this form
     */
    $dataController = new Viven_Api_Generic;
    $activeBrancheslist = $dataController->activeBranchesAction();
    $activeStafflist = $dataController->getActiveStaffAction('all');
    //$designationList = $dataController ->getActiveStaffList('all');
    //$shiftsList = $dataController -> getShiftsList('all');

    $name = array("type" => "text",
        "name" => "en",
        "id" => "en",
        "class" => "none",
        "size" => "27");
    $ename = $form->Viven_AddInput($name);
    $form_fields['Employee Name:'] = $ename;


    $br = array("name" => "br",
        "id" => "br",
        "class" => "none",
        "options" => $activeBrancheslist);
    $branch = $form->Viven_AddSelect($br);
    $form_fields['Branch:'] = $branch;

    $type = array("name" => "type",
        "id" => "br",
        "class" => "none",
        "options" => array("Part time" => array("value" => "pt"),
                           "Full time" => array("value" => "ft")));
    $stfType = $form->Viven_AddSelect($type);
    $form_fields['Type:'] = $stfType;

    $shft = array("name" => "sft",
        "id" => "br",
        "class" => "none",
        "options" => array("Morning" => array("value" => "m"),
                           "Evening" => array("value" => "e")));
    $shtfType = $form->Viven_AddSelect($shft);
    $form_fields['Shift:'] = $shtfType;

    $sup = array("name" => "sn",
                "id" => "sn",
                "class" => "none",
                "options" => array_merge(array("Owner" => array("value" => "admin")), 
                                         $activeStafflist));
    $supervisor = $form->Viven_AddSelect($sup);
    $form_fields['Supervisor:'] = $supervisor;


    $doj = array("type" => "text",
        "name" => "doj",
        "id" => "doj",
        "size" => "27",
        "readonly" => "readonly",
        "class" => "none datepicker");
    $stfDOJ = $form->Viven_AddInput($doj);
    $form_fields['Date of Joining:'] = $stfDOJ;

    $dl = array("name" => "dsg",
        "id" => "dsg",
        "class" => "none",
        "options" => array("Trainer" => array("value" => "t"),
            "Frontdesk" => array("value" => "f"),
            "House keeping" => array("value" => "h"),
            "Manager" => array("value" => "m")));
    $dlist = $form->Viven_AddSelect($dl);
    $form_fields['Designation:'] = $dlist;

    $sal = array("type" => "text",
        "name" => "sal",
        "id" => "sal",
        "size" => "27",
        "class" => "none");
    $stfSal = $form->Viven_AddInput($sal);
    $form_fields['Salary:'] = $stfSal;

    $remarks = array("type" => "text",
        "name" => "rm",
        "id" => "date",
        "rows" => "3",
        "cols" => "27",
        "class" => "none");
    $aremarks = $form->Viven_AddText($remarks);
    $form_fields['Remarks:'] = $aremarks;

    $newemp = array("type" => "hidden",
        "name" => "newemp",
        "value" => "1");
    $newempArray = $form->Viven_AddInput($newemp);
    $form_fields[''] = $newempArray;

    $outForm = $form->Viven_ArrangeForm($form_fields, 2, 0, false);
    $this->view->employeeForm = $outForm;

    $this->view->render('employee/new', 'staff');
  }
  
  
  /**
   * Get List of all employees in a branch
   * @param type $type Employee Designation
   * @param type $status Employee Status (Active/Inactive/Suspended)
   * @param type $branch Branch of the employees
   * @return type
   */
  function getStaffListAction($type, $status, $branch='#%$^') {
    
    if($branch == '#%$^') $branch = 'all';//$_SESSION['branch'];
    $model = new Viven_Staff_Model;
    $slist = $model->getStaffList($type, $status, $branch);
    return $slist;
  }

}