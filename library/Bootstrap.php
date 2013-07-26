<?php

class Bootstrap {

  function __construct() {
    $temp_url = strtolower(trim($_SERVER['REQUEST_URI'], '/'));
    $url = explode('/', strtolower($temp_url));
    
    if(!VivenAuth::sessionExists()){
      
      require MODULES . '/user/controllers/login.php';   
      require MODULES . '/user/models/user.php';
        
      if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
        echo Viven_User_Login::getLoginForm(); 
      }
      else{        
        
        $controller = new Viven_User_Login();
        $controller->indexAction();
        
      }
    }
    else{
      
      require MODULES . '/api/controllers/generic.php';
      
      if (empty($url[0]) || empty($url[1])) {
        
        require MODULES . '/business/controllers/enquiry.php';
        $controller = new Viven_Business_Enquiry;
        $controller->newAction();
        
      }
      else{
        $classString = 'Viven_'.ucfirst($url[0]).'_'.ucfirst($url[1]);
        
        //if(file_exists(MODULES.'/'.$url[0].'/controllers/'.$url[1].'.php'))
        require MODULES.'/'.$url[0].'/controllers/'.$url[1].'.php';

        //if(class_exists($classString))
        $controller = new $classString;
        
        if(isset($url[2])){
          $action = $url[2].'Action';
          $controller -> $action();
        }
        else {
          $controller -> indexAction();
        }
      }
    }
  }
}