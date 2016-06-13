<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\History;


class SeederForHistories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');

        // Histories for first patient, all three history types, with user doctor or nurse
        $histories = array(
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'history_type' => 'Familiar','grade' => 'Abuelo materno','illness' => 'Problemas cardíacos','created_at' => '04-07-1951'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'history_type' => 'Familiar','grade' => 'Abuela materna','illness' => 'Colesterol alto','created_at' => '04-07-1951'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'history_type' => 'Familiar','grade' => 'Abuelo paterno','illness' => 'Hipertension arterial','created_at' => '04-07-1951'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'history_type' => 'Familiar','grade' => 'Padre','illness' => 'Hipertension arterial','created_at' => '04-07-1951'),

            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'history_type' => 'Personal','type_personal' => 'Alergia','description' => 'Reacción adversa a maníes, almendras y frutos secos','created_at' => '06-01-1956', 'flag' => true),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'history_type' => 'Personal','type_personal' => 'Alergia','description' => 'Alergia respiratoria al polen con hipersensibilidad en ojos y garganta','created_at' => '05-10-1960'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'history_type' => 'Personal','type_personal' => 'Alergia','description' => 'Alergia a la penicilina','created_at' => '05-10-1963', 'flag' => true),

            /**
             * TODO fill medicines list!
             */
            // array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'history_type' => 'Medicamentos','med' => 'Sales rehidratantes','via' => 'Oral','date_ini' => $faker->date($format = 'd-m-Y', $max = 'now'),'created_at' => '13-11-2011'),
            // array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'history_type' => 'Medicamentos','med' => 'Jarabe antitusivo','via' => 'Sublingual','date_ini' => $faker->date($format = 'd-m-Y', $max = 'now'),'created_at' => '13-11-2009'),
            // array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'history_type' => 'Medicamentos','med' => 'Metformina','via' => 'Topica','date_ini' => $faker->date($format = 'd-m-Y', $max = 'now'),'created_at' => '13-11-2008'),
        );

        foreach ($histories as $array) {
            $history = new History($array);
            $history->save();
        }
    }
}
