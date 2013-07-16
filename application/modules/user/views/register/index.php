<div id='reg-form' class='bodyworks'>
  <?php
    if($_POST['reg']){
      echo $this -> regResult;
    }
    else{
      echo "<h1>Register Here</h1>";
      echo $this -> form;
    }
  ?>  
</div>