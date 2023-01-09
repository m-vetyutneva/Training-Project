<?php

class Patient extends Person
{
    private array $diseases = [];
    public function __construct(
        array  $info,
        string $prefix
    )
    {
        parent::__construct($info, $prefix);
    }

    public function setDiseases(): void
    {
        $diseasesFromFile = file(filename: '../data/diseases.txt');
        $countOfArray = count($diseasesFromFile);
        for ($i = 1; $i <= rand(1, 6); $i++) {
            $this->diseases[] = trim($diseasesFromFile[rand(0, $countOfArray - 1)], PHP_EOL);
        }
        $this->diseases = array_unique($this->diseases);
    }

    public function getDiseases(): array
    {
        return $this->diseases;
    }

}