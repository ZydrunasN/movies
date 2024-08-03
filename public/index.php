<?php

use src\controllers\ControllerGet;
use src\controllers\ControllerPost;

require_once '../src/controllers/ControllerGet.php';
require_once '../src/controllers/ControllerPost.php';

$controllerGet = new ControllerGet();
$controllerPost = new ControllerPost();


$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if ($page === 'home') {
            echo $controllerGet->home();
        } else {
            echo $controllerGet->notFound();
        }
        break;
    case 'POST':
        if ($page === 'submitFilters') {
            echo $controllerPost->submitFilters();
        }
        break;
    default:
        echo $controllerGet->notFound();
        break;
}
?>