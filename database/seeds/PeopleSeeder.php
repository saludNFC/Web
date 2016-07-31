<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Patient;
use App\Contact;

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

        // Woman patient
        $patient = new Patient([
            'ci' => $faker->regexify('\d{7}'),
            'emision' => $faker->randomElement(['BN', 'CH', 'CB', 'LP', 'OR', 'PA', 'PT', 'SC', 'TJ']),
            'nombre' => 'Ana Maria',
            'apellido' => 'Torrez Cárdenas',
            'fecha_nac' => '03-07-1951',
            'lugar_nac' => $faker->randomElement(['Beni', 'Chuquisaca', 'Cochabamba', 'La Paz', 'Oruro', 'Pando', 'Potosi',
                            'Santa Cruz', 'Tarija']),
            'grupo_sanguineo' => $faker->randomElement(['A RH+','A RH-', 'B RH+', 'B RH-', 'O RH+', 'O RH-', 'AB RH+', 'AB RH-']),
            'sexo' => 'Femenino',
            'user_id' => $faker->randomElement([1,2,3,4]),
        ]);
        $patient->historia = $patient->codHistoria($patient);
        $patient->save();

        $contact = new Contact([
            'user_id' => $faker->randomElement([1,2,3,4]),
            'patient_id' => 1,
            'name' => $faker->firstName('male'),
            'lastname' => $faker->lastName,
            'relationship' => 'Esposo',
            'phone' => '22148273'
        ]);
        $contact->save();

        $patient = new Patient([
            'ci' => $faker->regexify('\d{7}'),
            'emision' => $faker->randomElement(['BN', 'CH', 'CB', 'LP', 'OR', 'PA', 'PT', 'SC', 'TJ']),
            'nombre' => 'Jorge',
            'apellido' => 'Ramirez Gomez',
            'fecha_nac' => '03-07-1951',
            'lugar_nac' => $faker->randomElement(['Beni', 'Chuquisaca', 'Cochabamba', 'La Paz', 'Oruro', 'Pando', 'Potosi',
                            'Santa Cruz', 'Tarija']),
            'grupo_sanguineo' => $faker->randomElement(['A RH+','A RH-', 'B RH+', 'B RH-', 'O RH+', 'O RH-', 'AB RH+', 'AB RH-']),
            'sexo' => 'Masculino',
            'user_id' => $faker->randomElement([1,2,3,4]),
        ]);
        $patient->historia = $patient->codHistoria($patient);
        $patient->save();

        $contact = new Contact([
            'user_id' => $faker->randomElement([1,2,3,4]),
            'patient_id' => 2,
            'name' => $faker->firstName('male'),
            'lastname' => $faker->lastName,
            'relationship' => 'Hijo',
            'phone' => '2128008'
        ]);
        $contact->save();

        foreach (range(1, 50) as $index) {
            $gender = $faker->randomElement(['male', 'female']);
            $patient = new Patient([
                'ci' => $faker->regexify('\d{7}'),
                'emision' => $faker->randomElement(['BN', 'CH', 'CB', 'LP', 'OR', 'PA', 'PT', 'SC', 'TJ']),
                'nombre' => $faker->firstName($gender),
                'apellido' => $faker->lastName . ' ' . $faker->lastName,
                'fecha_nac' => $faker->date($format = 'd-m-Y', $max = 'now'),
                'lugar_nac' => $faker->randomElement(['Beni', 'Chuquisaca', 'Cochabamba', 'La Paz', 'Oruro', 'Pando', 'Potosi',
                                'Santa Cruz', 'Tarija']),
                'grupo_sanguineo' => $faker->randomElement(['A RH+','A RH-', 'B RH+', 'B RH-', 'O RH+', 'O RH-', 'AB RH+', 'AB RH-']),
                'user_id' => $faker->randomElement([1,2,3,4]),
            ]);
            $gender == 'male' ? $patient->sexo = 'Masculino' : $patient->sexo = 'Femenino';
            $patient->historia = $patient->codHistoria($patient);
            $patient->save();
        }
    }
}
