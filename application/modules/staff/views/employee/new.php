<div id='emp-form' class='bodyworks'>
  
  <h1>Add New Employee</h1>
  <form method="post" action="/staff/employee/new">
  <?php
  if(isset($this -> msg)){
    echo $this -> msg;
  }
    echo $this -> employeeForm;
  ?>
  </form> 

</div>