<?php

class Model extends PDO{
  function __construct() {
    $this -> db = new PDO('mysql:host=localhost;dbname=gym_v7', 'root', 'vivenfarms');
    $this -> eun = $this -> db -> quote($_SESSION['un']);
    $this -> ebranch = $this -> db -> quote($_SESSION['branch']);
  }

}
