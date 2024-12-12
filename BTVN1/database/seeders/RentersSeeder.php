<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RentersSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('renters')->insert([
            [
                'name' => 'Nguyễn Văn A',
                'phone_number' => '0987654321',
                'email' => 'nva@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Thêm dữ liệu khác nếu cần
        ]);
    }
}
