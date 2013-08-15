<?php
  require 'library/headers.php';
  if($_SESSION['level'] == 'Admin'){
?>
    <div class="bodyworks">
      <h2>Revenues</h2>
      <table class="reports-table">
        <?php

          foreach($ARH as $k){
            $tmp = explode(',' ,$k);
            print '<th class="' . $tmp[0] . '">' . $tmp[1] . '</th>';
           }


          foreach($this -> revenue as $key=>$val){
            echo '<tr>';
            foreach($ARI as $ref){
              if($ref=='_lgn_time')
                echo '<td>'.date('Y-m-d @ H:i',$val[$ref]).'</td>';
              else 
                echo '<td>'.$val[$ref].'</td>';
            }
            echo '</tr>';
          }
        ?>
      </table>
    </div>

    <div class="bodyworks">
      <h2>Expenses</h2>
      <table class="reports-table">
        <?php
          foreach($AEH as $k){
            $tmp = explode(',' ,$k);
            print '<th class="' . $tmp[0] . '">' . $tmp[1] . '</th>';
           }


          foreach($this -> expense as $key=>$val){
            echo '<tr>';
            foreach($AEI as $ref){
              if($ref=='_lgn_time')
                echo '<td>'.date('Y-m-d @ H:i',$val[$ref]).'</td>';
              else 
                echo '<td>'.$val[$ref].'</td>';
            }
            echo '</tr>';
          }
        ?>
      </table>
    </div>

    <div class="bodyworks">
      <h2>Enrollments</h2>
      <table class="reports-table">
        <?php

          foreach($ERH as $k){
            $tmp = explode(',' ,$k);
            print '<th class="' . $tmp[0] . '">' . $tmp[1] . '</th>';
           }
          foreach($this -> enrollment as $key=>$val){
            echo '<tr>';
            foreach($ERI as $ref){
              if($ref=='_cust_addedon')
                echo '<td>'.date('Y-m-d @ H:i',$val[$ref]).'</td>';
              else 
                echo '<td>'.$val[$ref].'</td>';
            }
            echo '</tr>';
          }
        ?>
      </table>
    </div>

<?php
  }
?>