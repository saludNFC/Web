<?php

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
        // Schema::create('users', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('name');
        //     $table->string('email')->unique();
        //     $table->string('password', 60);
        //     $table->rememberToken();
        //     $table->timestamps();
        // });

        // Password resets table
        // Schema::create('password_resets', function (Blueprint $table) {
        //     $table->string('email')->index();
        //     $table->string('token')->index();
        //     $table->timestamp('created_at');
        // });

        // Patients table
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            //Foreign key
            // $table->integer('user_id')->unsigned();

            $table->string('ci')->unique();
            $table->string('emision');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('sexo');
            $table->date('fecha_nac')->nullable();
            $table->string('lugar_nac')->nullable();
            $table->string('grupo_sanguineo')->nullable();
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('user_id')
                // ->references('id')->on('users');
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

            $table->string('history_type');
            $table->longtext('story');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('patient_id')
                ->references('id')->on('patients');
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

            $table->integer('patient_id')->unsigned();

            $table->string('control_type');
            $table->longtext('note')->nullable();
            $table->float('value')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('patient_id')
                ->references('id')->on('patients');
        });

        // Consultations table
        Schema::create('consultations', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('patient_id')->unsigned();

            $table->longtext('anamnesis');
            $table->longtext('physical_exam');
            $table->longtext('diagnosis');
            $table->longtext('treatment');
            $table->longtext('justification');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('patient_id')
                ->references('id')->on('patients');
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
        // Schema::drop('control_types');
        Schema::drop('histories');
        Schema::drop('patients');
        // Schema::drop('password_resets');
        // Schema::drop('users');
    }
}