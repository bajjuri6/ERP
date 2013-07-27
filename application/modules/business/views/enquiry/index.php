<div id='enq-form' class='bodyworks'>
  <h1>Customer Enquiry</h1>
  <form method="post" action="/business/enquiry/new">
  <?php
  if(isset($this -> msg)){
    echo $this -> msg;
  }
    echo $this -> enquiryform;
  ?>
  </form> 
</div>

