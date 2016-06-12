<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Control;

class SeederForControls extends Seeder
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
        $controls = array(
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Vacunacion', 'vaccine' => 'BCG', 'via' => 'Intra-dermica', 'dosis' => 1, 'created_at' => '12-12-2015'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Vacunacion', 'vaccine' => 'Pentavalente', 'via' => 'Intra-muscular', 'dosis' => 1, 'created_at' => '13-10-2005'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Vacunacion', 'vaccine' => 'Pentavalente', 'via' => 'Intra-muscular', 'dosis' => 2, 'created_at' => '16-02-2006'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Vacunacion', 'vaccine' => 'Pentavalente', 'via' => 'Intra-muscular', 'dosis' => 3, 'created_at' => '13-04-2006'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Vacunacion', 'vaccine' => 'DPT', 'via' => 'Intra-muscular', 'dosis' => 1, 'created_at' => '13-04-2006'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Vacunacion', 'vaccine' => 'Antiamarilica', 'via' => 'Subcutanea', 'dosis' => 1, 'created_at' => '13-04-2012'),

            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 20, 'height' => '20', 'created_at' => '13-05-2012'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 30, 'height' => '100', 'created_at' => '13-05-2013'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 40, 'height' => '103', 'created_at' => '13-05-2014'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 50, 'height' => '140', 'created_at' => '13-05-2015'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 60, 'height' => '145', 'created_at' => '13-06-2016'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 55, 'height' => '145', 'created_at' => '13-07-2016'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 58, 'height' => '153', 'created_at' => '13-08-2016'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 60, 'height' => '153', 'created_at' => '13-09-2016'),

            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Triaje', 'temperature' => 36, 'heart_rate' => '153', 'sistole' => 100, 'diastole' => 200, 'created_at' => '13-09-2016')

        );

        foreach ($controls as $array) {
            $control = new Control($array);
            $control->save();
        }
    }
}
