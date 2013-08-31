<?php

class Viven_Customer_Personal extends Controller{

  function __construct() {
    parent::__construct();
  }
  
  
  
  public function getForm(){
    
    $form = new Form();
    $form_fields = array();

    $cid = array("type" => "text", 
              "name" => "cid",
              "id" => "cid",
              "size" => "27",
              "class" => "none getud populateun");
    $cidentity = $form -> Viven_AddInput($cid);
    $form_fields['Customer ID:'] = $cidentity;

   $dob = array("type" => "input", 
                "name" => "dob",
                "id" => "dob",
                "size" => "27",
                "readonly" => "readonly",
                "class" => "none datepicker");
    $dobirth = $form -> Viven_AddInput($dob);
    $form_fields['Date of Birth:'] = $dobirth;


    $marital = array("name" => "marital",
                    "id" => "marital",
                    "class" => "none",
                    "options" => array("Single" => array("value" => "S"),
                                       "Married" => array("value" => "M"),
                                       "Separated" => array("value" => "D")
                                      ));
    $imarital = $form ->Viven_AddSelect($marital);
    $form_fields['Marital Status:'] = $imarital;

    $gender = array("name" => "gender",
                    "id" => "gender",
                    "class" => "none",
                    "options" => array("Male" => array("value" => "M"),
                                       "Female" => array("value" => "F")
                                      ));
    $igender = $form ->Viven_AddSelect($gender);
    $form_fields['Gender:'] = $igender;


    $pro = array("type" => "text", 
                "name" => "pro",
                "id" => "pro",
                "size" => "27",
                "class" => "none");
    $profession = $form -> Viven_AddInput($pro);      
    $form_fields['Profession:'] = $profession;


    $ref = array("type" => "text", 
                "name" => "ref",
                "id" => "ref",
                "size" => "27",
                "class" => "none");
    $reference = $form -> Viven_AddInput($ref);      
    $form_fields['Referred By:'] = $reference;



    $per = array("type" => "hidden",
                  "name" => "per",
                  "value" => "1");
    $personalhidden = $form->Viven_AddInput($per);
    $form_fields[''] = $personalhidden;

    //Get the PERSONAL DETAILS Sub Form of the Enrollment
    $personal = $form -> Viven_ArrangeForm($form_fields,2,0,false);
    return $personal;
    
  }
  
  
  function newAction(){
    
    if(isset($_POST['per'])){
      
      require_once MODULES . '/customer/models/customer.php';
      $model = new Viven_Customer_Model;
      echo $model -> addPersonal($_POST);
      return;

    } //End Form Processing
    
    else{
      
      $this -> view -> personal = $this -> getForm();
      $this -> view -> render('personal/index','customer');
      
    }
  }
  
}