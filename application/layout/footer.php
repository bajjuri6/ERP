<script src="/public/js/popup.js"></script>
<script src="/public/js/jquery/jquery-ui.min.js"></script>
<script type="text/javascript">
  $('#date, #fd').datepicker({
    showOn: 'focus', dateFormat : 'yy-mm-dd'
  });
  
  /**
  * Hide active popup and lightbox when lightbox area is clicked
  */
  $("#lightbox").click(function(){
    $("#popupbox").fadeOut(200);
    $("#lightbox").fadeOut(400);
  });
    
  $('input[readonly="readonly"]').each(function(){$(this).attr('tabindex','-1');});
</script>

<link rel="stylesheet" type="text/css" href="/public/css/jquery-ui-1.9.2.custom.css">