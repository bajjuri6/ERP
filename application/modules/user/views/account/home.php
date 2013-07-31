<?php
  if($_SESSION['level'] == 1){
?>

    <div class="bodyworks">
      <h2>Part One</h2>
      <?php
        echo $this -> data1;
      ?>
    </div>

    <div class="bodyworks">
      <h2>Part Two</h2>
      <?php
        echo $this -> data2;
      ?>
    </div>

    <div class="bodyworks">
      <h2>Part Three</h2>
      <?php
        echo $this -> data3;
      ?>
    </div>

<?php
  }
?>