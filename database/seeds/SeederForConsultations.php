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
            array(
                'user_id' => $faker->randomElement([3, 4]),
                'patient_id' => 1,
                'anamnesis' => 'La paciente tiene malestar en la garganta, tos seca y fuerte que le produce posteriormente sangrado',
                'physical_exam' => 'La paciente presenta enrojecimiento en la garganta, inflamación en las amigdalas y dificultad al respirar.',
                'diagnosis' => 'Amigdalitis con complicación por faringitis',
                'treatment' => 'Jarabe Sentis tres veces al día y Etaconil 50gr una vez al día',
                'justification' => 'El jarabe redicirá el enrojecimiento de la garganta y ayudará a la desinflamación de las amigdalas',
                'created_at' => '22-11-2003',
                'flag' => true),

            array(
                'user_id' => $faker->randomElement([3, 4]),
                'patient_id' => 1,
                'anamnesis' => 'La paciente debido a una caída lastimó la rodilla derecha con dolor reflejado en la parte lumbar.',
                'physical_exam' => 'Hematoma grado 2 en la rodilla derecha y crisis por impacto reflejo en area lumbar.',
                'diagnosis' => 'Hematoma por golpe',
                'treatment' => 'Diclofenaco gel, Ibuprofeno',
                'justification' => 'El Diclofenaco gel ayudará a reducir el dolor en area lumbar, Ibuprofeno reducira inflamación en rodilla y hematoma.',
                'created_at' => '14-10-1993'),

            array(
                'user_id' => $faker->randomElement([3, 4]),
                'patient_id' => 1,
                'anamnesis' => 'La paciente presenta recaida de resfrio con fiebre.',
                'physical_exam' => 'Enrojecimiento en la garganta, amigdalas imflamadas, aspecto irritado de vias respiratorias, dificultad al respirar.',
                'diagnosis' => 'Faringoamigdalitis',
                'treatment' => 'Jarabe Cinogem tres veces al día.',
                'justification' => 'Cinogem para la amigdalitis',
                'created_at' => '19-02-1983',
                'flag' => true)
        );

        foreach ($consultations as $array) {
            $consultation = new Consultation($array);
            $consultation->save();
        }
    }
}
