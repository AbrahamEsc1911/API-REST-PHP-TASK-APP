<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->truncate();

        $statuses = ['pending', 'in progress', 'done'];

        for ($user_id = 1; $user_id <= 10; $user_id++) {
            for ($i = 1; $i <= 5; $i++) {
                DB::table('tasks')->insert([
                    'title' => 'Task ' . $i . ' for User ' . $user_id,
                    'description' => 'Description of task ' . $i . ' for user ' . $user_id,
                    'status' => $statuses[array_rand($statuses)], // Selecciona un estado aleatorio
                    'user_id' => $user_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
