<div id='dept-form' class='bodyworks'>
  <h1>Department Add Result</h1>
  <?php
    
    if(isset($this -> status)){
      echo $this -> status;
    }
    else{
      //echo '<form method="post" action="/business/department/new">';
      echo $this -> form;
      //echo '<form>';
    }
  ?>
</div>

