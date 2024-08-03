<?php
namespace src\controllers;


class ControllerPost {
    public function submitFilters() {
        ob_start();
        include '../src/views/home.php';
        return ob_get_clean();
    }
}
?>