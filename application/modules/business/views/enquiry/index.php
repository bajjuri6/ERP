<div id='enq-form' class='bodyworks'>
  <h1>Customer Enquiry</h1>
  <form id="vf_enq" method="post">
  <?php
  if(isset($this -> msg)){
    echo $this -> msg;
  }
    echo $this -> enquiryform;
  ?>
  </form> 
</div>

