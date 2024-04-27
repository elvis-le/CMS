<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faculties')->insert([
            [
                'faculty' => 'Information technology',
                'created_at' => now(),
            ],
            [
                'faculty' => 'Graphic design',
                'created_at' => now(),
            ],
            [
                'faculty' => 'Business administration',
                'created_at' => now(),
            ],
            [
                'faculty' => 'Marketing',
                'created_at' => now(),
            ],
            [
                'faculty' => 'Artificial intelligence',
                'created_at' => now(),
            ]
        ]);
    }
}
