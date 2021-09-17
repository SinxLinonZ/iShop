<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('roles')->insert([
            'name' => "admin"
        ]);
        DB::table('roles')->insert([
            'name' => "client"
        ]);

        DB::table('users')->insert([
            'name' => "Admin",
            'email' => "asd.asd@asd.fgh",
            'password' => Hash::make('1234qwer'),
            "role_id" => 1
        ]);
        DB::table('users')->insert([
            'name' => "Client",
            'email' => "aasd.asd@asd.fgh",
            'password' => Hash::make('1234qwer'),
            "role_id" => 2
        ]);
    }
}
