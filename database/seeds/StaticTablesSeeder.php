<?php

// SGGM usa un solo seeder :O

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\History;
use App\Control;

class StaticTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // SEEDING WITH ANIDATED ARRAYS DOESN'T WORK FOR DATES, FOR SOME REASON ¬¬

        $faker = Faker::create('es_ES');

        $personal = array('user_id' => 1, 'patient_id' => 1, 'history_type' => 'Personal', 'type_personal' => 'Alergia', 'description' => 'Alergia a betacaroteno', 'created_at' => '11-11-2001');
            array('user_id' => 1, 'patient_id' => 2, 'history_type' => 'Personal', 'type_personal' => 'Alergia', 'description' => 'Hipersensibilidad a mani, nueces y frutos secos'),
            array('user_id' => 1, 'patient_id' => 3, 'history_type' => 'Personal', 'type_personal' => 'Alergia', 'description' => 'Alergia a betacaroteno'),
            array('user_id' => 1, 'patient_id' => 4, 'history_type' => 'Personal', 'type_personal' => 'Alergia', 'description' => 'Hipersensibilidad a mani, nueces y frutos secos'),
            array('user_id' => 1, 'patient_id' => 5, 'history_type' => 'Personal', 'type_personal' => 'Alergia', 'description' => 'Alergia respiratoria al polen'),

        $flagged = array(
            array('user_id' => 1, 'patient_id' => 1, 'history_type' => 'Personal', 'type_personal' => 'Alergia', 'description' => 'Alergia severa a otras niñas llamadas Valentina', 'flag' => true),
            array('user_id' => 1, 'patient_id' => 1, 'history_type' => 'Personal', 'type_personal' => 'Alergia', 'description' => 'Alergia a la penicilina ', 'flag' => true),
        );

        $familiar = array(
            array('user_id' => 1, 'patient_id' => 1, 'history_type' => 'Familiar', 'grade' => 'Abuelo materno', 'illness' => 'Problemas cardíacos'),
            array('user_id' => 1, 'patient_id' => 1, 'history_type' => 'Familiar', 'grade' => 'Padre', 'illness' => 'Presion arterial'),
            array('user_id' => 1, 'patient_id' => 1, 'history_type' => 'Familiar', 'grade' => 'Abuela materna', 'illness' => 'Diabetes'),
            array('user_id' => 1, 'patient_id' => 2, 'history_type' => 'Familiar', 'grade' => 'Abuelo materno', 'illness' => 'Problemas cardíacos'),
            array('user_id' => 1, 'patient_id' => 2, 'history_type' => 'Familiar', 'grade' => 'Padre', 'illness' => 'Presion arterial'),
            array('user_id' => 1, 'patient_id' => 2, 'history_type' => 'Familiar', 'grade' => 'Abuela materna', 'illness' => 'Diabetes'),
            array('user_id' => 1, 'patient_id' => 3, 'history_type' => 'Familiar', 'grade' => 'Abuelo paterno', 'illness' => 'Problemas cardiacos'),
            array('user_id' => 1, 'patient_id' => 3, 'history_type' => 'Familiar', 'grade' => 'Abuelo paterno', 'illness' => 'Problemas cardiacos'),
        );

        $medicine = array(
            array('user_id' => 1, 'patient_id' => 1, 'history_type' => 'Medicamentos', 'med' => 'Sales rehidratantes', 'via' => 'Oral', 'date_ini' => $faker->date($format = 'd-m-Y', $max = 'now')),
            array('user_id' => 1, 'patient_id' => 1, 'history_type' => 'Medicamentos', 'med' => 'Jarabe antitusivo', 'via' => 'Sublingual', 'date_ini' => $faker->date($format = 'd-m-Y', $max = 'now')),
            array('user_id' => 1, 'patient_id' => 2, 'history_type' => 'Medicamentos', 'med' => 'Paracetamol', 'via' => 'Parenteral', 'date_ini' => $faker->date($format = 'd-m-Y', $max = 'now')),
            array('user_id' => 1, 'patient_id' => 4, 'history_type' => 'Medicamentos', 'med' => 'Ibuprofeno', 'via' => 'Oral', 'date_ini' => $faker->date($format = 'd-m-Y', $max = 'now')),
            array('user_id' => 1, 'patient_id' => 2, 'history_type' => 'Medicamentos', 'med' => 'Paracetamol', 'via' => 'Oral', 'date_ini' => $faker->date($format = 'd-m-Y', $max = 'now')),
            array('user_id' => 1, 'patient_id' => 2, 'history_type' => 'Medicamentos', 'med' => 'Paracetamol', 'via' => 'Rectal', 'date_ini' => $faker->date($format = 'd-m-Y', $max = 'now')),
            array('user_id' => 1, 'patient_id' => 2, 'history_type' => 'Medicamentos', 'med' => 'Jarabe antitusivo', 'via' => 'Rectal', 'date_ini' => $faker->date($format = 'd-m-Y', $max = 'now')),
            array('user_id' => 1, 'patient_id' => 3, 'history_type' => 'Medicamentos', 'med' => 'Etaconil', 'via' => 'Topica', 'date_ini' => $faker->date($format = 'd-m-Y', $max = 'now')),
            array('user_id' => 1, 'patient_id' => 3, 'history_type' => 'Medicamentos', 'med' => 'Etaconil', 'via' => 'Topica', 'date_ini' => $faker->date($format = 'd-m-Y', $max = 'now')),
            array('user_id' => 1, 'patient_id' => 3, 'history_type' => 'Medicamentos', 'med' => 'Metformina', 'via' => 'Topica', 'date_ini' => $faker->date($format = 'd-m-Y', $max = 'now')),
            array('user_id' => 1, 'patient_id' => 4, 'history_type' => 'Medicamentos', 'med' => 'Sentis', 'via' => 'Oral', 'date_ini' => $faker->date($format = 'd-m-Y', $max = 'now')),
            array('user_id' => 1, 'patient_id' => 4, 'history_type' => 'Medicamentos', 'med' => 'Sentis', 'via' => 'Oral', 'date_ini' => $faker->date($format = 'd-m-Y', $max = 'now'))
        );

        DB::table('histories')->insert($personal);
        DB::table('histories')->insert($flagged);
        DB::table('histories')->insert($familiar);
        DB::table('histories')->insert($medicine);

        DB::table('controls')->delete();
        $vacunacion = array('user_id' => 1, 'patient_id' => 1, 'control_type' => 'Vacunacion', 'vaccine' => 'Pentavalente', 'via' => 'Oral', 'dosis' => 2);
        $crecimiento = array('user_id' => 1, 'patient_id' => 1, 'control_type' => 'Crecimiento', 'weight' => 66, 'height' => 150);
        $triaje = array('user_id' => 1, 'patient_id' => 1, 'control_type' => 'Triaje', 'temperature' => '36,5', 'heart_rate' => 180, 'sistole' => 111, 'diastole' => 122);
        $gine1 = array('user_id' => 1, 'patient_id' => 1, 'control_type' => 'Ginecologico', 'last_menst' => '01-01-2001', 'last_mamo' => '01-01-2001', 'sex_act' => false);
        $gine1 = array('user_id' => 1, 'patient_id' => 1, 'control_type' => 'Ginecologico', 'last_menst' => $faker->date($format = 'd-m-Y', $max = 'now'));
        $gine2 = array('user_id' => 1, 'patient_id' => 1, 'control_type' => 'Ginecologico', 'last_menst' => '07-03-2010');
        $gine3 = array('user_id' => 1, 'patient_id' => 1, 'control_type' => 'Ginecologico', 'last_menst' => '13-09-2010', 'sex_act' => true, 'last_papa' => '12-12-2013');
        $geri = array('user_id' => 1, 'patient_id' => 1, 'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Funcional', 'notes' => 'Normal');
        DB::table('controls')->insert($vacunacion);
        DB::table('controls')->insert($crecimiento);
        DB::table('controls')->insert($triaje);
        DB::table('controls')->insert($gine1);
        DB::table('controls')->insert($gine2);
        DB::table('controls')->insert($gine3);
        DB::table('controls')->insert($geri);

        DB::table('consultations')->delete();
        $consultations = array(
            array(
                'user_id' => 1,
                'patient_id' => 1,
                'anamnesis' => 'La paciente tiene malestar en la garganta, tos seca y fuerte que le produce posteriormente sangrado',
                'physical_exam' => 'La paciente presenta enrojecimiento en la garganta, inflamación en las amigdalas y dificultad al respirar.',
                'diagnosis' => 'Amigdalitis con complicación por farigitis',
                'treatment' => 'Jarabe Sentis tres veces al día y Etaconil 50gr una vez al día',
                'justification' => 'El jarabe redicirá el enrojecimiento de la garganta y ayudará a la desinflamación de las amigdalas'),

            array(
                'user_id' => 1,
                'patient_id' => 1,
                'anamnesis' => 'La paciente debido a una caída lastimó la rodilla derecha con dolor reflejado en la parte lumbar.',
                'physical_exam' => 'Hematoma grado 2 en la rodilla derecha y crisis por impacto reflejo en area lumbar.',
                'diagnosis' => 'Hematoma por golpe',
                'treatment' => 'Diclofenaco gel, Ibuprofeno',
                'justification' => 'El Diclofenaco gel ayudará a reducir el dolor en area lumbar, Ibuprofeno reducira inflamación en rodilla y hematoma.'),
        );

        $flagged = array(
            'user_id' => 1,
            'patient_id' => 1,
            'anamnesis' => 'La paciente presenta recaida de resfrio con fiebre.',
            'physical_exam' => 'Enrojecimiento en la garganta, amigdalas imflamadas, aspecto irritado de vias respiratorias, dificultad al respirar.',
            'diagnosis' => 'Faringoamigdalitis',
            'treatment' => 'Jarabe Cinogem tres veces al día.',
            'justification' => 'Cinogem para la amigdalitis',
            'flag' => true);

        DB::table('consultations')->insert($consultations);
        DB::table('consultations')->insert($flagged);
    }
}
