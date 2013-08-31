<script src="/public/js/jquery/jquery-ui.min.js"></script>
<script src="/public/js/popup.js"></script>
<script src="/public/js/asyncsubmit.js"></script>
<script src="/public/js/validate.js"></script>
<script type="text/javascript">
  /**
   * Datepicker script. To set a field for datepicker, set the class to 'datepicker'
   **/
  $('.datepicker').live('focus', function(){
    $(this).datepicker({
      showOn: 'focus', dateFormat : 'yy-mm-dd',
      onSelect: function(){
        $(this).datepicker("destroy");
      }
    });
  });
  
  

  
  
  /**
   * Get Customer Details based on Cust ID.
   **/
  $('.getud').live('blur', function(){
  
    $.post('/api/generic/validateUsername',
          $(this).val().serialize(),
          function(data){
            
            if(parseInt(data) == 1){
            
              alert("Username Exists");
             return false;
            
            }
            
          }); 
  
  });
  
  
  /**
  * Hide active popup and lightbox when lightbox area is clicked
  */
  $("#lightbox").click(function(){
    $("#popupbox").fadeOut(200);
    $("#lightbox").fadeOut(400);
  });
</script>

<link rel="stylesheet" type="text/css" href="/public/css/jquery-ui-1.9.2.custom.css">