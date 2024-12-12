<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComputerSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Computer::create([
            'computer_name' => 'Lab1_PC05',
            'model' => 'Dell Optiplex 7090',
            'operating_system'=> 'Window 10 Pro',
            'processor' => 'Intel Core i5-11400',
            'memory' => 8,
            'available' => true,
        ]);
    }
}
