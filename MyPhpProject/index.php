
<?php
session_start();

include_once('config/config.php');


function __autoload($class_name){
    if(file_exists("controllers/$class_name.php")){
        include "controllers/$class_name.php";
    }
    if(file_exists("models/$class_name.php")){
        include "models/$class_name.php";
    }
}


$requestPath = $_SERVER['REQUEST_URI'];
$projectRoot = '/'.basename(dirname(__FILE__)).'/';
$cleanedPath = substr($requestPath , strlen($projectRoot));
$requestParts = explode('/', $cleanedPath);

$controllerName = DEFAULT_CONTROLLER;
if($requestParts[0] != ''){
    if($requestParts[0] == 'users' && !isLoggedIn()){
        $controllerName = DEFAULT_CONTROLLER;
    }elseif($requestParts[0] == 'admin' && !isAdmin()){
        $controllerName = DEFAULT_CONTROLLER;
    }
    else{
        $controllerName = strtolower($requestParts[0]);
    }
    if (! preg_match('/^[a-zA-Z0-9_]+$/', $controllerName)) {
        die('Invalid controller name.');
    }
}

$actionName = DEFAULT_ACTION;
if(count($requestParts) > 1 && $requestParts[1] != ''){
    $actionName = $requestParts[1];
    if (! preg_match('/^[a-zA-Z0-9_]+$/', $actionName)) {
        die('Invalid action name.');
    }
}

$params = [];
if(count($requestParts) >= 3 && $requestParts[2] != ''){
    $params = array_splice($requestParts, 2);
}

$controllerClassName = ucfirst($controllerName) . 'Controller';
if(class_exists($controllerClassName)){
    $controller = new $controllerClassName();
    if(!method_exists($controller, $actionName)){
        $controller = new HomeController();
        $controller->listColumnists();
        $controller->renderView('home', 'listColumnists');



    }
    else if(method_exists($controller, $actionName)){
//        if($actionName == 'listOpinionsByColumnist' && !$params){
//            $params[] = 1;
//        }
        call_user_func_array(array($controller, $actionName), $params);
        $controller->renderView($controllerName, $actionName);



    }
}else{
    $controller = new HomeController();
    $controller->listColumnists();
    $controller->renderView('home', 'listColumnists');



}

function isLoggedIn(){
    if(isset($_SESSION['username'])){
        return true;
    }
    return false;
}

function isAdmin(){
    if(isset($_SESSION['admin'])){
        return true;
    }
    return false;
}






