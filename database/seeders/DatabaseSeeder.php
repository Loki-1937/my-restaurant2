<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
        $users = [
            [
            'name' => 'System Admin',
            'email' => 'admin@my-restaurant.com',
            'password' => Hash::make('Qwerty1.'),
            'user_type' => 'Administrator',
            'phone' => '0720333111',
            'location' => 'Nairobi'
            ],
            [
            'name' => 'John Doe',
            'email' => 'johndoe@my-restaurant.com',
            'password' => Hash::make('Qwerty1.'),
            'user_type' => 'Employee',
            'phone' => '0720333112',
            'location' => 'Nairobi',
            ],
            [
            'name' => 'Jane Doe',
            'email' => 'janedoe@my-restaurant.com',
            'password' => Hash::make('Qwerty1.'),
            'user_type' => 'Employee',
            'phone' => '0720333113',
            'location' => 'Nairobi',
            ]
            ];
            //Step 2: insert the array using Query Builder
            DB::table('users')->insert($users);
            //call other seeders to insert records into the DB
            $this->call([
              CategorySeeder::class
            ]);
        

        
    }
}
