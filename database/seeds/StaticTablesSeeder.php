<?php

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
        DB::table('patients')->delete();
        $patients = array('ci' => '6869126', 'emision' => 'LP', 'nombre' => 'Veronica', 'apellido' => 'Clavijo', 'sexo' => 'Femenino', 'fecha_nac' => '1992-05-16');
        DB::table('patients')->insert($patients);

        DB::table('histories')->delete();
        $histories = array(
            array('patient_id' => 1, 'history_type' => 'Familiar', 'story' => 'Blah Blah Blah'),
            array('patient_id' => 1, 'history_type' => 'Personal', 'story' => 'Meh meh meh'),
            array('patient_id' => 1, 'history_type' => 'Medicamentos', 'story' => 'Ha ha ha ha')
        );
        DB::table('histories')->insert($histories);

        DB::table('controls')->delete();
        $controls = array(
            array('patient_id' => 1, 'control_type' => 'Vacunacion', 'note' => 'Pentavalente', 'value' => 0),
            array('patient_id' => 1, 'control_type' => 'Crecimiento', 'note' => '', 'value' => 150),
            array('patient_id' => 1, 'control_type' => 'Peso', 'note' => '', 'value' => 57.8),
            array('patient_id' => 1, 'control_type' => 'Temperatura', 'note' => '', 'value' => 36.5)
        );
        DB::table('controls')->insert($controls);

        DB::table('consultations')->delete();
        $consultations = array(
            array(
                'patient_id' => 1,
                'anamnesis' => 'Cillum Lorem aute incididunt mollit ex consectetur magna. Ullamco occaecat ut anim proident incididunt cupidatat ullamco Lorem aute velit non ullamco veniam ex. Adipisicing nisi occaecat voluptate deserunt et eiusmod Lorem cupidatat minim. Ullamco proident laboris qui fugiat esse aliqua eu eu est minim consectetur excepteur aliquip pariatur. Mollit commodo quis aliquip commodo ea cupidatat ipsum duis id ipsum labore nulla laboris sit. Lorem in ad laboris sit pariatur ut irure ullamco laboris enim culpa',
                'physical_exam' => 'Enim et occaecat duis ut adipisicing do proident.',
                'diagnosis' => 'Reckless',
                'treatment' => 'Whatever',
                'justification' => 'Consectetur adipisicing sunt fugiat pariatur elit ipsum ex magna nisi'),

            array(
                'patient_id' => 1,
                'anamnesis' => 'Cillum Lorem aute. Adipisicing nisi occaecat voluptate deserunt et eiusmod Lorem cupidatat minim. Ullamco proident laboris qui fugiat esse aliqua eu eu est minim consectetur excepteur aliquip pariatur. Mollit commodo quis aliquip commodo ea cupidatat ipsum duis id ipsum labore nulla laboris sit. Lorem in ad laboris sit pariatur ut irure ullamco laboris enim culpa',
                'physical_exam' => 'Ad labore mollit non laborum consequat ut ex pariatur quis adipisicing incididunt reprehenderit id veniam nostrud nisi.',
                'diagnosis' => 'Water under the bridge',
                'treatment' => 'Let me down',
                'justification' => 'Consectetur adipisicing sunt fugiat pariatur elit ipsum ex magna nisi'),

            array(
                'patient_id' => 1,
                'anamnesis' => 'Quis consectetur ad incididunt deserunt dolore minim ex officia occaecat cillum adipisicing culpa laborum amet dolor.',
                'physical_exam' => 'All I ask',
                'diagnosis' => 'What goes around comes around',
                'treatment' => 'Boring',
                'justification' => 'Leave me alone'),
        );
        DB::table('consultations')->insert($consultations);
    }
}