<?php

class Bootstrap {

  function __construct() {
    $temp_url = strtolower(trim($_SERVER['REQUEST_URI'], '/'));
    $url = explode('/', strtolower($temp_url));
    
    if(!VivenAuth::sessionExists()){
      
      require MODULES . '/user/controllers/login.php';   
      require MODULES . '/user/models/user.php';
      $controller = new Viven_User_Login();
      $controller->indexAction();
      
    }
    else{
    
      if (empty($url[0]) || empty($url[1])) {
        
        require MODULES . '/business/controllers/enquiry.php';
        $controller = new Viven_Business_Enquiry;
        $controller->newAction();
        /*require MODULES . '/error/controllers/invalid.php';
        $controller = new Viven_Error_Invalid;
        $controller->indexAction();*/
        
      }
      else{
        $classString = 'Viven_'.ucfirst($url[0]).'_'.ucfirst($url[1]);
        
        if(file_exists(MODULES.'/'.$url[0].'/controllers/'.$url[1].'.php'))
          require MODULES.'/'.$url[0].'/controllers/'.$url[1].'.php';

        if(class_exists($classString))
          $controller = new $classString;
        
        if(isset($url[2])){
          $action = $url[2].'Action';
          $controller -> $action();
        }else $controller -> indexAction();
        
      }
    }
  }
}