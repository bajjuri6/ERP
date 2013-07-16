<?php
if($this -> error){
  echo $this -> error;
}
?>
<form name="install-db" method="post">
  Username: <input type="text" name="uname" /><br>
  Password: <input type="password" name="pwd" /><br>
  Confirm Password: <input type="password" name="c_pwd" /><br>
  <input type="hidden" name="code" value="<?php echo $this -> code; ?>" />
  <input type="submit" />
</form>