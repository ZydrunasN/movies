<?php
namespace src\controllers;


class ControllerGet {
    public function home() {
        ob_start();
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