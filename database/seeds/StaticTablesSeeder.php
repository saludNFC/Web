<?php

// SGGM usa un solo seeder :O

use Illuminate\Database\Seeder;

class StaticTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $user = array(
            array('name' => 'Veuge Clavijo', 'email' => 'veuge0592@hotmail.com', 'password' => bcrypt('123456')),
            array('name' => 'Eugenia Altamirano', 'email' => 'euge0592@gmail.com', 'password' => bcrypt('123456'))
        );
        DB::table('users')->insert($user);

        // DB::table('patients')->delete();
        // $patients = array(
        //     array('ci' => '6869126', 'emision' => 'LP', 'nombre' => 'Veronica', 'apellido' => 'Clavijo', 'sexo' => 'Femenino', 'fecha_nac' => '1992-05-16', 'lugar_nac' => 'La Paz', 'grupo_sanguineo' => 'ARH+'),
        // );
        // DB::table('patients')->insert($patients);
        //
        // DB::table('histories')->delete();
        // $personal = array(
        //     array('patient_id' => 1, 'history_type' => 'personal', 'type_personal' => 'alergia', 'description' => 'Alergia a la penicilina'),
        //     array('patient_id' => 1, 'history_type' => 'personal', 'type_personal' => 'enfermedad', 'description' => 'Hepatitis'),
        //     array('patient_id' => 1, 'history_type' => 'personal', 'type_personal' => 'cirugia', 'description' => 'Extraccion del apendice'),
        // );
        //
        // $familiar = array(
        //     array('patient_id' => 1, 'history_type' => 'familiar', 'grade' => 'Abuelo', 'illness' => 'Problemas cardíacos'),
        //     array('patient_id' => 1, 'history_type' => 'familiar', 'grade' => 'Padre', 'illness' => 'Presion arterial'),
        //     array('patient_id' => 1, 'history_type' => 'familiar', 'grade' => 'Madre', 'illness' => 'Diabetes'),
        // );
        //
        // $medicine = array(
        //     array('patient_id' => 1, 'history_type' => 'medicamentos', 'med' => 'Etaconil', 'date_ini' => '2015-12-18'),
        //     array('patient_id' => 1, 'history_type' => 'medicamentos', 'med' => 'Sentis', 'date_ini' => '2015-12-18'),
        // );
        // DB::table('histories')->insert($personal);
        // DB::table('histories')->insert($familiar);
        // DB::table('histories')->insert($medicine);
        //
        // DB::table('controls')->delete();
        // $controls = array(
        //     array('patient_id' => 1, 'control_type' => 'Vacunacion', 'note' => 'Pentavalente', 'value' => 0),
        //     array('patient_id' => 1, 'control_type' => 'Crecimiento', 'note' => '', 'value' => 150),
        //     array('patient_id' => 1, 'control_type' => 'Peso', 'note' => '', 'value' => 57.8),
        //     array('patient_id' => 1, 'control_type' => 'Temperatura', 'note' => '', 'value' => 36.5)
        // );
        // DB::table('controls')->insert($controls);
        //
        // DB::table('consultations')->delete();
        // $consultations = array(
        //     array(
        //         'patient_id' => 1,
        //         'anamnesis' => 'Cillum Lorem aute incididunt mollit ex consectetur magna. Ullamco occaecat ut anim proident incididunt cupidatat ullamco Lorem aute velit non ullamco veniam ex. Adipisicing nisi occaecat voluptate deserunt et eiusmod Lorem cupidatat minim. Ullamco proident laboris qui fugiat esse aliqua eu eu est minim consectetur excepteur aliquip pariatur. Mollit commodo quis aliquip commodo ea cupidatat ipsum duis id ipsum labore nulla laboris sit. Lorem in ad laboris sit pariatur ut irure ullamco laboris enim culpa',
        //         'physical_exam' => 'Enim et occaecat duis ut adipisicing do proident.',
        //         'diagnosis' => 'Reckless',
        //         'treatment' => 'Whatever',
        //         'justification' => 'Consectetur adipisicing sunt fugiat pariatur elit ipsum ex magna nisi'),
        //
        //     array(
        //         'patient_id' => 1,
        //         'anamnesis' => 'Cillum Lorem aute. Adipisicing nisi occaecat voluptate deserunt et eiusmod Lorem cupidatat minim. Ullamco proident laboris qui fugiat esse aliqua eu eu est minim consectetur excepteur aliquip pariatur. Mollit commodo quis aliquip commodo ea cupidatat ipsum duis id ipsum labore nulla laboris sit. Lorem in ad laboris sit pariatur ut irure ullamco laboris enim culpa',
        //         'physical_exam' => 'Ad labore mollit non laborum consequat ut ex pariatur quis adipisicing incididunt reprehenderit id veniam nostrud nisi.',
        //         'diagnosis' => 'Water under the bridge',
        //         'treatment' => 'Let me down',
        //         'justification' => 'Consectetur adipisicing sunt fugiat pariatur elit ipsum ex magna nisi'),
        //
        //     array(
        //         'patient_id' => 1,
        //         'anamnesis' => 'Quis consectetur ad incididunt deserunt dolore minim ex officia occaecat cillum adipisicing culpa laborum amet dolor.',
        //         'physical_exam' => 'All I ask',
        //         'diagnosis' => 'What goes around comes around',
        //         'treatment' => 'Boring',
        //         'justification' => 'Leave me alone'),
        // );
        // DB::table('consultations')->insert($consultations);
    }
}
