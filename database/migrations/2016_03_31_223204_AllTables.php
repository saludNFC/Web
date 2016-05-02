<?php


// SGGM hace todo en una sola migracion por alguna razon
// Parece ser mas facil para que cuando se hace migrate:refresh evitar que
// hayan incongruencias al borrar una tabla que dependa del foreign de otra

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Users table
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
        });

        // Password resets table
        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamp('created_at');
        });

        // Patients table
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            //Foreign key
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->string('historia')->unique();
            $table->string('ci')->unique();
            $table->enum('emision', ['BN', 'CH', 'CB', 'LP', 'OR', 'PA', 'PT', 'SC', 'TJ']);
            $table->string('nombre');
            $table->string('apellido');
            $table->string('sexo');
            $table->date('fecha_nac')->nullable();
            $table->string('lugar_nac')->nullable();
            $table->string('grupo_sanguineo')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Realmente necesito esta tabla!!!??? KEEP IT SIMPLE STUPID!
        // STATIC table
        // History table
        // Schema::create('history_types', function(Blueprint $table){
        //     $table->increments('id');
        //     $table->string('type');
        //     $table->timestamps();
        // });

        // Histories table
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('id');
            // Foreign Keys
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')
                ->references('id')->on('patients');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->enum('history_type', ['Personal', 'Familiar', 'Medicamentos']);

            // familiar
            $table->text('grade')->nullable();
            $table->text('illness')->nullable();

            // personal
            $table->enum('type_personal', ['Alergia', 'Enfermedad', 'Cirugia'])->nullable();
            $table->longtext('description')->nullable();

            // medicine
            $table->text('med')->nullable();
            $table->enum('via', ['Oral', 'Sublingual', 'Parenteral', 'Rectal', 'Topica', 'Percutánea'])->nullable();
            $table->date('date_ini')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        // STATIC table
        // History table
        // Schema::create('control_types', function(Blueprint $table){
        //     $table->increments('id');
        //     $table->string('type');
        //     $table->timestamps();
        // });

        // Controls table
        Schema::create('controls', function (Blueprint $table) {
            $table->increments('id');
            // Foreign keys
            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')
                ->references('id')
                ->on('patients');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');


            $table->enum('control_type', ['Vacunacion', 'Crecimiento', 'Triaje', 'Geriatrico']);

            // Vacunacion
            $table->text('vaccine')->nullable();
            $table->enum('via', ['Intra-dermica', 'Intra-muscular', 'Oral', 'Subcutanea'])->nullable();
            $table->integer('dosis')->nullable();

            // Crecimiento y Desarrollo
            $table->float('weight')->nullable();
            $table->float('height')->nullable();

            // Triaje
            $table->float('temperature')->nullable();
            $table->integer('heart_rate')->nullable();
            $table->integer('sistole')->nullable();
            $table->integer('diastole')->nullable();

            // Geriatrico
            $table->enum('geriatric_type', ['Valoracion Medica', 'Valoracion Funcional', 'Valoracion Cognitiva', 'Valoracion Social'])->nullable();
            $table->longtext('notes')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        // Consultations table
        Schema::create('consultations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('patient_id')->unsigned();
            $table->foreign('patient_id')
                ->references('id')
                ->on('patients');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->longtext('anamnesis');
            $table->longtext('physical_exam');
            $table->longtext('diagnosis');
            $table->longtext('treatment');
            $table->longtext('justification');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('consultations');
        Schema::drop('controls');
        Schema::drop('histories');
        Schema::drop('patients');
        Schema::drop('password_resets');
        Schema::drop('users');
    }
}
