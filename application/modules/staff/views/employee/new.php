<div id='emp-form' class='bodyworks'>
  
  <h1>Add New Employee</h1>
  <form id="vf_empbas" method="post">
    <div style="font-size: 1.4em; font-weight:700; text-align:left; margin: 20px 0px 20px 30px;"> Basic Information</div>
    <?php
      echo $this -> basics;
    ?>
  </form> 
  
  
  <form id="vf_empatt" method="post">
    <div style="font-size: 1.4em; font-weight:700; text-align:left; margin: 20px 0px 20px 30px;"> Customer Files</div>
    <?php
      echo $this -> attachments;
    ?>
  </form> 
  
  
  <form id="vf_empemer" method="post">
    <div style="font-size: 1.4em; font-weight:700; text-align:left; margin: 50px 0px 20px 30px;">Emergency Contact Information</div>
    <?php
      echo $this -> emergency;
    ?>
  </form> 
  
  
  <form id="vf_empper" method="post">
    <div style="font-size: 1.4em; font-weight:700; text-align:left; margin: 50px 0px 20px 30px;">Personal Information</div>
    <?php
      echo $this -> personals;
    ?>
  </form> 
  

</div>

<script type="text/javascript">
  
  $(document).ready(function(){
    
    $(".picknpush").blur(function(){
      
      $(".populateun").val($(".picknpush").val());
      
    });
    
  });
  
</script>