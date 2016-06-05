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

        // little girl patient
        $patient = new Patient([
            'ci' => $faker->regexify('\d{7}'),
            'emision' => $faker->randomElement(['BN', 'CH', 'CB', 'LP', 'OR', 'PA', 'PT', 'SC', 'TJ']),
            'nombre' => 'Valentina Uriel',
            'apellido' => 'Medinaceli Cardenas',
            'fecha_nac' => '07-03-2010',
            'grupo_sanguineo' => 'O RH+',
            'sexo' => 'Femenino',
            'user_id' => $faker->randomElement([1,2,3,4]),
        ]);
        $patient->historia = $patient->codHistoria($patient);
        $patient->save();

        // little boy patient
        $patient = new Patient([
            'ci' => $faker->regexify('\d{7}'),
            'emision' => $faker->randomElement(['BN', 'CH', 'CB', 'LP', 'OR', 'PA', 'PT', 'SC', 'TJ']),
            'nombre' => 'Luis Fernando',
            'apellido' => 'Vera Cardenas',
            'fecha_nac' => '10-06-2005',
            'grupo_sanguineo' => 'A RH+',
            'sexo' => 'Masculino',
            'user_id' => $faker->randomElement([1,2,3,4]),
        ]);
        $patient->historia = $patient->codHistoria($patient);
        $patient->save();

        // Young lady
        $patient = new Patient([
            'ci' => $faker->regexify('\d{7}'),
            'emision' => $faker->randomElement(['BN', 'CH', 'CB', 'LP', 'OR', 'PA', 'PT', 'SC', 'TJ']),
            'nombre' => 'Gabriela Nicole',
            'apellido' => 'Medinaceli Cardenas',
            'fecha_nac' => '01-06-2000',
            'grupo_sanguineo' => 'B RH+',
            'sexo' => 'Femenino',
            'user_id' => $faker->randomElement([1,2,3,4]),
        ]);
        $patient->historia = $patient->codHistoria($patient);
        $patient->save();

        // Old lady
        $patient = new Patient([
            'ci' => $faker->regexify('\d{7}'),
            'emision' => $faker->randomElement(['BN', 'CH', 'CB', 'LP', 'OR', 'PA', 'PT', 'SC', 'TJ']),
            'nombre' => 'Teresa',
            'apellido' => 'Lopez Perez',
            'fecha_nac' => '05-11-1956',
            'grupo_sanguineo' => 'B RH+',
            'sexo' => 'Femenino',
            'user_id' => $faker->randomElement([1,2,3,4]),
        ]);
        $patient->historia = $patient->codHistoria($patient);
        $patient->save();

        // Old man
        $patient = new Patient([
            'ci' => $faker->regexify('\d{7}'),
            'emision' => $faker->randomElement(['BN', 'CH', 'CB', 'LP', 'OR', 'PA', 'PT', 'SC', 'TJ']),
            'nombre' => 'Edgar',
            'apellido' => 'Mariaca Argandoña',
            'fecha_nac' => '01-12-1950',
            'grupo_sanguineo' => 'A RH+',
            'sexo' => 'Masculino',
            'user_id' => $faker->randomElement([1,2,3,4]),
        ]);
        $patient->historia = $patient->codHistoria($patient);
        $patient->save();

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
