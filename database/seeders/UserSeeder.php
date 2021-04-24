<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => "Roberto Diaz Diaz",
            'email'     => "robertodd07@gmail.com",
            'password'  => bcrypt('password')
        ]);
        User::factory(90)->create();
    }
}
