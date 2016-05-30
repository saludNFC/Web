<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Patient;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');
        foreach (range(1, 50) as $index) {
            $gender = $faker->randomElement(['male', 'female']);
            $patient = new Patient([
                'ci' => $faker->regexify('\d{7}'),
                'emision' => $faker->randomElement(['BN', 'CH', 'CB', 'LP', 'OR', 'PA', 'PT', 'SC', 'TJ']),
                'nombre' => $faker->firstName($gender),
                'apellido' => $faker->lastName . ' ' . $faker->lastName,
                'fecha_nac' => $faker->date($format = 'd-m-Y', $max = 'now'),
                'grupo_sanguineo' => $faker->randomElement(['A RH+','A RH-', 'B RH+', 'B RH-', 'O RH+', 'O RH-', 'AB RH+', 'AB RH-']),
                'user_id' => $faker->randomElement([1,2,3,4]),
            ]);
            $gender == 'male' ? $patient->sexo = 'Masculino' : $patient->sexo = 'Femenino';
            $patient->historia = $patient->codHistoria($patient);
            $patient->save();
        }
    }
}
