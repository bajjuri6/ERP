<?php

class Bootstrap {

  function __construct() {
    $temp_url = strtolower(trim($_SERVER['REQUEST_URI'], '/'));
    $url = explode('/', $temp_url);
    
    if (empty($url[0])) {
      
      require MODULES . '/default/controllers/index.php';
      $controller = new Default_Index();
      $controller->indexAction();
      
    } 
    
    else{
      switch($url[0]):
        case 'user':
          require MODULES . '/user/models/user.php';
          if(empty($url[1])){
            require MODULES . '/user/controllers/login.php';
            $controller = new User_Login();
            $controller->indexAction();
          } else{
            switch($url[1]):
              case 'login':
                require MODULES . '/user/controllers/login.php';
                $cmontroller = new User_Login();
                $cmontroller->indexAction();
                break;
              case 'logout':
                require MODULES . '/user/controllers/logout.php';
                $cmontroller = new User_Logout();
                $cmontroller->indexAction();
                break;
              case 'register':
                require MODULES . '/user/controllers/register.php';
                $controller = new User_Register();
                $controller->indexAction();
                break;
            endswitch;
          }
          break;          
      endswitch;
    }
    
  }
}