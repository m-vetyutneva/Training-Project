<?php

class FillFunctions
{
    public int $number = 0;

    public static function fillMember(): array
    {
        $dataFromFile = [
            'name' => file('../data/firstNames.txt')[rand(0, count(file('../data/firstNames.txt')) - 1)],
            'surname' => file('../data/secondNames.txt')[rand(0, count(file('../data/secondNames.txt')) - 1)],
            'age' => rand(18, 90) . PHP_EOL,
        ];
        $dataFromFile['name'] = trim($dataFromFile['name'], PHP_EOL);
        $dataFromFile['surname'] = trim($dataFromFile['surname'], PHP_EOL);
        return $dataFromFile;
    }

    public function setNumberFromKeyboard()
    {
        $this->number = readline();
    }

    public static function fillInfo(
        string $nameClinic,
        int    $amountDoctors,
        int    $amountPatients
    ): object
    {
        $clinic = new Clinic($nameClinic);
        echo PHP_EOL . 'Welcome to the "' . $clinic->getNameClinic() . '"' . PHP_EOL;
        for ($i = 1; $i <= $amountDoctors; $i++) {
            $doctor = new Doctor(
                info: FillFunctions::fillMember(),
                prefix: 'D'
            );
            $doctor->setSpecialization();
            $clinic->setArrayDoctors(
                personId: $doctor->getPersonId(),
                name: $doctor->getName(),
                surname: $doctor->getSurname(),
                specialization: $doctor->getSpecialization(),
                age: $doctor->getAge(),
                arrayDoctorPatients: $doctor->getArrayDoctorPatients()
            );

            $clinic->setFullArrayDoctorsId(
                personId: $doctor->getPersonId(),
                surname: $doctor->getSurname(),
                name: $doctor->getName(),
                count: $i
            );

            $clinic->setDoctorsId(
                personId: $doctor->getPersonId(),
                count: $i
            );
        }

        for ($i = 1; $i <= $amountPatients; $i++) {
            $patient = new Patient(
                info: FillFunctions::fillMember(),
                prefix: 'P'
            );
            echo 'set amount of pharmacy for patient ' . $patient->getName() . PHP_EOL;
            $countDrops = readline();
            $drops = new Therapy($countDrops);
            $patient->setDiseases();
            $drops->setDrops();
            $clinic->setArrayPatients(
                personId: $patient->getPersonId(),
                name: $patient->getName(),
                surname: $patient->getSurname(),
                age: $patient->getAge(),
                arrayDiseases: $patient->getDiseases(),
                arrayDrops: $drops->getDrops()
            );

            $count = rand(0, $amountDoctors - 1);
            $id = $clinic->getArrayKeysDoctors();

            $clinic->addPatientToDoctor(
                personId: $id[$count],
                member: $patient->getSurname(),
                patientId: $patient->getPersonId());

            $clinic->setFullArrayPatientsId(
                personId: $patient->getPersonId(),
                surname: $patient->getSurname(),
                name: $patient->getName(),
                count: $i
            );

            $clinic->setPatientsId(
                personId: $patient->getPersonId(),
                count: $i
            );
        }

        return $clinic;
    }

    public static function filterInput()
    {
        $inputData = readline();

        while (!is_numeric($inputData)) {

            if ($inputData == 'exit' or $inputData == 'EXIT') {
                echo PHP_EOL . PHP_EOL . '              You have left the program. Goodbye!!!' . PHP_EOL . PHP_EOL;
                exit;
            }
            echo 'Error: the numeric input needed.' . PHP_EOL . "Try again -> ";
            $inputData = readline();
        }
        return $inputData;
    }
}