<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

      
        DB::table('tasks')->truncate();  
        DB::table('users')->truncate();  

       
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

       
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'password' => Hash::make('password1'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane.smith@example.com',
                'password' => Hash::make('password2'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alice Johnson',
                'email' => 'alice.johnson@example.com',
                'password' => Hash::make('password3'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bob Brown',
                'email' => 'bob.brown@example.com',
                'password' => Hash::make('password4'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Charlie Davis',
                'email' => 'charlie.davis@example.com',
                'password' => Hash::make('password5'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Emma Wilson',
                'email' => 'emma.wilson@example.com',
                'password' => Hash::make('password6'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Michael Taylor',
                'email' => 'michael.taylor@example.com',
                'password' => Hash::make('password7'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sophia Miller',
                'email' => 'sophia.miller@example.com',
                'password' => Hash::make('password8'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lucas Moore',
                'email' => 'lucas.moore@example.com',
                'password' => Hash::make('password9'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Olivia Anderson',
                'email' => 'olivia.anderson@example.com',
                'password' => Hash::make('password10'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
