<?php
declare(strict_types=1);

namespace src\models;

class Movie {
    private string $id;
    private string $title;
    private string $image;
    private string $description;
    private string $running_time;

    public function __construct(string $id, string $title, string $image, string $description, string $running_time) {
        $this->id = $id;
        $this->title = $title;
        $this->image = $image;
        $this->description = $description;
        $this->running_time = $running_time;
    }

    public function getId(): string{
        return $this->id;
    }

    public function getTitle(): string{
        return $this->title;
    }

    public function getImage(): string{
        return $this->image;
    }

    public function getDescription(): string{
        return $this->description;
    }

    public function getRunningTime(): string{
        return $this->running_time;
    }
}