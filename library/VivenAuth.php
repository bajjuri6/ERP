<?php

class VivenAuth {

  function sessionExists(){
    if(isset($_SESSION['un']) && isset($_SESSION['level'])) return true;
    else return false;
  }
  
  function setSession($un, $level){
    $_SESSION['un'] = $un;
    $_SESSION['level'] = $level;    
  }
}