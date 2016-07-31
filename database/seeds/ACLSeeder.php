<?php

use Illuminate\Database\Seeder;

class ACLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // USERS
        DB::table('users')->delete();
        $user = array(
            array('name' => 'Edgar Torrez', 'email' => 'root@somewhere.com', 'password' => bcrypt('123456')), //1
            array('name' => 'Maria Paredes', 'email' => 'admin@somewhere.com', 'password' => bcrypt('123456')), //2
            array('name' => 'Daniel Bascope', 'email' => 'doctor@somewhere.com', 'password' => bcrypt('123456')), //3
            array('name' => 'Ana Arce', 'email' => 'nurse@somewhere.com', 'password' => bcrypt('123456')) //4
        );
        DB::table('users')->insert($user);

        // ROLES
        DB::table('roles')->delete();
        $roles = array(
            array('name' => 'root', 'label' => 'Super usuario'), //1
            array('name' => 'admin', 'label' => 'Usuario administrador'), //2
            array('name' => 'doctor', 'label' => 'Usuario de tipo doctor'), //3
            array('name' => 'nurse', 'label' => 'Usuario de tipo enfermera'), //4
        );
        DB::table('roles')->insert($roles);

        // PERMISOS
        // DB::table('permissions')->delete();
        // $permissions = array(
        //     array('name' => 'complete_people'), //1
        //     array('name' => 'read_only_people'), //2
        //     array('name' => 'complete_med_rec'), //3
        //     array('name' => 'read_only_med_rec'), //4
        //     array('name' => 'mixed_med_rec') //5
        // );
        // DB::table('permissions')->insert($permissions);

        // permission_role
        // DB::table('permission_role')->delete();
        // $pr = array(
        //     array('permission_id' => 1, 'role_id' => 1), // root => complete_people
        //     array('permission_id' => 3, 'role_id' => 1), // root => complete_med_rec
        //     array('permission_id' => 1, 'role_id' => 2), // admin => complete_people
        //     array('permission_id' => 4, 'role_id' => 2), // admin => read_only_med_rec
        //     array('permission_id' => 2, 'role_id' => 3), // doctor => read_only_people
        //     array('permission_id' => 3, 'role_id' => 3), // doctor => complete_med_rec
        //     array('permission_id' => 2, 'role_id' => 4), // nurse => read_only_people
        //     array('permission_id' => 5, 'role_id' => 4)  // nurse => mixed_med_rec
        // );
        // DB::table('permission_role')->insert($pr);

        // role_user
        DB::table('role_user')->delete();
        $ru = array(
            array('role_id' => 1, 'user_id' => 1), // Root User is root
            array('role_id' => 2, 'user_id' => 2), // Admin User is admin
            array('role_id' => 3, 'user_id' => 3), // Doctor User is doctor
            array('role_id' => 4, 'user_id' => 4)  // Nurse User is nurse
        );
        DB::table('role_user')->insert($ru);
    }
}
