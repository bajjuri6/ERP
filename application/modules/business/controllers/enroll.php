<?php

class Viven_Business_Enroll extends Controller{

  
  function __construct() {
    parent::__construct();
  }
  
  
  function newAction(){
    if(isset($_POST['enroll'])){      
      return 0;
    }else{
      
      $form = new Form();
      $form_fields = array();
      
      /**
       * Basics Sub-Form Elements
       */
      $date = array("type" => "input", 
                  "name" => "date",
                  "id" => "date",
                  "size" => "27",
                  "readonly" => "readonly",
                  "class" => "none datepicker");
      $adate = $form -> Viven_AddInput($date);
      $form_fields_basics['Date Of Joining:'] = $adate;
      
      
      $cn = array("type" => "text", 
                  "name" => "cn",
                  "id" => "cn",
                  "size" => "27",
                  "class" => "none");
      $cname = $form -> Viven_AddInput($cn);      
      $form_fields_basics['Customer Name:'] = $cname;
      
      
      $pn = array("type" => "text", 
                  "name" => "pn",
                  "id" => "pn",
                  "size" => "27",
                  "class" => "none");
      $pnumber = $form -> Viven_AddInput($pn);      
      $form_fields_basics['Phone Number:'] = $pnumber;
      
      
      $em = array("type" => "text", 
                  "name" => "em",
                  "id" => "em",
                  "size" => "27",
                  "class" => "none");
      $email = $form -> Viven_AddInput($em);      
      $form_fields_basics['Email Address:'] = $email;
      
      
      $branch = array("name" => "branch",
                      "id" => "branch",
                      "class" => "none",
                      "options" => array("branch one" => array("value" => "1"),
                                         "branch two" => array("value" => "2")
                                        ));
      $ibranch = $form ->Viven_AddSelect($branch);
      $form_fields_basics['Branch:'] = $ibranch;
      
      $service = array("name" => "service",
                      "id" => "service",
                      "class" => "none",
                      "options" => array("service one" => array("value" => "1"),
                                         "service two" => array("value" => "2")
                                        ));
      $iservice = $form ->Viven_AddSelect($service);
      $form_fields_basics['Service:'] = $iservice;
      
      //Get the First Sub Form of the Enrollment
      $basics = $form -> Viven_ArrangeForm($form_fields_basics,0,0,false);
      $this -> view -> basics = $basics;
      
      
      /**
       * Personal Sub-Form Elements
       */
      $dob = array("type" => "input", 
                  "name" => "date",
                  "id" => "date",
                  "size" => "27",
                  "readonly" => "readonly",
                  "class" => "none datepicker");
      $dobirth = $form -> Viven_AddInput($dob);
      $form_fields_personal['Date of Birth:'] = $dobirth;
      
      
      $marital = array("name" => "marital",
                      "id" => "marital",
                      "class" => "none",
                      "options" => array("Single" => array("value" => "1"),
                                         "Married" => array("value" => "2"),
                                         "Separated" => array("value" => "3")
                                        ));
      $imarital = $form ->Viven_AddSelect($marital);
      $form_fields_personal['Marital Status:'] = $imarital;
      
      $gender = array("name" => "gender",
                      "id" => "gender",
                      "class" => "none",
                      "options" => array("Male" => array("value" => "1"),
                                         "Female" => array("value" => "2")
                                        ));
      $igender = $form ->Viven_AddSelect($gender);
      $form_fields_personal['Gender:'] = $igender;
      
      
      $pro = array("type" => "text", 
                  "name" => "pro",
                  "id" => "pro",
                  "size" => "27",
                  "class" => "none");
      $profession = $form -> Viven_AddInput($pro);      
      $form_fields_personal['Profession:'] = $profession;
      
      
      //Get the First Sub Form of the Enrollment
      $personal = $form -> Viven_ArrangeForm($form_fields_personal,0,0,false);
      $this -> view -> personal = $personal;
      
      
      /**
       * Medical Sub-Form Elements
       */
      $smoke = array("name" => "smoke",
                      "id" => "smoke",
                      "class" => "none",
                      "options" => array("Never" => array("value" => "1"),
                                         "Occasionally" => array("value" => "2"),
                                         "Regularly" => array("value" => "3")
                                        ));
      $smoking = $form ->Viven_AddSelect($smoke);
      $form_fields_medical['Smoking:'] = $smoking;
      
      
      $alco = array("name" => "alcohol",
                      "id" => "alcohol",
                      "class" => "none",
                      "options" => array("Never" => array("value" => "1"),
                                         "Occasionally" => array("value" => "2"),
                                         "Regularly" => array("value" => "3")
                                        ));
      $alcohol = $form ->Viven_AddSelect($alco);
      $form_fields_medical['Alcohol:'] = $alcohol;
      
      
      /*$gender = array("name" => "gender",
                      "id" => "gender",
                      "class" => "none",
                      "options" => array("Male" => array("value" => "1"),
                                         "Female" => array("value" => "2")
                                        ));
      $igender = $form ->Viven_AddSelect($gender);
      $form_fields_medical['Gender:'] = $igender;
      
      
      $pro = array("type" => "text", 
                  "name" => "pro",
                  "id" => "pro",
                  "size" => "27",
                  "class" => "none");
      $profession = $form -> Viven_AddInput($pro);      
      $form_fields_medical['Profession:'] = $profession;
      */
      
      //Get the First Sub Form of the Enrollment
      $medical = $form -> Viven_ArrangeForm($form_fields_medical,0,0,false);
      $this -> view -> medical = $medical;
      
    }//End Else
    
    $this -> view -> render('enroll/index','business');
  } //End newAction

}