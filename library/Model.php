<?php

class Model extends PDO{

  function __construct() {
    $this -> db = new PDO('mysql:host=localhost;dbname=gym_v2', 'root', 'vivenfarms');
  }

}
