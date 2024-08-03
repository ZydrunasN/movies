<?php
declare(strict_types=1);

use src\models\Movie;

class GhibliApiService {
    
    private const URL = "https://ghibliapi.dev/films?limit=200";


    public function apiCall(): Movie {
        $json = file_get_contents(self::URL);
        $data = json_decode($json, true);
    
        return new Movie($data['id'], $data['title'], $data['image'],$data["description"],$data["running_time"]);
    }
}