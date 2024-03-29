<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContributionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contributions')->insert([
            [
                'user_id' => 8,
                'magazine_id' => 1,
                'content' => '/contributions-file/COMP1640_Ver2.doc',
                'image' => '/images/contribution-img/Jetragon.png',
                'submission_date' => now(),
                'status' => 'pending',
            ],
            [
                'user_id' => 9,
                'magazine_id' => 1,
                'content' => '/contributions-file/COMP1640_Ver2.doc',
                'image' => '/images/contribution-img/Jetragon.png',
                'submission_date' => now(),
                'status' => 'pending',
            ],
            [
                'user_id' => 17,
                'magazine_id' => 3,
                'content' => '/contributions-file/COMP1640_Ver2.doc',
                'image' => '/images/contribution-img/Jetragon.png',
                'submission_date' => now(),
                'status' => 'pending',
            ],
            [
                'user_id' => 19,
                'magazine_id' => 3,
                'content' => '/contributions-file/COMP1640_Ver2.doc',
                'image' => '/images/contribution-img/Jetragon.png',
                'submission_date' => now(),
                'status' => 'pending',
            ],
            [
                'user_id' => 12,
                'magazine_id' => 4,
                'content' => '/contributions-file/COMP1640_Ver2.doc',
                'image' => '/images/contribution-img/Jetragon.png',
                'submission_date' => now(),
                'status' => 'pending',
            ],
            [
                'user_id' =>11,
                'magazine_id' => 4,
                'content' => '/contributions-file/COMP1640_Ver2.doc',
                'image' => '/images/contribution-img/Jetragon.png',
                'submission_date' => now(),
                'status' => 'pending',
            ],
            [
                'user_id' => 21,
                'magazine_id' => 6,
                'content' => '/contributions-file/COMP1640_Ver2.doc',
                'image' => '/images/contribution-img/Jetragon.png',
                'submission_date' => now(),
                'status' => 'pending',
            ],
            [
                'user_id' => 22,
                'magazine_id' => 6,
                'content' => '/contributions-file/COMP1640_Ver2.doc',
                'image' => '/images/contribution-img/Jetragon.png',
                'submission_date' => now(),
                'status' => 'pending',
            ],
            [
                'user_id' => 16,
                'magazine_id' => 8,
                'content' => '/contributions-file/COMP1640_Ver2.doc',
                'image' => '/images/contribution-img/Jetragon.png',
                'submission_date' => now(),
                'status' => 'pending',
            ],
            [
                'user_id' => 14,
                'magazine_id' => 8,
                'content' => '/contributions-file/COMP1640_Ver2.doc',
                'image' => '/images/contribution-img/Jetragon.png',
                'submission_date' => now(),
                'status' => 'pending',
            ],
        ]);
    }
}
