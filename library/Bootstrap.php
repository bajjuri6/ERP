<?php

class Bootstrap {

  function __construct() {
    $temp_url = strtolower(trim($_SERVER['REQUEST_URI'], '/'));
    $url = explode('/', strtolower($temp_url));
    
    if(!VivenAuth::sessionExists()){
      
      require_once MODULES . '/user/controllers/login.php';   
      require_once MODULES . '/user/models/user.php';
        
      if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
        echo Viven_User_Login::getLoginForm(); 
      }
      else{        
        
        $controller = new Viven_User_Login();
        $controller->indexAction();
        
      }
    }
    else{
      
      require_once MODULES . '/api/controllers/generic.php';
      
      if (empty($url[0]) || empty($url[1])) {
        
        require_once MODULES . '/business/controllers/enquiry.php';
        $controller = new Viven_Business_Enquiry;
        $controller->newAction();
        
      }
      else{
        $classString = 'Viven_'.ucfirst($url[0]).'_'.ucfirst($url[1]);
        
        require_once MODULES.'/'.$url[0].'/controllers/'.$url[1].'.php';
        $controller = new $classString;
        
        if(isset($url[2])){
          
          /**
           * Check if the URL has any GET Parameters
           * If it does, separate the parameters and action components
           */
          if(strstr($url[2], '?')){
            
            $actionvsparam = explode('?', $url[2]);
            $action = $actionvsparam[0].'Action';
            
          }
          else{
          
          $action = $url[2].'Action';        
          
          }
          
          $controller -> $action();
        }
        else {
          $controller -> indexAction();
        }
      }
    }
  }
}