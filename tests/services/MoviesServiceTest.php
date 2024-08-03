<?php

require_once __DIR__ . '../src/models/Movie.php';
require_once __DIR__ . '../src/services/MoviesService.php';

use src\models\Movie;
use src\services\MoviesService;

class MoviesServiceTest {
    private $movieService;
    private $movies;

    public function __construct() {
        $this->movieService = new MoviesService();
        $this->movies = [
            new Movie("id","Castle in the Sky", "image","description","124"),
            new Movie("id","Kaze no Tani no Naushika", "image","description","10"),
            new Movie("id", "Grave of the Fireflies", "image","description","0"),
            new Movie("id", "My Neighbor Totoro", "image","description","150"),
            new Movie("id","Majo no takkyūbin","image","description","300"),
            new Movie("id","Arrietty", "image","description","30"),
        ];
    }

    private function assertEqual($expected, $actual, $message = '') {
        if ($expected !== $actual) {
            echo "Assertion Failed: $message\n";
            echo "Expected: $expected\n";
            echo "Actual: $actual\n";
        } else {
            echo "Assertion Passed: $message\n";
        }
    }

    private function assertTrue($condition, $message = '') {
        if (!$condition) {
            echo "Assertion Failed: $message\n";
        } else {
            echo "Assertion Passed: $message\n";
        }
    }

    public function testFilterByName() {
        $filteredMovies = $this->movieService->filterByNameAndTime($this->movies, "Castle", 0, "");

        $this->assertEqual(1, count($filteredMovies), 'filterByName should return 1 movie');
        $this->assertTrue(array_reduce($filteredMovies, function ($carry, $movie) {
            return $carry && $movie->getTitle() === "Castle in the Sky";
        }, true), 'Movie should be "Castle in the Sky"');
    }

    public function testFilterByRuntimeMore() {
        $filteredMovies = $this->movieService->filterByNameAndTime($this->movies, "", 100, "more");

        $this->assertEqual(3, count($filteredMovies), 'filterByRuntimeMore should return 3 movies');
        $this->assertTrue(array_reduce($filteredMovies, function ($carry, $movie) {
            return $carry && in_array($movie->getTitle(), ["Castle in the Sky", "My Neighbor Totoro", "Majo no takkyūbin"]);
        }, true), 'Movies should be "Castle in the Sky", "My Neighbor Totoro", or "Majo no takkyūbin"');
    }

    public function testFilterByRuntimeLess() {
        $filteredMovies = $this->movieService->filterByNameAndTime($this->movies, "", 100, "less");

        $this->assertEqual(3, count($filteredMovies), 'filterByRuntimeLess should return 3 movies');
        $this->assertTrue(array_reduce($filteredMovies, function ($carry, $movie) {
            return $carry && in_array($movie->getTitle(), ["Kaze no Tani no Naushika", "Grave of the Fireflies", "Arrietty"]);
        }, true), 'Movies should be "Kaze no Tani no Naushika", "Grave of the Fireflies", or "Arrietty"');
    }

    public function testFilterByNameAndRuntimeMore() {
        $filteredMovies = $this->movieService->filterByNameAndTime($this->movies, "Majo no takkyūbin", 150, "more");

        $this->assertEqual(1, count($filteredMovies), 'filterByNameAndRuntimeMore should return 1 movie');
        $this->assertTrue(array_reduce($filteredMovies, function ($carry, $movie) {
            return $carry && $movie->getTitle() === "Majo no takkyūbin";
        }, true), 'Movie should be "Majo no takkyūbin"');
    }

    public function testFilterByNameAndRuntimeLess() {
        $filteredMovies = $this->movieService->filterByNameAndTime($this->movies, "Arrietty", 100, "less");

        $this->assertEqual(1, count($filteredMovies), 'filterByNameAndRuntimeLess should return 1 movie');
        $this->assertTrue(array_reduce($filteredMovies, function ($carry, $movie) {
            return $carry && $movie->getTitle() === "Arrietty";
        }, true), 'Movie should be "Arrietty"');
    }

    public function testEmptyMoviesList() {
        $movies = [];
        $filteredMovies = $this->movieService->filterByNameAndTime($movies, "Movie", 100, "more");

        $this->assertTrue(empty($filteredMovies), 'Empty movies list should return an empty array');
    }

    public function testFilterWithEmptyNameAndZeroRuntime() {
        $filteredMovies = $this->movieService->filterByNameAndTime($this->movies, "", 0, "");

        $this->assertEqual(6, count($filteredMovies), 'filterWithEmptyNameAndZeroRuntime should return all movies');
    }
}

$test = new MoviesServiceTest();
$test->testFilterByName();
$test->testFilterByRuntimeMore();
$test->testFilterByRuntimeLess();
$test->testFilterByNameAndRuntimeMore();
$test->testFilterByNameAndRuntimeLess();
$test->testEmptyMoviesList();
$test->testFilterWithEmptyNameAndZeroRuntime();
