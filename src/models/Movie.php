<?php
declare(strict_types=1);

class Movie {
    private String $id;
    private String $title;
    private String $image;
    private String $description;
    private int $running_time;

    public function __construct(string $id, string $title, string $image, string $description, int $running_time) {
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

    public function getRunningTime(): int{
        return $this->running_time;
    }
}