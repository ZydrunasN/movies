<?php
namespace src\controllers;

require_once '../src/services/GhibliApiService.php';

use src\services\GhibliApiService;

class ControllerGet {
    public function home() {
        ob_start();
        $ghibliApiService = new GhibliApiService();
        $movies = $ghibliApiService->apiCall();
        include '../src/views/home.php';
        return ob_get_clean();
    }

    public function notFound() {
        ob_start();
        echo '<h1>404 Not Found</h1>';
        return ob_get_clean();
    }
}
?>