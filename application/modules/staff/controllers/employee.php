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


    $id = array("type" => "text",
        "name" => "eid",
        "id" => "eid",
        "class" => "none picknpush validateun",
        "size" => "27");
    $eid = $form->Viven_AddInput($id);
    $form_fields['Employee ID (No Spaces):'] = $eid;


    $br = array("name" => "branch",
        "id" => "branch",
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
        "name" => "empbas",
        "value" => "1");
    $newempArray = $form->Viven_AddInput($newemp);
    $form_fields[''] = $newempArray;

    $outForm = $form->Viven_ArrangeForm($form_fields, 2, 0, false);
    $this->view->basics = $outForm;


    /**
    * Customer Attachments Sub-Form
    */
   $eaun = array("type" => "text", 
               "name" => "ecun",
               "id" => "ecun",
               "size" => "27",
               "class" => "none populateun");
   $eauname = $form -> Viven_AddInput($eaun);      
   $form_fields_attachments['Employee ID:'] = $eauname;


   $fl = array("type" => "file", 
               "name" => "doc",
               "id" => "doc",
               "size" => "27",
               "class" => "none");
   $file = $form->Viven_AddInput($fl);
   $form_fields_attachments['Attach:'] = $file;

   $ac = array("name" => "ac",
                   "id" => "ac",
                   "rows" => "2",
                   "cols" => "26",
                   "class" => "none");
   $acomments = $form -> Viven_AddText($ac);      
   $form_fields_attachments['Comments:'] = $acomments;


   $attach = array("type" => "hidden",
                 "name" => "empattach",
                 "value" => "1");
   $attachmenthidden = $form->Viven_AddInput($attach);
   $form_fields_attachments[''] = $attachmenthidden;

   //Get the First Sub Form of the Enrollment
   $attachments = $form -> Viven_ArrangeForm($form_fields_attachments,2,0,false);
   $this -> view -> attachments = $attachments;



   /**
    * Emergency Sub-Form Elements
    */
   $eeun = array("type" => "text", 
               "name" => "eeun",
               "id" => "eeun",
               "size" => "27",
               "class" => "none populateun");
   $eeuname = $form -> Viven_AddInput($eeun);      
   $form_fields_emergency['Employee ID:'] = $eeuname;


   $ecn = array("type" => "text", 
               "name" => "ecn",
               "id" => "ecn",
               "size" => "27",
               "class" => "none");
   $ecname = $form -> Viven_AddInput($ecn);
   $form_fields_emergency['Emer Contact Name:'] = $ecname;


   $ep = array("type" => "text", 
               "name" => "ep",
               "id" => "ep",
               "size" => "27",
               "class" => "none");
   $ephone = $form -> Viven_AddInput($ep);      
   $form_fields_emergency['Emer Contact Number:'] = $ephone;

   $eem = array("type" => "text", 
               "name" => "eem",
               "id" => "eem",
               "size" => "27",
               "class" => "none");
   $eemail = $form->Viven_AddInput($eem);
   $form_fields_emergency['Email Address:'] = $eemail;

   $eaddr = array("name" => "eaddr",
                   "id" => "eaddr",
                   "rows" => "3",
                   "cols" => "26",
                   "class" => "none");
   $eaddress = $form -> Viven_AddText($eaddr);      
   $form_fields_emergency['Contact Address:'] = $eaddress;

   $erem = array("name" => "eremarks",
                 "id" => "eremarks",
                 "rows" => "3",
                 "cols" => "26",
                 "class" => "none");
   $eremarks = $form -> Viven_AddText($erem);
   $form_fields_emergency['Contact Notes:'] = $eremarks;

   $emer = array("type" => "hidden",
                 "name" => "empemer",
                 "value" => "1");
   $emergencyhidden = $form->Viven_AddInput($emer);
   $form_fields_emergency[''] = $emergencyhidden;

   //Get the First Sub Form of the Enrollment
   $emergency = $form -> Viven_ArrangeForm($form_fields_emergency,2,0,false);
   $this -> view -> emergency = $emergency;


   /**
    * Personal Sub-Form Elements
    */
   $epun = array("type" => "text", 
               "name" => "epun",
               "id" => "epun",
               "size" => "27",
               "class" => "none populateun");
   $epuname = $form -> Viven_AddInput($epun);
   $form_fields_personal['Employee ID:'] = $epuname;

  $dob = array("type" => "input", 
               "name" => "epdob",
               "id" => "epdob",
               "size" => "27",
               "readonly" => "readonly",
               "class" => "none datepicker");
   $dobirth = $form -> Viven_AddInput($dob);
   $form_fields_personal['Date of Birth:'] = $dobirth;


   $marital = array("name" => "epmarital",
                   "id" => "epmarital",
                   "class" => "none",
                   "options" => array("Single" => array("value" => "S"),
                                      "Married" => array("value" => "M"),
                                      "Separated" => array("value" => "D")
                                     ));
   $imarital = $form ->Viven_AddSelect($marital);
   $form_fields_personal['Marital Status:'] = $imarital;

   $gender = array("name" => "epgender",
                   "id" => "epgender",
                   "class" => "none",
                   "options" => array("Male" => array("value" => "M"),
                                      "Female" => array("value" => "F")
                                     ));
   $igender = $form ->Viven_AddSelect($gender);
   $form_fields_personal['Gender:'] = $igender;


   $eppn = array("type" => "text",
                "name" => "eppn",
                "id" => "eppn",
                "rows" => "3",
                "cols" => "26",
                "class" => "none");
   $epphnumber = $form -> Viven_AddInput($eppn);      
   $form_fields_personal['Phone Number:'] = $epphnumber;


   $addr = array("name" => "epaddr",
                "id" => "epaddr",
                "rows" => "3",
                "cols" => "26",
                "class" => "none");
   $address = $form -> Viven_AddText($addr);      
   $form_fields_personal['Address:'] = $address;
   
   
   $per = array("type" => "hidden",
                 "name" => "empper",
                 "value" => "1");
   $personalhidden = $form->Viven_AddInput($per);
   $form_fields_personal[''] = $personalhidden;

   //Get the PERSONAL DETAILS Sub Form of the Enrollment
   $personal = $form -> Viven_ArrangeForm($form_fields_personal,2,0,false);
   $this -> view -> personals = $personal;


  $this->view->render('employee/new', 'staff');
  }
  
  
  
  /**
   * 
   */
  function basicsAction(){
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if (isset($_POST['empbas'])) {
        foreach ($_POST as $option) {
          if (!$option) {
            $error = true;
            break;
          }
        }

        if (isset($error)) {

          echo 'All fields are required!';

        } 

        else {
          $model = new Viven_Staff_Model();
          $res = $model->addEmployeeBasics($_POST);
          echo $res;

        } //End form processing

      } // End hidden field check
      
    } // End XMLHTTPREQUEST check
    
  }
  
  
  function attachmentsAction(){
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      if(isset($_POST['empattach'])) {
        foreach ($_POST as $option) {
          if (!$option) {
            $error = true;
            break;
          }
        }

        if (isset($error)) {

          echo 'All fields are required!';

        } 

        else {
          $model = new Viven_Staff_Model();
          $res = $model->addEmployeeAttachments($_POST);
          echo $res;

        } //End form processing

      } // End hidden field check
      
    } // End XMLHTTPREQUEST check
    
  }
  
  
  function emergencyAction(){
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if (isset($_POST['empemer'])) {
        foreach ($_POST as $option) {
          if (!$option) {
            $error = true;
            break;
          }
        }

        if (isset($error)) {

          echo 'All fields are required!';

        } 

        else {
          $model = new Viven_Staff_Model();
          $res = $model->addEmployeeEmergency($_POST);
          echo $res;

        } //End form processing

      } // End hidden field check
      
    } // End XMLHTTPREQUEST check
    
  }
  
  
  function personalsAction(){
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if (isset($_POST['empper'])) {
        foreach ($_POST as $option) {
          if (!$option) {
            $error = true;
            break;
          }
        }

        if (isset($error)) {

          echo 'All fields are required!';

        } 

        else {
          $model = new Viven_Staff_Model();
          $res = $model->addEmployeePersonals($_POST);
          echo $res;

        } //End form processing

      } // End hidden field check
      
    } // End XMLHTTPREQUEST check
    
  }
  
  
  /**
   * Get List of all employees in a branch
   * @param type $dsg Employee Designation
   * @param type $status Employee Status (Active/Inactive/Suspended)
   * @param type $branch Branch of the employees
   * @return type
   */
  function getStaffListAction($dsg, $status, $branch) {
    
    $model = new Viven_Staff_Model;
    $slist = $model->getStaffList($dsg, $status, $branch);
    return $slist;
  }

}