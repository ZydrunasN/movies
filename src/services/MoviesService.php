<?php
declare(strict_types=1);

namespace src\services;

require_once '../src/models/Movie.php';

use src\models\Movie;

class MoviesService {
    
    public function filterByNameAndTime(array $movies, ?string $name, int $runtime, string $runtimeOption): array {
        if (empty($movies)) {
            error_log("Empty movies array at MovieService::filterByNameAndTime");
            return [];
        }

        if (($name === null || $name === '') && $runtime === 0) {
            if ($runtimeOption === 'more') {
                return $movies;
            }
            if ($runtimeOption === 'less') {
                return [];
            }
        }

        $movies = array_filter($movies, function (Movie $movie) use ($name) {
            return stripos($movie->getTitle(), $name) !== false;
        });

        if ($runtimeOption === 'more') {
            $movies = array_filter($movies, function (Movie $movie) use ($runtime) {
                return $movie->getRunningTime() > $runtime;
            });
        } elseif ($runtimeOption === 'less') {
            $movies = array_filter($movies, function (Movie $movie) use ($runtime) {
                return $movie->getRunningTime() < $runtime;
            });
        }

        return array_values($movies);
    }
}