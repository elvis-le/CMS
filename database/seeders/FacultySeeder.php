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
            ['faculty' => 'Information technology'],
            ['faculty' => 'Graphic design'],
            ['faculty' => 'Business administration'],
            ['faculty' => 'Marketing'],
            ['faculty' => 'Artificial intelligence'],
        ]);
    }
}
