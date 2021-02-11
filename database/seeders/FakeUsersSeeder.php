<?php

namespace Database\Seeders;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Database\Seeder;

class FakeUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->count(100)->create();
    }
}
