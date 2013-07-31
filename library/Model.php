<?php

class Model extends PDO{
  function __construct() {
    $this -> db = new PDO('mysql:host=localhost;dbname=gym_v2', 'root', 'vivenfarms');
    $this -> eun = $this -> db -> qote($_SESSION['un']);
    $this -> ebranch = $this -> db -> qote($_SESSION['branch']);
  }

}
