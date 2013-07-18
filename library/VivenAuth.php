<?php

class VivenAuth {

  function sessionExists(){
    if(isset($_SESSION['un']) && isset($_SESSION['level'])) return true;
    else return false;
  }
  
  function setSession($un, $level, $branch){
    $_SESSION['un'] = $un;
    $_SESSION['level'] = $level;
    $_SESSION['branch'] = $branch;
  }
}