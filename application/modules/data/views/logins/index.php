<div id="login-records-box" >
  <h1> Login Records for Your ERP</h1>
  <table class="reports-table">
    <?php
      //var_dump($this -> data);
      require 'library/headers.php';
      
      foreach($TH as $k){
        $tmp = explode(',' ,$k);
        print '<th class="' . $tmp[0] . '">' . $tmp[1] . '</th>';
       }
  
  
      foreach($this -> data as $key=>$val){
        echo '<tr>';
        foreach($TI as $ref){
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