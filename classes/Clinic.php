<?php


class Clinic
{
    private array $arrayDoctors = [];
    private array $arrayPatients = [];
    private array $fullArrayDoctorsId = [];
    private array $fullArrayPatientsId = [];
    private array $patientsId = [];
    private array $doctorsId = [];
    private string $nameClinic;


    public function __construct($nameClinic)
    {
        $this->nameClinic = $nameClinic;
    }

    public function getNameClinic(): string
    {
        return $this->nameClinic;
    }

    public function setDoctorsId(
        string $personId,
        int    $count
    ): void
    {
        $this->doctorsId[$count] = $personId;
    }

    public function getDoctorsId(string $count): string
    {
        return $this->doctorsId[$count];
    }

    public function setPatientsId(
        string $personId,
        int    $count
    ): void
    {
        $this->patientsId[$count] = $personId;
    }

    public function getPatientsId(string $count): string
    {
        return $this->patientsId[$count];
    }

    public function setFullArrayDoctorsId(
        string $personId,
        string $surname,
        string $name,
        int    $count
    ): void
    {
        $this->fullArrayDoctorsId[$count] = str_replace(PHP_EOL, ' ', "($personId) Dr. $name $surname");
    }

    public function getFullArrayDoctorsId(): array
    {
        return $this->fullArrayDoctorsId;
    }

    public function setFullArrayPatientsId(
        string $personId,
        string $surname,
        string $name,
        int    $count
    ): void
    {
        $this->fullArrayPatientsId[$count] = str_replace(PHP_EOL, '', "($personId) Patient — $name $surname");
    }

    public function getFullArrayPatientsId(): array
    {
        return $this->fullArrayPatientsId;
    }

    public function getArrayKeysDoctors(): array
    {
        return array_keys($this->arrayDoctors);
    }

    public function addPatientToDoctor(
        string $personId,
        string $member,
        string $patientId
    ): void
    {
        $this->arrayDoctors[$personId] = $this->arrayDoctors[$personId] . $member . "[$patientId]" . " ";
    }

    public function setArrayDoctors(
        string $personId,
        string $name,
        string $surname,
        string $specialization,
        int    $age,
        array  $arrayDoctorPatients
    ): void
    {
        $doctorInfo = "Dr. $name $surname; Age - $age; Specialization - $specialization;  Patients: " . implode($arrayDoctorPatients);
        $this->arrayDoctors[$personId] = $doctorInfo;
    }

    public function setArrayPatients(
        string $personId,
        string $name,
        string $surname,
        int    $age,
        array  $arrayDiseases,
        array  $arrayDrops,
    ): void
    {
        $this->arrayPatients[$personId] = "$name $surname, Age - $age, Diseases: " . implode(', ', $arrayDiseases) . PHP_EOL . "Therapy: " . implode(', ', $arrayDrops);
    }

    public function getArrayDoctors(): array
    {
        return $this->arrayDoctors;
    }

    public function getArrayPatients(): array
    {
        return $this->arrayPatients;
    }

    public function getDoctor(string $personId): string
    {
        return $this->arrayDoctors[$personId] . PHP_EOL;
    }

    public function getPatient(string $personId): string
    {
        return $this->arrayPatients[$personId] . PHP_EOL;
    }
}