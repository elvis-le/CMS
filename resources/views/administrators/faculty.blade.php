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
                'title' => "NextGen Innovations",
                'content' => "NextGen Innovations delves deeper into the latest technological advancements across various sectors, including artificial intelligence, virtual reality, Internet of Things (IoT), and blockchain. We provide detailed evaluations, price comparisons, and insightful analyses, aiming to offer readers a clearer understanding of the tech landscape. NextGen Innovations promises to keep you updated with the latest tech news.",
                'submission_date' => "2023-04-05 06:18:13",
                'backgroundImage' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/TechTrends.jpg',
                'location' => '["https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/TldqMV7gAx_Enterprise Web Software Development.docx""]',
                'allowGuest' => true,
                'user_id' => 8,
                'academicYear_id' => 1,
            ],
            [
                'title' => 'Stories of Transformation',
                'content' => 'TechTalk: Stories of Transformation is a platform to share personal narratives about how technology has changed lives and business operations. From AI solutions to IoT applications, we share inspiring stories of creativity, adaptation, and perseverance. Through these stories, we highlight the power of technology in transforming not only industries but also individual lives.',
                'backgroundImage' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/TechTrends.jpg',
                'submission_date' => "2023-04-08 06:18:13",
                'location' => '["https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/b93KZXcaum_1_43-IoT-1.pdf"]',
                'allowGuest' => true,
                'user_id' => 8,
                'academicYear_id' => 1,
            ],
            [
                'title' => 'Gadget Guru Reviews',
                'content' => 'Reviews of new technology products, price reviews and comparisons between devices.
Analyze new technology trends, such as artificial intelligence, virtual reality, Internet of Things (IoT) and blockchain.
Personal stories about how technology has changed their lives or businesses.',
                'backgroundImage' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/TechTrends.jpg',
                'submission_date' => "2023-03-20 06:18:13",
                'location' => '["https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/TldqMV7gAx_Enterprise Web Software Development.docx","https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/vI7mu62gFo_Screenshot 2024-03-26 155234.png","https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/b93KZXcaum_1_43-IoT-1.pdf"]',
                'allowGuest' => true,
                'user_id' => 8,
                'academicYear_id' => 1,
            ],
            [
                'title' => 'TechTrends',
                'content' => 'Reviews of new technology products, price reviews and comparisons between devices.
Analyze new technology trends, such as artificial intelligence, virtual reality, Internet of Things (IoT) and blockchain.
Personal stories about how technology has changed their lives or businesses.',
                'backgroundImage' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/TechTrends.jpg',
                'submission_date' => "2023-03-20 06:18:13",
                'location' => '["https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/TldqMV7gAx_Enterprise Web Software Development.docx","https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/vI7mu62gFo_Screenshot 2024-03-26 155234.png","https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/b93KZXcaum_1_43-IoT-1.pdf"]',
                'allowGuest' => true,
                'user_id' => 8,
                'academicYear_id' => 1,
            ],
            [
                'title' => 'TechTrends',
                'content' => 'Reviews of new technology products, price reviews and comparisons between devices.
Analyze new technology trends, such as artificial intelligence, virtual reality, Internet of Things (IoT) and blockchain.
Personal stories about how technology has changed their lives or businesses.',
                'backgroundImage' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/TechTrends.jpg',
                'submission_date' => "2023-03-20 06:18:13",
                'location' => '["https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/TldqMV7gAx_Enterprise Web Software Development.docx","https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/vI7mu62gFo_Screenshot 2024-03-26 155234.png","https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/b93KZXcaum_1_43-IoT-1.pdf"]',
                'allowGuest' => true,
                'user_id' => 8,
                'academicYear_id' => 1,
            ],
        ]);
    }
}