<div id='followup-form' class=' bodyworks'>
  <h1>Customer Followup</h1>
  <form id='vf_flwup' method="post">
  <?php
    echo $this -> followupform;
  ?>
  </form> 
</div>

<script type="text/javascript">
  
  $(document).ready(function(){
  
    // Get Customer Details from Enquiry ID for Follow-up
    $('.getenquirydetails').live('blur', function(){
      if( $('select[name=eid]').val() == 0 ) return false;
      $.post('/business/enquiry/getDetails',
              $('select[name=eid]').serialize(),
              function(data){
                data = JSON.parse(data);
                $("#cn").val(data['_inq_cus_name']);
                $("#pn").val(data['_inq_cus_pnum']);
                $("#question").val(data['_inq_inq_cmnts']);
                $("#idt").val(new Date(parseInt(data['_inq_time'])*1000));
              });

      return false;
    }); // End getEnquiryDetails
    
    
    // Process Followup Form
    $('#vf_flwup').live('submit', function(){

      $.post('/business/followup/new',
              $('#vf_flwup').serialize(),
              function(data){
                $("#popupbox, #lightbox").fadeIn(200);
                $("#popupbox").html("<div class='popBody'>" + data +"</div>");
                clearpopup();
              });

      return false;
    }); // End VF_DEPT SUBMIT

  }); // End DOCUMENT.READY
  
</script>

