$(document).ready(function(){
  
  function clearpopup(){
    
    setTimeout(function(){
                 $("#popupbox, #lightbox").fadeOut(200);
               }, 2000);
  } //End CLEARPOPUP
  

  /**
   * All the events from here on are responsible for AJAX processing of forms
   */
  
  
  // Process New Department Form
  $('#vf_dept').live('submit', function(){

    $.post('/business/department/add',
            $('#vf_dept').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });

    return false;
  }); // End VF_DEPT SUBMIT


  // Process New Branch Form
  $('#vf_brnch').live('submit', function(){
    $.post('/business/branch/add',
            $('#vf_brnch').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); // End VF_BRANCH SUBMIT
  
  
  // Process New User Form
  $('#vf_register').live('submit', function(){
    $.post('/user/register/add',
            $('#vf_register').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_USER SUBMIT
   
  
  // Process New User Role Form
  $('#vf_role').live('submit', function(){
    $.post('/user/roles/add',
            $('#vf_role').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_ROLE SUBMIT
   
  
  // Process Add Staff Attendance Form
  $('#vf_sattn').live('submit', function(){
    $.post('/staff/attendance/add',
            $('#vf_sattn').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_SATTN SUBMIT
   
  
  // Process Add Customer Attendance Form
  $('#vf_cattn').live('submit', function(){
    $.post('/customer/attendance/add',
            $('#vf_cattn').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_CATTN SUBMIT
   
  
  // Process Add New Service Form
  $('#vf_ns').live('submit', function(){
    $.post('/business/service/add',
            $('#vf_ns').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_ns SUBMIT
  
    
  // Process Add Customer Feedback Form
  $('#vf_cfdb').live('submit', function(){
    $.post('/customer/feedback/add',
            $('#vf_cfdb').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_cfdb SUBMIT
  
    
  // Process Add Staff Feedback Form
  $('#vf_sfdb').live('submit', function(){
    $.post('/staff/feedback/add',
            $('#vf_sfdb').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_sfdb SUBMIT
  
  
  
  // Process New Expense Type Form    
  $('#vf_exptype').live('submit', function(){
    $.post('/business/generic/addExpenseType',
            $('#vf_exptype').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_CEB SUBMIT
  
  
  // Process New Payment Mode Form    
  $('#vf_pmode').live('submit', function(){
    $.post('/finance/mode/add',
            $('#vf_pmode').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_CEB SUBMIT
  
  
  // *********************************************************
  // Process Customer Enrollment Subforms
    
  // Process Enrollment Basics Form
  $('#vf_ceb').live('submit', function(){
    $.post('/business/enroll/addbasic',
            $('#vf_ceb').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_CEB SUBMIT
  
    
  // Process Enrollment Personal Details Form
  $('#vf_cep').live('submit', function(){
    $.post('/customer/personal/add',
            $('#vf_cep').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_CEP SUBMIT
  
    
  // Process Enrollment Emergency Contact Form
  $('#vf_cee').live('submit', function(){
    $.post('/customer/emergency/add',
            $('#vf_cee').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_sfdb SUBMIT
  
    
  // Process Enrollment Medical Details Form
  $('#vf_cem').live('submit', function(){
    $.post('/customer/medical/add',
            $('#vf_cem').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_CEM SUBMIT
  
    
  // Process Enrollment Medical Details Form
  $('#vf_cephy').live('submit', function(){
    $.post('/customer/physical/add',
            $('#vf_cephy').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_CEPHY SUBMIT

// End Processing Customer Enrollment Subforms
// *********************************************************



// *********************************************************
  // Process Revenue Form
    
  $('#vf_pmnt').live('submit', function(){
    $.post('/finance/revenue/add',
            $('#vf_pmnt').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_CEB SUBMIT
  
  
  
  // Process Customer Physical Form
    
  $('#vf_cphy').live('submit', function(){
    $.post('/customer/physical/add',
            $('#vf_cphy').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_CEB SUBMIT
  
  
  
  // Process New Expense
    
  $('#vf_expense').live('submit', function(){
    $.post('/finance/expense/add',
            $('#vf_expense').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_CEB SUBMIT
  
  
  
  // Process New Service Subscription
    
  $('#vf_nsub').live('submit', function(){
    $.post('/business/service/sub',
            $('#vf_nsub').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_SUB SUBMIT
  
  
  
  // Process New Enquiry Form
    
  $('#vf_enq').live('submit', function(){
    $.post('/business/enquiry/add',
            $('#vf_enq').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_ENQ SUBMIT
  
  
  
  // Process Change Password Form
    
  $('#vf_pass').live('submit', function(){
    $.post('/user/account/update',
            $('#vf_pass').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_ENQ SUBMIT
  
  
  /***************************************************************************
   * PROCESS NEW EMPLOYEE SUBFORMS
   */
  
  // Process Employee Basics Form
  $('#vf_empbas').live('submit', function(){

    $.post('/staff/employee/basics',
            $('#vf_empbas').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });

    return false;
  }); // End VF_EMPBAS SUBMIT

  
  // Process Employee Attachemnts Form
  $('#vf_empatt').live('submit', function(){

    $.post('/staff/employee/attachments',
            $('#vf_empatt').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });

    return false;
  }); // End VF_EMPATT SUBMIT
  
  
  // Process Employee Emergency Contact Form
  $('#vf_empemer').live('submit', function(){

    $.post('/staff/employee/emergency',
            $('#vf_empemer').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });

    return false;
  }); // End VF_EMPEMER SUBMIT
  
  
  // Process Employee Personals Form
  $('#vf_empper').live('submit', function(){

    $.post('/staff/employee/personals',
            $('#vf_empper').serialize(),
            function(data){
              $("#popupbox, #lightbox").fadeIn(200);
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });

    return false;
  }); // End VF_EMPPER SUBMIT
  
  //************************************************************************
  
  
}); // End DOCUMENT.READY