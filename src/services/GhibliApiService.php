<?php
declare(strict_types=1);

namespace src\services;

require_once '../src/models/Movie.php';

use src\models\Movie;

class GhibliApiService {
    
    private const URL = "https://ghibliapi.dev/films?limit=200";


    public function apiCall(): array {
        $json = file_get_contents(self::URL);
        
        if ($json === false) {
            error_log("Failed to fetch data from API: " . self::URL);
            return [];
        }

        $data = json_decode($json, true);

        if (!is_array($data)) {
            error_log("Invalid data format received from API:" . self::URL);
            return [];
        }

        $movies = [];
        foreach ($data as $item) {
            if (isset($item['id'], $item['title'], $item['image'], $item['description'], $item['running_time'])) {
                $movies[] = new Movie(
                    $item['id'],
                    $item['title'],
                    $item['image'],
                    $item['description'],
                    $item['running_time']
                );
            }
        }

        return $movies;
    }
}