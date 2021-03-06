<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('ACLSeeder');
        $this->call('PeopleSeeder');
        // $this->call('StaticTablesSeeder');
        $this->call('SeederForHistories');
        $this->call('SeederForControls');
        $this->call('SeederForConsultations');
    }
}
