<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Patient;

class PTest extends ApiTester
{
    public function testItFetchesPatients(){
        // Arrange
        $this->makePatient();

        // Act
        $this->getJson('api/paciente');

        // Assert
        $this->assertResponseOk();
    }

    private function makePatient($patientFields = ['user_id', 'ci', 'nombre', 'apellido']){
        $gender = $this->fake->randomElement(['male', 'female']);
        $patient = array_merge([
            'user_id' => $this->fake->randomElement([1,2,3,4]),
            'ci' => $this->fake->regexify('\d{7}'),
            'nombre' => $this->fake->firstName($gender),
            'apellido' => $this->fake->lastName . ' ' . $this->fake->lastName,
        ], $patientFields);

        while($this->times--) Patient::create($patient);
    }
}
