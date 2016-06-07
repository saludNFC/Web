<?php

// SGGM usa un solo seeder :O

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StaticTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');

        DB::table('histories')->delete();
        $personal = array(
            array('user_id' => 1, 'patient_id' => 1, 'history_type' => 'Personal', 'type_personal' => 'Alergia', 'description' => 'Alergia a betacaroteno'),
            array('user_id' => 1, 'patient_id' => 2, 'history_type' => 'Personal', 'type_personal' => 'Alergia', 'description' => 'Hipersensibilidad a mani, nueces y frutos secos'),
            array('user_id' => 1, 'patient_id' => 3, 'history_type' => 'Personal', 'type_personal' => 'Alergia', 'description' => 'Alergia a betacaroteno'),
            array('user_id' => 1, 'patient_id' => 4, 'history_type' => 'Personal', 'type_personal' => 'Alergia', 'description' => 'Hipersensibilidad a mani, nueces y frutos secos'),
            array('user_id' => 1, 'patient_id' => 5, 'history_type' => 'Personal', 'type_personal' => 'Alergia', 'description' => 'Alergia respiratoria al polen'),
        );

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
        $gine1 = array('user_id' => 1, 'patient_id' => 1, 'control_type' => 'Ginecologico', 'last_menst' => '12-10-2000', 'last_mamo' => '12-12-2012', 'sex_act' => false);
        $gine2 = array('user_id' => 1, 'patient_id' => 1, 'control_type' => 'Ginecologico', 'last_menst' => '11-11-2001');
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
                'anamnesis' => 'Cillum Lorem aute. Adipisicing nisi occaecat voluptate deserunt et eiusmod Lorem cupidatat minim. Ullamco proident laboris qui fugiat esse aliqua eu eu est minim consectetur excepteur aliquip pariatur. Mollit commodo quis aliquip commodo ea cupidatat ipsum duis id ipsum labore nulla laboris sit. Lorem in ad laboris sit pariatur ut irure ullamco laboris enim culpa',
                'physical_exam' => 'Ad labore mollit non laborum consequat ut ex pariatur quis adipisicing incididunt reprehenderit id veniam nostrud nisi.',
                'diagnosis' => 'Water under the bridge',
                'treatment' => 'Let me down',
                'justification' => 'Consectetur adipisicing sunt fugiat pariatur elit ipsum ex magna nisi'),

            array(
                'user_id' => 1,
                'patient_id' => 1,
                'anamnesis' => 'Quis consectetur ad incididunt deserunt dolore minim ex officia occaecat cillum adipisicing culpa laborum amet dolor.',
                'physical_exam' => 'All I ask',
                'diagnosis' => 'What goes around comes around',
                'treatment' => 'Boring',
                'justification' => 'Leave me alone'),
        );

        $flagged = array(
            'user_id' => 1,
            'patient_id' => 1,
            'anamnesis' => 'Cillum Lorem aute incididunt mollit ex consectetur magna. Ullamco occaecat ut anim proident incididunt cupidatat ullamco Lorem aute velit non ullamco veniam ex. Adipisicing nisi occaecat voluptate deserunt et eiusmod Lorem cupidatat minim. Ullamco proident laboris qui fugiat esse aliqua eu eu est minim consectetur excepteur aliquip pariatur. Mollit commodo quis aliquip commodo ea cupidatat ipsum duis id ipsum labore nulla laboris sit. Lorem in ad laboris sit pariatur ut irure ullamco laboris enim culpa',
            'physical_exam' => 'Enim et occaecat duis ut adipisicing do proident.',
            'diagnosis' => 'Reckless',
            'treatment' => 'Whatever',
            'justification' => 'Consectetur adipisicing sunt fugiat pariatur elit ipsum ex magna nisi',
            'flag' => true);

        DB::table('consultations')->insert($consultations);
        DB::table('consultations')->insert($flagged);
    }
}
