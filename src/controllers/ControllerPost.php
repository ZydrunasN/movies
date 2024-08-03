<?php
namespace src\controllers;

require_once '../src/services/GhibliApiService.php';
require_once '../src/services/MoviesService.php';

use src\services\GhibliApiService;
use src\services\MoviesService;

class ControllerPost {
    public function submitFilters() {
        ob_start();
        $ghibliApiService = new GhibliApiService();
        $moviesService = new MoviesService();
        $movies = $ghibliApiService->apiCall();

        $name = $_POST["name"];
        $runtimeOption = $_POST["runtimeOption"];
        $time = isset($_POST['runtimeTo']) && is_numeric($_POST['runtimeTo']) ? (int)$_POST['runtimeTo'] : 0;
        
        $movies = $moviesService->filterByNameAndTime($movies,$name,$time,$runtimeOption);

        include '../src/views/home.php';
        return ob_get_clean();
    }
}
?>