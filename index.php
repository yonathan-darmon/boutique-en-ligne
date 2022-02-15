<?php
//constante avec le chemin d'index.php
define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

require_once (ROOT.'controller/Controller.php');
require_once (ROOT.'model/Model.php');
//on sépare les parametres
$params = explode('/', $_GET['p']);
var_dump($params);
//on verifie les parametres

if (!empty($params[0])) {
    $controller = ucfirst($params[0]);
    //isset($params[1]) ? $params[1] : 'index';
    $action = $params [1] ?? 'index';
    require_once(ROOT . 'controller/' . $controller . '.php');
    $controller = new $controller();
    if(method_exists($controller,$action)){
        $controller->$action();

    }else{
        http_response_code(404);
        echo"La page demandée n'existe pas";
    }


} else {
    require_once (ROOT.'view/accueil.php');

}