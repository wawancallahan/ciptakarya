<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'email' => 'admin@gmail.com'
        ], [
            'password' => bcrypt('123123'),
            'name' => 'admin' 
        ]);
    }
}
