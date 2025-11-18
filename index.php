<?php
//Global setting
require_once 'config/global.php';
//We load the controller and execute the action
if (isset($_GET["controller"])) {
    // We load the instance of the corresponding controller
    $controllerObj = cargarControlador($_GET["controller"]);
    //We launch the action
    launchAction($controllerObj);
} else {
    // We load the default controller instance
    $controllerObj = cargarControlador(CONTROLLER_DEFECTO);
    // We launch the action
    launchAction($controllerObj);
}
function cargarControlador($controller)
{
    isValidRequest($controller);
    switch ($controller) {
        case 'user':
            $strFileController = 'controller/userController.php';
            require_once $strFileController;
            $controllerObj = new usersController();
            break;
        case 'dashboard':
            $strFileController = 'controller/dashboardController.php';
            require_once $strFileController;
            $controllerObj = new dashboardController();
            break;
        case 'teacher':
            $strFileController = 'controller/teacherController.php';
            require_once $strFileController;
            $controllerObj = new teacherController();
            break;
        default:
            $strFileController = 'controller/userController.php';
            require_once $strFileController;
            $controllerObj = new usersController();
            break;
    }
    return $controllerObj;
}
function launchAction($controllerObj)
{
    if (isset($_GET["action"])) {
        $controllerObj->run($_GET["action"]);
    } else {
        $controllerObj->run(DEFECT_ACTION);
    }
}

function isValidRequest($controller){
    // checking every request before processing (checking if session is created or not)
    session_start();
    if (!isset($_SESSION['id']) && $controller != 'user') {
         header("Location: " . '?controller=user');
    }
    if(isset($_SESSION["id"]))
    {
        if(time()-$_SESSION["login_time_stamp"] > 500) 
        {
            session_unset();
            session_destroy();
                header("Location: " . '?controller=user');
        } else {
            $_SESSION["login_time_stamp"] = time(); 
        }
    }
}
