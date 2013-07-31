<div id='enr-form' class='bodyworks'>
  <h1>Customer Enrollment</h1>
  <form method="post"  id="vf_ceb">
    <div style="font-size: 1.4em; font-weight:700; text-align:left; margin: 20px 0px 20px 30px;"> Basic Information</div>
      <?php
        echo $this -> basics;
      ?>
  </form>
  
  <form method="post"  id="vf_cea">
    <div style="font-size: 1.4em; font-weight:700; text-align:left; margin: 20px 0px 20px 30px;"> Customer Files</div>
      <?php
        echo $this -> attachments;
      ?>
  </form>
  
  <form method="post"  id="vf_cep">
    
    <div style="font-size: 1.4em; font-weight:700; text-align:left; margin: 50px 0px 20px 30px;">Personal Information</div>
      <?php
        echo $this -> personal;
      ?>
  </form>
  
  <form method="post"  id="vf_cee">
    
    <div style="font-size: 1.4em; font-weight:700; text-align:left; margin: 50px 0px 20px 30px;">Emergency Contact Information</div>
      <?php
        echo $this -> emergency;
      ?>
  </form>
    
  <form method="post" id="vf_cem">
    <div style="font-size: 1.4em; font-weight:700; text-align:left; margin: 50px 0px 20px 30px;">Medical Information</div>
      <?php
        echo $this -> medical;
      ?>
  </form> 
    
  <form method="post" id="vf_cephy">
    <div style="font-size: 1.4em; font-weight:700; text-align:left; margin: 50px 0px 20px 30px;">Physical Evaluation Information</div>
      <?php
        echo $this -> physical;
      ?>
  </form> 
</div>

