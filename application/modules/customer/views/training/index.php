<div id='trn-form' class='bodyworks'>
<h1>Subscribe service</h1>
  <form method="post" action="/customer/training/new">
  <?php
  if(isset($this -> msg)){
    echo $this -> msg;
  }
    echo $this -> personaltraining;
  ?>
  </form> 
</div>