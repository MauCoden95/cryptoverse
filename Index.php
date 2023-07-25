<?php 
   
    require_once './Views/Layout/Header.php';
    require_once './Autoload.php';

    if (isset($_GET['controller'])) {
        $controller = $_GET['controller'].'Controller';

       
        if ($controller && class_exists($controller)) {
            $class = new $controller;

            if (isset($_GET['action']) && method_exists($class, $_GET['action'])) {
                $action = $_GET['action'];
                $class->$action();
            }else{
                $class->home();
            }
        }
    }else{
        require_once './Views/Home.php';
        
    }

      


    require_once './Views/Layout/Footer.php';
?>