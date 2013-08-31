<div id='enr-form' class='bodyworks'>
  <h1>Customer Enrollment</h1>
  <form id="vf_ceb" method="post">
    <div style="font-size: 1.4em; font-weight:700; text-align:left; margin: 20px 0px 20px 30px;"> Basic Information</div>
      <?php
        echo $this -> basics;
      ?>
  </form>
  
  <form id="vf_cea" method="post">
    <div style="font-size: 1.4em; font-weight:700; text-align:left; margin: 20px 0px 20px 30px;"> Customer Files</div>
      <?php
        echo $this -> attachments;
      ?>
  </form>
  
  <form id="vf_cep" method="post">
    
    <div style="font-size: 1.4em; font-weight:700; text-align:left; margin: 50px 0px 20px 30px;">Personal Information</div>
      <?php
        echo $this -> personal;
      ?>
  </form>
  
  <form id="vf_cee" method="post">
    
    <div style="font-size: 1.4em; font-weight:700; text-align:left; margin: 50px 0px 20px 30px;">Emergency Contact Information</div>
      <?php
        echo $this -> emergency;
      ?>
  </form>
    
  <form id="vf_cem" method="post">
    <div style="font-size: 1.4em; font-weight:700; text-align:left; margin: 50px 0px 20px 30px;">Medical Information</div>
      <?php
        echo $this -> medical;
      ?>
  </form> 
    
  <form id="vf_cephy" method="post">
    <div style="font-size: 1.4em; font-weight:700; text-align:left; margin: 50px 0px 20px 30px;">Physical Evaluation Information</div>
      <?php
        echo $this -> physical;
      ?>
  </form> 
</div>

<script type="text/javascript">
  $(document).ready(function(){
  
      
      $(".enrollbun").blur(function(){
      
        $(".populateun").val($(".enrollbun").val());
      
      });
      
      /**
      * Customer ID Validation.
      **/
      $('.validateun').live('blur', function(){
        $.post('/api/customer/validateCustomerId',
              $(this).serialize(),
              function(data){

                if(parseInt(data) == 1){

                  alert("Username Exists");
                  return false;

                }

              }); 

     });

  });
  
  
    
</script>