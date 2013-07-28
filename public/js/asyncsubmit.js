$(document).ready(function(){
  
  function clearpopup(){
    
    setTimeout(function(){
                 $("#popupbox, #lightbox").fadeOut(400);
               }, 2000);
  } //End CLEARPOPUP
  

  /**
   * All the events from here on are responsible for AJAX processing of popup forms
   */
  
  // Process New Department Form
  $('#vf_dept').live('submit', function(){

    $.post('/business/department/new',
            $('#vf_dept').serialize(),
            function(data){
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });

    return false;
  }); // End VF_DEPT SUBMIT


  // Process New Branch Form
  $('#vf_brnch').live('submit', function(){
    $.post('/business/branch/new',
            $('#vf_brnch').serialize(),
            function(data){
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); // End VF_BRANCH SUBMIT
  
  
  // Process New User Form
  $('#vf_register').live('submit', function(){
    $.post('/user/register/new',
            $('#vf_register').serialize(),
            function(data){
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_USER SUBMIT
   
  
  // Process New User Role Form
  $('#vf_role').live('submit', function(){
    $.post('/user/roles/new',
            $('#vf_role').serialize(),
            function(data){
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_ROLE SUBMIT
   
  
  // Process Add Staff Attendance Form
  $('#vf_sattn').live('submit', function(){
    $.post('/staff/attendance/new',
            $('#vf_sattn').serialize(),
            function(data){
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_SATTN SUBMIT
   
  
  // Process Add Customer Attendance Form
  $('#vf_cattn').live('submit', function(){
    $.post('/customer/attendance/new',
            $('#vf_cattn').serialize(),
            function(data){
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_CATTN SUBMIT
   
  
  // Process Add New Service Form
  $('#vf_ns').live('submit', function(){
    $.post('/business/service/new',
            $('#vf_ns').serialize(),
            function(data){
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_ns SUBMIT
  
    
  // Process Add Customer Feedback Form
  $('#vf_cfdb').live('submit', function(){
    $.post('/customer/feedback/new',
            $('#vf_cfdb').serialize(),
            function(data){
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_cfdb SUBMIT
  
    
  // Process Add Staff Feedback Form
  $('#vf_sfdb').live('submit', function(){
    $.post('/staff/feedback/new',
            $('#vf_sfdb').serialize(),
            function(data){
              $("#popupbox").html("<div class='popBody'>" + data +"</div>");
              clearpopup();
            });       

    return false;

  }); //End VF_sfdb SUBMIT
  
  
}); // End DOCUMENT.READY