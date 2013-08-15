<?php

class Viven_Business_Enroll extends Controller{

  
  function __construct() {
    parent::__construct();
  }
  
  
  function newAction(){
    
    $dataController = new Viven_Api_Generic;
    $activeStafflist = $dataController->getActiveStaffAction('all');
    $activeServicesList = $dataController->getActiveServicesAction();
    
    $form = new Form();
    $form_fields_basics = array();
    $form_fields_personal = array();
    $form_fields_emergency = array();
    $form_fields_medical = array();
    $form_fields_physical = array();

    /**
     * Customer Basics Sub-Form
     */
    $cn = array("type" => "text", 
                "name" => "cn",
                "id" => "cn",
                "size" => "27",
                "class" => "none");
    $cname = $form -> Viven_AddInput($cn);      
    $form_fields_basics['Customer Name:'] = $cname;


    $username = array("type" => "text", 
                "name" => "un",
                "id" => "un",
                "size" => "27",
                "class" => "none validateun enrollbun");
    $uname = $form -> Viven_AddInput($username);      
    $form_fields_basics['Customer ID:'] = $uname;

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
    
    $addrss = array("name" => "addrss",
                    "id" => "addrss",
                    "rows" => "3",
                    "cols" => "27",
                    "class" => "none");
    $addrssarr = $form->Viven_AddText($addrss);
    $form_fields_basics['Address:'] = $addrssarr;
    
    $date = array("type" => "input", 
                "name" => "date",
                "id" => "date",
                "size" => "27",
                "readonly" => "readonly",
                "class" => "none datepicker");
    $adate = $form -> Viven_AddInput($date);
    $form_fields_basics['Date Of Joining:'] = $adate;
    
    
    //By default, the branch should be fetched from the logged in user information. Of course, this assumes that a person can add people to only his branches.
    /*$branch = array("name" => "branch",
                    "id" => "branch",
                    "class" => "none",
                    "options" => $activeBrancheslist);
    $ibranch = $form ->Viven_AddSelect($branch);
    $form_fields_basics['Branch:'] = $ibranch;*/

    $service = array("name" => "service",
                    "id" => "service",
                    "class" => "none",
                    "options" => $activeServicesList);
    $iservice = $form ->Viven_AddSelect($service);
    $form_fields_basics['Service:'] = $iservice;
    
    
    $tn = array("name" => "tn",
                "id" => "tn",
                "class" => "none",
                "options" => $activeStafflist);
    $tname = $form -> Viven_AddSelect($tn);
    $form_fields_basics['Customer Incharge:'] = $tname;



    $bas = array("type" => "hidden",
                  "name" => "basics",
                  "value" => "1");
    $basicshidden = $form->Viven_AddInput($bas);
    $form_fields_basics[''] = $basicshidden;

    //Get the First Sub Form of the Enrollment
    $basics = $form -> Viven_ArrangeForm($form_fields_basics,2,0,false);
    $this -> view -> basics = $basics;
    
    
    
    /**
     * Customer Attachments Sub-Form
     */
    $eaun = array("type" => "text", 
                "name" => "ecun",
                "id" => "ecun",
                "size" => "27",
                "class" => "none populateun");
    $eauname = $form -> Viven_AddInput($eaun);      
    $form_fields_attachments['Customer ID:'] = $eauname;


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
                  "name" => "attach",
                  "value" => "1");
    $attachmenthidden = $form->Viven_AddInput($attach);
    $form_fields_attachments[''] = $attachmenthidden;

    //Get the First Sub Form of the Enrollment
    $attachments = $form -> Viven_ArrangeForm($form_fields_attachments,2,0,false);
    $this -> view -> attachments = $attachments;
    
    
    
    /**
     * Emergency Sub-Form Elements
     */
    $ecun = array("type" => "text", 
                "name" => "ecun",
                "id" => "ecun",
                "size" => "27",
                "class" => "none populateun");
    $ecuname = $form -> Viven_AddInput($ecun);      
    $form_fields_emergency['Customer ID:'] = $ecuname;


    $en = array("type" => "text", 
                "name" => "en",
                "id" => "en",
                "size" => "27",
                "class" => "none");
    $ename = $form -> Viven_AddInput($en);
    $form_fields_emergency['Contact Name:'] = $ename;


    $ep = array("type" => "text", 
                "name" => "ep",
                "id" => "ep",
                "size" => "27",
                "class" => "none");
    $ephone = $form -> Viven_AddInput($ep);      
    $form_fields_emergency['Contact Number:'] = $ephone;
    
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
                  "name" => "emer",
                  "value" => "1");
    $emergencyhidden = $form->Viven_AddInput($emer);
    $form_fields_emergency[''] = $emergencyhidden;

    //Get the First Sub Form of the Enrollment
    $emergency = $form -> Viven_ArrangeForm($form_fields_emergency,2,0,false);
    $this -> view -> emergency = $emergency;


    /**
     * Personal Sub-Form Elements
     */
    $pcun = array("type" => "text", 
                "name" => "pcun",
                "id" => "pcun",
                "size" => "27",
                "class" => "none populateun");
    $pcuname = $form -> Viven_AddInput($pcun);      
    $form_fields_personal['Customer ID:'] = $pcuname;

   $dob = array("type" => "input", 
                "name" => "dob",
                "id" => "dob",
                "size" => "27",
                "readonly" => "readonly",
                "class" => "none datepicker");
    $dobirth = $form -> Viven_AddInput($dob);
    $form_fields_personal['Date of Birth:'] = $dobirth;


    $marital = array("name" => "marital",
                    "id" => "marital",
                    "class" => "none",
                    "options" => array("Single" => array("value" => "S"),
                                       "Married" => array("value" => "M"),
                                       "Separated" => array("value" => "D")
                                      ));
    $imarital = $form ->Viven_AddSelect($marital);
    $form_fields_personal['Marital Status:'] = $imarital;

    $gender = array("name" => "gender",
                    "id" => "gender",
                    "class" => "none",
                    "options" => array("Male" => array("value" => "M"),
                                       "Female" => array("value" => "F")
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


    $ref = array("type" => "text", 
                "name" => "ref",
                "id" => "ref",
                "size" => "27",
                "class" => "none");
    $reference = $form -> Viven_AddInput($ref);      
    $form_fields_personal['Referred By:'] = $reference;

    
    
    $per = array("type" => "hidden",
                  "name" => "per",
                  "value" => "1");
    $personalhidden = $form->Viven_AddInput($per);
    $form_fields_personal[''] = $personalhidden;

    //Get the PERSONAL DETAILS Sub Form of the Enrollment
    $personal = $form -> Viven_ArrangeForm($form_fields_personal,2,0,false);
    $this -> view -> personal = $personal;


    /**
     * Medical Sub-Form Elements
     */
    $mcun = array("type" => "text", 
                "name" => "mcun",
                "id" => "mcun",
                "size" => "27",
                "class" => "none populateun");
    $mcuname = $form -> Viven_AddInput($mcun);      
    $form_fields_medical['Customer ID:'] = $mcuname;

   $md = array("type" => "text", 
                "name" => "md",
                "id" => "md",
                "size" => "27",
                "readonly" => "readonly",
                "class" => "none datepicker");
    $mdate = $form -> Viven_AddInput($md);      
    $form_fields_medical['Date of Medical Check:'] = $mdate;

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

    $med = array("type" => "hidden",
                    "name" => "medical",
                    "value" => "1");
    $medicalhidden = $form->Viven_AddInput($med);
    $form_fields_medical[''] = $medicalhidden;
    

    //Get the First Sub Form of the Enrollment
    $medical = $form -> Viven_ArrangeForm($form_fields_medical,2,0,false);
    $this -> view -> medical = $medical;
    
    
    /**
     * Physical Sub-Form Elements
     */    

    $phycun = array("type" => "text", 
                "name" => "phycunun",
                "id" => "phycun",
                "size" => "27",
                "class" => "none populateun");
    $phyuname = $form -> Viven_AddInput($phycun);      
    $form_fields_physical['Customer ID:'] = $phyuname;

   $pd = array("type" => "text", 
                "name" => "pd",
                "id" => "pd",
                "size" => "27",
                "readonly" => "readonly",
                "class" => "none datepicker");
    $phydate = $form -> Viven_AddInput($pd);      
    $form_fields_physical['Date of Physical:'] = $phydate;

   $wt = array("type" => "text", 
                "name" => "wt",
                "id" => "wt",
                "size" => "27",
                "class" => "none");
    $weight = $form -> Viven_AddInput($wt);      
    $form_fields_physical['Weight:'] = $weight;

    
    $ht = array("type" => "text", 
                "name" => "ht",
                "id" => "ht",
                "size" => "27",
                "class" => "none");
    $height = $form -> Viven_AddInput($ht);
    $form_fields_physical['Height:'] = $height;

    
    $chst = array("type" => "text", 
                "name" => "chst",
                "id" => "chst",
                "size" => "27",
                "class" => "none");
    $chest = $form -> Viven_AddInput($chst);
    $form_fields_physical['Chest:'] = $chest;

    
    $sldr = array("type" => "text", 
                "name" => "sldr",
                "id" => "sldr",
                "size" => "27",
                "class" => "none");
    $shoulder = $form -> Viven_AddInput($sldr);      
    $form_fields_physical['Shoulder:'] = $shoulder;

    
    $wst = array("type" => "text", 
                "name" => "wst",
                "id" => "wst",
                "size" => "27",
                "class" => "none");
    $waist = $form -> Viven_AddInput($wst);      
    $form_fields_physical['Waist:'] = $waist;

    
    $bcp = array("type" => "text", 
                "name" => "bcp",
                "id" => "bcp",
                "size" => "27",
                "class" => "none");
    $bicep = $form -> Viven_AddInput($bcp);      
    $form_fields_physical['Bicep:'] = $bicep;

    
    $clf = array("type" => "text", 
                "name" => "clf",
                "id" => "clf",
                "size" => "27",
                "class" => "none");
    $calf = $form -> Viven_AddInput($clf);
    $form_fields_physical['Calf:'] = $calf;

    
    $premarks = array("type" => "text", 
                "name" => "premarks",
                "id" => "premarks",
                "rows" => "3",
                "cols" => "26",
                "class" => "none");
    $phyremarks = $form -> Viven_AddText($premarks);      
    $form_fields_physical['Comments on Physical:'] = $phyremarks;

    
    $phy = array("type" => "hidden",
                    "name" => "physical",
                    "value" => "1");
    $phyhidden = $form->Viven_AddInput($phy);
    $form_fields_physical[''] = $phyhidden;

    //Get the First Sub Form of the Enrollment
    $physical = $form -> Viven_ArrangeForm($form_fields_physical,2,0,false);
    $this -> view -> physical = $physical;
      
    $this -> view -> render('enroll/index','business');
  } //End newAction
  
  
  
  /**
   * Add Basic Customer Details
   * @return type Status update
   */
  function addbasicAction(){
    
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
      
      if (isset($_POST['basics'])) {

        /**
         * Verify that all required fields are set
         */
        foreach ($_POST as $option) {
          if (!$option) {
            echo "All fields are required";
            return;
          }
        }

        require_once MODULES . '/business/models/enroll.php';
        $model = new Viven_Enroll_Model;
        $res = $model -> addCustomer($_POST);

        if ($res == "SUCCESS") {

          /**
           * If basic information is successfully added, add a subscription to the service
           */
          require_once MODULES . '/business/models/service.php';
          $srvModel = new Viven_Service_Model;
          echo $srvModel -> addSub($_POST);

        }

        else {
          echo $res;
        } //End Else for checking return of addCustomer()

      } // End checking BASICS hidden element  
      
    } //End XMLHTTPREQUEST check
    
    else{
      header('location:/');
    }
    
  } // End addBasic()
  
  
  function getEnrollmentsAction($from = -1, $to = -1, $branch = 'all'){
    
    require_once MODULES . '/business/models/enroll.php';
    $model = new Viven_Enroll_Model;
    
    if($from == -1 || $to == -1) {
      $from = strtotime(date('Y-m-d',time() - 10*86400));
      $to = strtotime(date('Y-m-d',time()+86400));
    }
    
    return $model -> getEnrollments($from, $to, $branch);
  }

}