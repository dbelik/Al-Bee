<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_id = DB::table('user_role')->where('role', '=', "Admin")->select('id')->first()->id;

        DB::table('users')->insert([
            'email' => $_ENV["DB_SEEDER_USER_EMAIL"],
            'password' => $_ENV["DB_SEEDER_USER_PASSWORD"],
            'first_name' => 'Alabi',
            'second_name' => 'Admin',
            'role_id' => $role_id
        ]);
    }
}
