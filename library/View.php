<?php

class View {

    function __construct() {
    }
    
    public function render($file, $module = null){
        require APP_PATH.'/layout/header.php';
        if($module){
          require MODULES."/$module/views/$file.php";
        }
        else{
          require APP_PATH."/views/$file.php";
        }
        require APP_PATH.'/layout/footer.php';
    }

}