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
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Vacunacion', 'vaccine' => 'BCG', 'via' => 'Intra-dermica', 'dosis' => 1, 'created_at' => '15-10-1951'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Vacunacion', 'vaccine' => 'Pentavalente', 'via' => 'Intra-muscular', 'dosis' => 1, 'created_at' => '17-10-1951'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Vacunacion', 'vaccine' => 'Pentavalente', 'via' => 'Intra-muscular', 'dosis' => 2, 'created_at' => '11-04-1952'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Vacunacion', 'vaccine' => 'Pentavalente', 'via' => 'Intra-muscular', 'dosis' => 3, 'created_at' => '11-08-1952'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Vacunacion', 'vaccine' => 'DPT', 'via' => 'Intra-muscular', 'dosis' => 1, 'created_at' => '19-12-1951'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Vacunacion', 'vaccine' => 'Antiamarilica', 'via' => 'Subcutanea', 'dosis' => 1, 'created_at' => '19-12-1951'),

            // Crecimiento hasta los 7 años
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 3.4, 'height' => 50.3, 'created_at' => '03-07-1951'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 5.6, 'height' => 59, 'created_at' => '05-10-1951'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 7.3, 'height' => 65, 'created_at' => '09-01-1952'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 8.6, 'height' => 70, 'created_at' => '19-04-1952'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 9.5, 'height' => 74, 'created_at' => '22-07-1952'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 11, 'height' => 77, 'created_at' => '29-10-1952'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 11.5, 'height' => 80.5, 'created_at' => '11-02-1953'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 12.4, 'height' => 86, 'created_at' => '29-10-1954'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 14.4, 'height' => 94, 'created_at' => '11-05-1955'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 15.5, 'height' => 99.14, 'created_at' => '29-10-1956'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 17.4, 'height' => 105, 'created_at' => '04-08-1957'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 19.6, 'height' => 112.3, 'created_at' => '30-11-1958'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 21.2, 'height' => 117.27, 'created_at' => '03-07-1959'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Crecimiento', 'weight' => 23.5, 'height' => 122.62, 'created_at' => '15-11-1960'),

            // Controles de triaje
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Triaje', 'temperature' => 36.1, 'heart_rate' => 60, 'sistole' => 105, 'diastole' => 73, 'created_at' => '03-07-1954'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Triaje', 'temperature' => 36.3, 'heart_rate' => 65, 'sistole' => 105, 'diastole' => 77, 'created_at' => '15-12-1960'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Triaje', 'temperature' => 37.2, 'heart_rate' => 70, 'sistole' => 108, 'diastole' => 77, 'created_at' => '17-01-1966'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Triaje', 'temperature' => 37.2, 'heart_rate' => 70, 'sistole' => 110, 'diastole' => 77, 'created_at' => '12-07-1971'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Triaje', 'temperature' => 37, 'heart_rate' => 80, 'sistole' => 105, 'diastole' => 75, 'created_at' => '10-09-1980'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Triaje', 'temperature' => 36, 'heart_rate' => 80, 'sistole' => 112, 'diastole' => 80, 'created_at' => '12-11-1983'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Triaje', 'temperature' => 36.5, 'heart_rate' => 70, 'sistole' => 120, 'diastole' => 81, 'created_at' => '27-05-1990'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Triaje', 'temperature' => 37.3, 'heart_rate' => 75, 'sistole' => 126, 'diastole' => 85, 'created_at' => '06-06-1996'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Triaje', 'temperature' => 36.8, 'heart_rate' => 80, 'sistole' => 121, 'diastole' => 83, 'created_at' => '30-12-2000'),

            // Ginecologico
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '06-06-1966', 'sex_act' => false, 'created_at' => '07-06-1966'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '07-07-1966', 'sex_act' => false, 'created_at' => '07-09-1966'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '08-08-1967', 'sex_act' => false, 'created_at' => '08-12-1967'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '09-09-1969', 'sex_act' => false, 'created_at' => '10-09-1969'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '21-11-1971', 'sex_act' => true, 'created_at' => '21-11-1971'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '12-11-1972', 'sex_act' => true, 'created_at' => '12-11-1972'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '13-12-1972', 'sex_act' => true, 'last_papa' => '12-11-1972','created_at' => '07-06-1966'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '13-01-1973', 'sex_act' => true, 'created_at' => '13-01-1973'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '10-02-1973', 'sex_act' => true, 'created_at' => '10-02-1973'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '09-03-1973', 'sex_act' => true, 'created_at' => '09-03-1973'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '11-04-1973', 'sex_act' => true, 'created_at' => '11-04-1973'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '11-05-1973', 'sex_act' => true, 'created_at' => '11-05-1973'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '22-06-1973', 'last_mamo' => '22-06-1973', 'sex_act' => true, 'last_papa' => '22-06-1973','created_at' => '22-06-1973'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '11-08-1974', 'sex_act' => true, 'created_at' => '11-08-1974'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '11-08-1974', 'sex_act' => true, 'created_at' => '11-08-1974'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '23-01-1977', 'sex_act' => true, 'created_at' => '23-01-1977'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '22-02-1977', 'sex_act' => true, 'created_at' => '22-02-1977'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '09-11-1977', 'sex_act' => true, 'created_at' => '09-11-1977'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '10-12-1977', 'last_mamo' => '10-12-1977', 'sex_act' => true, 'last_papa' => '10-12-1977','created_at' => '10-12-1977'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '19-12-1980', 'sex_act' => true, 'created_at' => '19-12-1980'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '11-08-1986', 'sex_act' => true, 'created_at' => '11-08-1986'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '12-10-1990', 'sex_act' => true, 'created_at' => '12-10-1990'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '03-07-1995', 'sex_act' => true, 'last_papa' => '03-07-1995', 'created_at' => '03-07-1995'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '09-12-1999', 'last_mamo' => '09-12-1999','sex_act' => true, 'created_at' => '09-12-1999'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '12-12-2000', 'sex_act' => true, 'created_at' => '12-12-2000'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '09-01-2001', 'sex_act' => true, 'created_at' => '09-01-2001'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Ginecologico', 'last_menst' => '13-05-2001', 'last_mamo' => '13-05-2001', 'sex_act' => true, 'last_papa' => '13-05-2001', 'created_at' => '13-05-2001'),  // MENOPAUSIA

            // Geriatrico
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Medica', 'notes' => 'Posible incidencia de artrosis en cadera derecha con reflejo grado 0 en cadera izquierda', 'created_at' => '22-12-2002'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Medica', 'notes' => 'Disminución en un 10 % en oido derecho y 5 % en oido izquierdo de la agudeza auditiva', 'created_at' => '14-07-2005'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Medica', 'notes' => 'Inicios de hipertensión arterial', 'created_at' => '22-12-2006'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Medica', 'notes' => 'Hipertension arterial confirmada', 'created_at' => '19-11-2007'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Medica', 'notes' => 'Artrosis de cadera derecha', 'created_at' => '04-08-2008'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Medica', 'notes' => 'Disminución en un 20 % en oido derecho y 15 % en oido izquierdo de la agudeza auditiva', 'created_at' => '11-07-2010'),

            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Funcional', 'notes' => 'Dificultad al subir y bajar gradas', 'created_at' => '09-12-2002'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Funcional', 'notes' => 'Debilidad en brazo derecho haciendo dificil agarrar y cargar objetos', 'created_at' => '11-11-2003'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Funcional', 'notes' => 'Disminución significativa del apetito', 'created_at' => '01-09-2005'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Funcional', 'notes' => 'Sedentarismo extremo', 'created_at' => '07-11-2009'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Funcional', 'notes' => 'Incontinencia ocasional ambos esfinteres', 'created_at' => '14-12-2012'),

            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Cognitiva', 'notes' => 'Evaluacion cognitiva normal con valoracion 0 en escala de Pfeiffer', 'created_at' => '09-09-2000'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Cognitiva', 'notes' => 'Evaluacion cognitiva normal con valoracion 0 en escala de Pfeiffer', 'created_at' => '12-02-2003'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Cognitiva', 'notes' => 'Ligera desorientacion en el tiempo. Valoracion 1 en la escala de Pfeiffer. Capacidad de mantener coversacion', 'created_at' => '16-05-2007'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Cognitiva', 'notes' => 'Valoracion 1 en escala de Pfeiffer. Dificultad de mantener conversacion fluida', 'created_at' => '09-07-2009'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Cognitiva', 'notes' => 'Valoracion 4 en escala de Pfeiffer, desorientacion generalizada, algunas alteraciones mentales, dificultad al reconocer personas', 'created_at' => '29-09-2011'),

            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Social', 'notes' => 'Relacionamiento social normal con familia', 'created_at' => '22-11-2003'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Social', 'notes' => 'Interaccion social escasa, recomendacion de unirse a grupo de adultos mayores, relacionarse mas con nietos', 'created_at' => '22-11-2005'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Social', 'notes' => 'Relacionamiento normal con miembros de iglesia, familia y vecinos', 'created_at' => '22-11-2007'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 1,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Social', 'notes' => 'Disminucion en relaciones sociales, prefiere quedarse en casa, no interactua con personas', 'created_at' => '13-12-2009'),


            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Vacunacion', 'vaccine' => 'BCG', 'via' => 'Intra-dermica', 'dosis' => 1, 'created_at' => '15-10-1951'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Vacunacion', 'vaccine' => 'Pentavalente', 'via' => 'Intra-muscular', 'dosis' => 1, 'created_at' => '17-10-1951'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Vacunacion', 'vaccine' => 'Pentavalente', 'via' => 'Intra-muscular', 'dosis' => 2, 'created_at' => '11-04-1952'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Vacunacion', 'vaccine' => 'Pentavalente', 'via' => 'Intra-muscular', 'dosis' => 3, 'created_at' => '11-08-1952'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Vacunacion', 'vaccine' => 'DPT', 'via' => 'Intra-muscular', 'dosis' => 1, 'created_at' => '19-12-1951'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Vacunacion', 'vaccine' => 'Antiamarilica', 'via' => 'Subcutanea', 'dosis' => 1, 'created_at' => '19-12-1951'),

            // Crecimiento hasta los 7 años
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Crecimiento', 'weight' => 3.4, 'height' => 50.3, 'created_at' => '03-07-1951'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Crecimiento', 'weight' => 5.6, 'height' => 59, 'created_at' => '05-10-1951'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Crecimiento', 'weight' => 7.3, 'height' => 65, 'created_at' => '09-01-1952'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Crecimiento', 'weight' => 8.6, 'height' => 70, 'created_at' => '19-04-1952'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Crecimiento', 'weight' => 9.5, 'height' => 74, 'created_at' => '22-07-1952'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Crecimiento', 'weight' => 11, 'height' => 77, 'created_at' => '29-10-1952'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Crecimiento', 'weight' => 11.5, 'height' => 80.5, 'created_at' => '11-02-1953'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Crecimiento', 'weight' => 12.4, 'height' => 86, 'created_at' => '29-10-1954'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Crecimiento', 'weight' => 14.4, 'height' => 94, 'created_at' => '11-05-1955'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Crecimiento', 'weight' => 15.5, 'height' => 99.14, 'created_at' => '29-10-1956'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Crecimiento', 'weight' => 17.4, 'height' => 105, 'created_at' => '04-08-1957'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Crecimiento', 'weight' => 19.6, 'height' => 112.3, 'created_at' => '30-11-1958'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Crecimiento', 'weight' => 21.2, 'height' => 117.27, 'created_at' => '03-07-1959'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Crecimiento', 'weight' => 23.5, 'height' => 122.62, 'created_at' => '15-11-1960'),

            // Controles de triaje
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Triaje', 'temperature' => 36.1, 'heart_rate' => 60, 'sistole' => 105, 'diastole' => 73, 'created_at' => '03-07-1954'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Triaje', 'temperature' => 36.3, 'heart_rate' => 65, 'sistole' => 105, 'diastole' => 77, 'created_at' => '15-12-1960'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Triaje', 'temperature' => 37.2, 'heart_rate' => 70, 'sistole' => 108, 'diastole' => 77, 'created_at' => '17-01-1966'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Triaje', 'temperature' => 37.2, 'heart_rate' => 70, 'sistole' => 110, 'diastole' => 77, 'created_at' => '12-07-1971'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Triaje', 'temperature' => 37, 'heart_rate' => 80, 'sistole' => 105, 'diastole' => 75, 'created_at' => '10-09-1980'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Triaje', 'temperature' => 36, 'heart_rate' => 80, 'sistole' => 112, 'diastole' => 80, 'created_at' => '12-11-1983'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Triaje', 'temperature' => 36.5, 'heart_rate' => 70, 'sistole' => 120, 'diastole' => 81, 'created_at' => '27-05-1990'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Triaje', 'temperature' => 37.3, 'heart_rate' => 75, 'sistole' => 126, 'diastole' => 85, 'created_at' => '06-06-1996'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Triaje', 'temperature' => 36.8, 'heart_rate' => 80, 'sistole' => 121, 'diastole' => 83, 'created_at' => '30-12-2000'),

            // Geriatrico
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Medica', 'notes' => 'Posible incidencia de artrosis en cadera derecha con reflejo grado 0 en cadera izquierda', 'created_at' => '22-12-2002'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Medica', 'notes' => 'Disminución en un 10 % en oido derecho y 5 % en oido izquierdo de la agudeza auditiva', 'created_at' => '14-07-2005'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Medica', 'notes' => 'Inicios de hipertensión arterial', 'created_at' => '22-12-2006'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Medica', 'notes' => 'Hipertension arterial confirmada', 'created_at' => '19-11-2007'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Medica', 'notes' => 'Artrosis de cadera derecha', 'created_at' => '04-08-2008'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Medica', 'notes' => 'Disminución en un 20 % en oido derecho y 15 % en oido izquierdo de la agudeza auditiva', 'created_at' => '11-07-2010'),

            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Funcional', 'notes' => 'Dificultad al subir y bajar gradas', 'created_at' => '09-12-2002'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Funcional', 'notes' => 'Debilidad en brazo derecho haciendo dificil agarrar y cargar objetos', 'created_at' => '11-11-2003'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Funcional', 'notes' => 'Disminución significativa del apetito', 'created_at' => '01-09-2005'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Funcional', 'notes' => 'Sedentarismo extremo', 'created_at' => '07-11-2009'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Funcional', 'notes' => 'Incontinencia ocasional ambos esfinteres', 'created_at' => '14-12-2012'),

            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Cognitiva', 'notes' => 'Evaluacion cognitiva normal con valoracion 0 en escala de Pfeiffer', 'created_at' => '09-09-2000'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Cognitiva', 'notes' => 'Evaluacion cognitiva normal con valoracion 0 en escala de Pfeiffer', 'created_at' => '12-02-2003'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Cognitiva', 'notes' => 'Ligera desorientacion en el tiempo. Valoracion 1 en la escala de Pfeiffer. Capacidad de mantener coversacion', 'created_at' => '16-05-2007'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Cognitiva', 'notes' => 'Valoracion 1 en escala de Pfeiffer. Dificultad de mantener conversacion fluida', 'created_at' => '09-07-2009'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Cognitiva', 'notes' => 'Valoracion 4 en escala de Pfeiffer, desorientacion generalizada, algunas alteraciones mentales, dificultad al reconocer personas', 'created_at' => '29-09-2011'),

            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Social', 'notes' => 'Relacionamiento social normal con familia', 'created_at' => '22-11-2003'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Social', 'notes' => 'Interaccion social escasa, recomendacion de unirse a grupo de adultos mayores, relacionarse mas con nietos', 'created_at' => '22-11-2005'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Social', 'notes' => 'Relacionamiento normal con miembros de iglesia, familia y vecinos', 'created_at' => '22-11-2007'),
            array('user_id' => $faker->randomElement([3, 4]),'patient_id' => 2,'control_type' => 'Geriatrico', 'geriatric_type' => 'Valoracion Social', 'notes' => 'Disminucion en relaciones sociales, prefiere quedarse en casa, no interactua con personas', 'created_at' => '13-12-2009'),
        );
        foreach ($controls as $array) {
            $control = new Control($array);
            $control->save();
        }
    }
}
