<?php

# definir constante para controlar o fluxo da aplicação 
define('CONTROL', true);
// die('teste');
# incluindo o arquivo de rotas 
$routes = include_once 'inc/routes.php';
require_once 'inc/api_consumer.php';

# definindo a rota 
$route = $_GET['route'] ?? 'home';

if(!in_array($route, $routes)){
    $route = '404';
}

# fluxo das rotas
switch($route){
    case "home":
        require_once 'inc/header.php';
        require_once 'scripts/home.php';
        require_once 'inc/footer.php';
        break;
    case "404":
        require_once 'inc/header.php';
        require_once 'scripts/404.php';
        require_once 'inc/footer.php';
        break;
    case "ajax_resultado":
        require_once 'inc/header.php';
        require_once 'scripts/ajax_resultado.php';
        require_once 'inc/footer.php';
        break;
}