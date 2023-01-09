<?php

class Therapy
{
    public function __construct(public $countDrops)
    {
    }

    public array $drops = [];
    public function setDrops(): void
        {
            $dropsFromFile = file(filename: '../data/drops.txt');
            $countOfArray = count($dropsFromFile);
            for ($i = 1; $i <= $this->countDrops; $i++) {
                $this->drops[] = trim($dropsFromFile[rand(0, $countOfArray - 1)], PHP_EOL);
            }

            $this->drops = array_unique($this->drops);
        }

    public function getDrops(): array
    {
        return $this->drops;
    }
}
