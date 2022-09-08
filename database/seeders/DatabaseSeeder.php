<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'personal_number' => '12345',
            'title' =>  null,
            'last_name' => 'Testing',
            'first_name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(15),
        ]);

        //User::factory(50)->create();
    }
}
