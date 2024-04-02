<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MagazineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('magazine')->insert([
            [
                'magazine_name' => 'TechTrends',
                'magazine_image' => '/images/Magazine/TechTrends.jpg',
                'magazine_detail' => 'Reviews of new technology products, price reviews and comparisons between devices.\n
Analyze new technology trends, such as artificial intelligence, virtual reality, Internet of Things (IoT) and blockchain.\n
Personal stories about how technology has changed their lives or businesses.',
                'faculty_id' => 1,
                'publish_date' => now()->subDays(mt_rand(1, 30)),
                'deadline' => now()->addDays(30),
            ],
            [
                'magazine_name' => 'FashionForward',
                'magazine_image' => '/images/Magazine/FashionForward.jpg',
                'magazine_detail' => 'Comment on new fashion trends and unique styles.\n
Instructions on how to coordinate outfits and create creative and personal outfits.\n
Interviews with young fashion designers and models.',
                'faculty_id' => 2,
                'publish_date' => now()->subDays(mt_rand(1, 30)),
                'deadline' => now()->addDays(30),
            ],
            [
                'magazine_name' => 'MelodyMakers',
                'magazine_image' => '/images/Magazine/MelodyMakers.jpg',
                'magazine_detail' => 'Review and recommend notable new albums and artists.\n
Analyze music and lyrics, comment on context and emotion.\n
Share stories about how music has influenced your life and memories of music.',
                'faculty_id' => 4,
                'publish_date' => now()->subDays(mt_rand(1, 30)),
                'deadline' => now()->addDays(30),
            ],
            [
                'magazine_name' => 'Wanderlust',
                'magazine_image' => '/images/Magazine/Wanderlust.jpg',
                'magazine_detail' => 'Tell about personal travel experiences and share photos from destinations.\n
Suggestions and recommendations of tourist attractions, activities and local dishes.\n
Comment on how travel has broadened horizons and discovered new cultures.',
                'faculty_id' => 2,
                'publish_date' => now()->subDays(mt_rand(1, 30)),
                'deadline' => now()->addDays(30),
            ],
            [
                'magazine_name' => 'GourmetGuide',
                'magazine_image' => '/images/Magazine/GourmetGuide.jpg',
                'magazine_detail' => 'Reviews and recommendations of delicious local and international restaurants and dishes.\n
Share recipes, cooking tips and techniques.\n
Compare culinary styles and traditional ways of preparing dishes.',
                'faculty_id' => 4,
                'publish_date' => now()->subDays(mt_rand(1, 30)),
                'deadline' => now()->addDays(30),
            ],
            [
                'magazine_name' => 'AutoWorld',
                'magazine_image' => '/images/Magazine/AutoWorld.jpg',
                'magazine_detail' => 'Reviews of new car models and advanced automotive technology.\n
Analyze trends and predict the future of the automotive industry.\n
Share your driving experience and comment on the performance and features of the vehicles.',
                'faculty_id' => 5,
                'publish_date' => now()->subDays(mt_rand(1, 30)),
                'deadline' => now()->addDays(30),
            ],
            [
                'magazine_name' => 'ScreenScene',
                'magazine_image' => '/images/Magazine/ScreenScene.jpg',
                'magazine_detail' => 'Reviews and critiques of new movies and TV shows.\n
Analysis of factors such as acting, script and directing.\n
Discuss the meaning and influence of cinematographic works on society and culture.',
                'faculty_id' => 4,
                'publish_date' => now()->subDays(mt_rand(1, 30)),
                'deadline' => now()->addDays(30),
            ],
            [
                'magazine_name' => 'HealthHaven',
                'magazine_image' => '/images/Magazine/HealthHaven.jpg',
                'magazine_detail' => 'Share knowledge about nutrition, physical fitness and psychology to maintain a healthy lifestyle.\n
Provides articles on yoga, meditation and stress reduction methods.\n
Consulting on natural beauty and skin care methods.',
                'faculty_id' => 3,
                'publish_date' => now()->subDays(mt_rand(1, 30)),
                'deadline' => now()->addDays(30),
            ],
            [
                'magazine_name' => 'SportsSpotlight',
                'magazine_image' => '/images/Magazine/SportsSpotlight.jpg',
                'magazine_detail' => 'Commentary and analysis of important sporting events and outstanding matches.\n
Interviews and introductions to sports stars and artists in the industry.\n
Predict the results of matches and discuss sports-related issues.',
                'faculty_id' => 3,
                'publish_date' => now()->subDays(mt_rand(1, 30)),
                'deadline' => now()->addDays(30),
            ],
            [
                'magazine_name' => 'BusinessBuzz',
                'magazine_image' => '/images/Magazine/BusinessBuzz.jpg',
                'magazine_detail' => 'Analyze new business trends and market fluctuations.\n
Give suggestions and advice to businesses and investors.\n
Interview successful entrepreneurs and share inspiring business stories.',
                'faculty_id' => 4,
                'publish_date' => now()->subDays(mt_rand(1, 30)),
                'deadline' => now()->addDays(30),
            ],
            [
                'magazine_name' => 'EcoEcho',
                'magazine_image' => '/images/Magazine/EcoEcho.jpg',
                'magazine_detail' => 'Propose specific solutions and actions to protect the environment and minimize environmental impacts.\n
Share information and research on environmental issues and climate change.\n
Encourage sustainable lifestyles and provide guidance on how to live greener.',
                'faculty_id' => 3,
                'publish_date' => now()->subDays(mt_rand(1, 30)),
                'deadline' => now()->addDays(30),
            ],
            [
                'magazine_name' => 'HistoryHerald',
                'magazine_image' => '/images/Magazine/HistoryHerald.jpg',
                'magazine_detail' => 'Organize discussions about the importance of history and culture in understanding the modern world.\n
Introduces and analyzes important historical events and famous figures.\n
Share personal stories and experiences about the past and future.',
                'faculty_id' => 2,
                'publish_date' => now()->subDays(mt_rand(1, 30)),
                'deadline' => now()->addDays(30),
            ],

            [
                'magazine_name' => 'BlockchainBulletin',
                'magazine_image' => '/images/Magazine/BlockchainBulletin.jpg',
                'magazine_detail' => 'Explanation and analysis of blockchain technology and its applications in various fields such as finance, healthcare and logistics.\n
Evaluate emerging new blockchain projects and applications on the market.\n
Interview leading blockchain experts and developers to better understand the trends and potential of this technology.',
                'faculty_id' => 5,
                'publish_date' => now()->subDays(mt_rand(1, 30)),
                'deadline' => now()->addDays(30),
            ],
            [
                'magazine_name' => 'EducationExpress',
                'magazine_image' => '/images/Magazine/EducationExpress.jpg',
                'magazine_detail' => 'Learn about and discuss issues in the modern education system, including curriculum improvement, teaching methods, and teacher training.\n
Share experiences and advice from students, teachers and educational administrators.\n
Analyze new trends and developments in digital education and online learning.',
                'faculty_id' => 1,
                'publish_date' => now()->subDays(mt_rand(1, 30)),
                'deadline' => now()->addDays(30),
            ],
            [
                'magazine_name' => 'SocialSpectrum',
                'magazine_image' => '/images/Magazine/SocialSpectrum.jpg',
                'magazine_detail' => 'Discuss modern social issues such as cultural diversity, gender equality, and LGBT+ rights.\n
Analyze current trends and changes in society and culture.\n
Share personal stories and perspectives on social issues from the student community.',
                'faculty_id' => 3,
                'publish_date' => now()->subDays(mt_rand(1, 30)),
                'deadline' => now()->addDays(30),
            ],
            [
                'magazine_name' => 'ArtisticAvenue',
                'magazine_image' => '/images/Magazine/ArtisticAvenue.jpg',
                'magazine_detail' => 'Introduction to emerging artists and contemporary art trends.\n
Review and analysis of unique works of art and important art events.\n
Discuss the meaning and role of art in society and personal life.',
                'faculty_id' => 4,
                'publish_date' => now()->subDays(mt_rand(1, 30)),
                'deadline' => now()->addDays(30),
            ],
            [
                'magazine_name' => 'LifestyleLuxe',
                'magazine_image' => '/images/Magazine/LifestyleLuxe.jpg',
                'magazine_detail' => 'Introducing a luxurious lifestyle and premium amenities.\n
Recommend experiences and products for those who love a luxurious lifestyle.\n
Share advice on how to create a classy and meaningful life.',
                'faculty_id' => 2,
                'publish_date' => now()->subDays(mt_rand(1, 30)),
                'deadline' => now()->addDays(30),
            ],
            [
                'magazine_name' => 'ScienceSphere',
                'magazine_image' => '/images/Magazine/ScienceSphere.jpg',
                'magazine_detail' => 'Reviews and introduces new scientific findings and research advances.\n
Analyze current scientific and technological issues, such as climate change, renewable energy and molecular biology.\n
Discuss the applications and potential of science and technology in everyday life and across industries.',
                'faculty_id' => 4,
                'publish_date' => now()->subDays(mt_rand(1, 30)),
                'deadline' => now()->addDays(30),
            ],
            [
                'magazine_name' => 'SilverScreen',
                'magazine_image' => '/images/Magazine/SilverScreen.jpg',
                'magazine_detail' => 'Write detailed reviews of new movies, including reviews of acting, script, directing, and other factors.\n
Analyze the artistic and technical elements of film production, such as performance, image and sound.\n
Compare old and new versions of the same film or series, commenting on changes and progression over time.\n
Analyzes the effects of films and television shows on culture and society, as well as ethical and ideological issues.',
                'faculty_id' => 3,
                'publish_date' => now()->subDays(mt_rand(1, 30)),
                'deadline' => now()->addDays(30),
            ],
            [
                'magazine_name' => 'GreenLiving',
                'magazine_image' => '/images/Magazine/GreenLiving.jpg',
                'magazine_detail' => 'Share experiences and advice on how to reduce waste, save water and electricity, and use recycled materials.\n
Introducing new technologies and products that support sustainable living, including solar energy systems, water-saving devices and recycling systems.\n
Provides information and guidance on growing plants, gardening, and creating a green living space in the home.\n
Reflects on changes and progress in promoting sustainable lifestyles and energy efficiency around the world.',
                'faculty_id' => 5,
                'publish_date' => now()->subDays(mt_rand(1, 30)),
                'deadline' => now()->addDays(30),
            ],
        ]);
    }
}
