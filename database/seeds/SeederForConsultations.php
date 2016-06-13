<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Consultation;

class SeederForConsultations extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');

        $consultations = array(

        );

        foreach ($consultations as $array) {
            $consultation = new Consultation($array);
            $consultation->save();
        }
    }
}
