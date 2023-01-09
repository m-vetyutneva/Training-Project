<?php


class Doctor extends Person
{
    private array $arrayDoctorPatients;
    protected string $specialization;

    public function __construct(
        array  $info,
        string $prefix
    )
    {
        parent::__construct($info, $prefix);
        $this->arrayDoctorPatients = [];
    }

    public function getArrayDoctorPatients(): array
    {
        return $this->arrayDoctorPatients;
    }

    public function setSpecialization(): void
    {
        $this->specialization = file('../data/specialization.txt')[rand(0, 3)];
        $this->specialization = trim($this->specialization, PHP_EOL);
    }

    public function getSpecialization(): string
    {
        return $this->specialization;
    }
}