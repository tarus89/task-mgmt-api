<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->truncate();
        DB::table('tasks')->truncate();
         User::factory(10)->create();
        $this->call(TaskSeeder::class);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'testuser@gmail.com',
            'password' => bcrypt('1234'),
        ]);
    }
}
