<div id='enr-form' class='bodyworks'>
  <h1>Customer Enrollment</h1>
  <form method="post" action="/business/enroll/new">
    <div style="font-size: 1.4em; font-weight:700; text-align:left; margin: 20px 0px 20px 30px;"> Basic Information</div>
      <?php
        echo $this -> basics;
      ?>
    
    <div style="font-size: 1.4em; font-weight:700; text-align:left; margin: 50px 0px 20px 30px;">Personal Information</div>
      <?php
        echo $this -> personal;
      ?>
    
    <div style="font-size: 1.4em; font-weight:700; text-align:left; margin: 50px 0px 20px 30px;">Medical Information</div>
      <?php
        echo $this -> medical;
      ?>
  </form> 
</div>

