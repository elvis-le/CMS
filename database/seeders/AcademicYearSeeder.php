<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('academicYear')->insert([
            [
                'name' => 'TechTrends',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/TechTrends.jpg',
                'detail' => 'Reviews of new technology products, price reviews and comparisons between devices.
Analyze new technology trends, such as artificial intelligence, virtual reality, Internet of Things (IoT) and blockchain.
Personal stories about how technology has changed their lives or businesses.',
                'publish_date' => "2023-03-20 06:18:13",
                'startDate' => "2023-04-02",
                'deadline' => "2023-04-20",
                'finalDeadline' => "2023-05-15",
            ],
            [
                'name' => 'FashionForward',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/FashionForward.jpg',
                'detail' => 'Comment on new fashion trends and unique styles.
Instructions on how to coordinate outfits and create creative and personal outfits.
Interviews with young fashion designers and models.',
                'publish_date' => "2023-01-04 05:18:13",
                'startDate' => "2023-01-08",
                'deadline' => "2023-02-25",
                'finalDeadline' => "2023-03-05",
            ],
            [
                'name' => 'MelodyMakers',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/MelodyMakers.jpg',
                'detail' => 'Review and recommend notable new albums and artists.
Analyze music and lyrics, comment on context and emotion.
Share stories about how music has influenced your life and memories of music.',
                'publish_date' => "2022-03-29 06:50:13",
                'startDate' => "2022-04-02",
                'deadline' => "2022-04-20",
                'finalDeadline' => "2022-05-05",
            ],
            [
                'name' => 'Wanderlust',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/Wanderlust.jpg',
                'detail' => 'Tell about personal travel experiences and share photos from destinations.
Suggestions and recommendations of tourist attractions, activities and local dishes.
Comment on how travel has broadened horizons and discovered new cultures.',
                'publish_date' => "2022-05-10 09:25:42",
                'startDate' => "2022-05-15",
                'deadline' => "2022-06-10",
                'finalDeadline' => "2022-07-05",
            ],
            [
                'name' => 'GourmetGuide',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/GourmetGuide.jpg',
                'detail' => 'Reviews and recommendations of delicious local and international restaurants and dishes.
Share recipes, cooking tips and techniques.
Compare culinary styles and traditional ways of preparing dishes.',
                'publish_date' => "2022-06-20 15:30:10",
                'startDate' => "2022-06-25",
                'deadline' => "2022-07-20",
                'finalDeadline' => "2022-08-10",
            ],
            [
                'name' => 'AutoWorld',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/AutoWorld.jpg',
                'detail' => 'Reviews of new car models and advanced automotive technology.
Analyze trends and predict the future of the automotive industry.
Share your driving experience and comment on the performance and features of the vehicles.',
                'publish_date' => "2022-07-01 11:11:11",
                'startDate' => "2022-07-05",
                'deadline' => "2022-08-01",
                'finalDeadline' => "2022-08-20",
            ],
            [
                'name' => 'ScreenScene',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/ScreenScene.jpg',
                'detail' => 'Reviews and critiques of new movies and TV shows.
Analysis of factors such as acting, script and directing.
Discuss the meaning and influence of cinematographic works on society and culture.',
                'publish_date' => "2022-08-10 18:45:36",
                'startDate' => "2022-08-15",
                'deadline' => "2022-09-10",
                'finalDeadline' => "2022-09-20",
            ],
            [
                'name' => 'HealthHaven',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/HealthHaven.jpg',
                'detail' => 'Share knowledge about nutrition, physical fitness and psychology to maintain a healthy lifestyle.
Provides articles on yoga, meditation and stress reduction methods.
Consulting on natural beauty and skin care methods.',
                'publish_date' => "2022-09-05 07:30:00",
                'startDate' => "2022-09-10",
                'deadline' => "2022-10-05",
                'finalDeadline' => "2022-10-25",
            ],
            [
                'name' => 'SportsSpotlight',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/SportsSpotlight.jpg',
                'detail' => 'Commentary and analysis of important sporting events and outstanding matches.
Interviews and introductions to sports stars and artists in the industry.
Predict the results of matches and discuss sports-related issues.',
                'publish_date' => "2022-10-15 13:55:20",
                'startDate' => "2022-10-20",
                'deadline' => "2022-11-15",
                'finalDeadline' => "2022-12-05",
            ],
            [
                'name' => 'BusinessBuzz',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/BusinessBuzz.jpg',
                'detail' => 'Analyze new business trends and market fluctuations.
Give suggestions and advice to businesses and investors.
Interview successful entrepreneurs and share inspiring business stories.',
                'publish_date' => "2022-11-02 10:10:10",
                'startDate' => "2022-11-05",
                'deadline' => "2022-12-02",
                'finalDeadline' => "2022-12-20",
            ],
            [
                'name' => 'EcoEcho',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/EcoEcho.jpg',
                'detail' => 'Propose specific solutions and actions to protect the environment and minimize environmental impacts.
Share information and research on environmental issues and climate change.
Encourage sustainable lifestyles and provide guidance on how to live greener.',
                'publish_date' => "2022-12-12 20:20:20",
                'startDate' => "2022-12-15",
                'deadline' => "2023-01-12",
                'finalDeadline' => "2023-01-30",
            ],
            [
                'name' => 'HistoryHerald',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/HistoryHerald.jpg',
                'detail' => 'Organize discussions about the importance of history and culture in understanding the modern world.
Introduces and analyzes important historical events and famous figures.
Share personal stories and experiences about the past and future.',
                'publish_date' => "2023-01-08 04:00:00",
                'startDate' => "2023-01-10",
                'deadline' => "2023-02-08",
                'finalDeadline' => "2023-02-25",
            ],

            [
                'name' => 'BlockchainBulletin',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/BlockchainBulletin.jpg',
                'detail' => 'Explanation and analysis of blockchain technology and its applications in various fields such as finance, healthcare and logistics.
Evaluate emerging new blockchain projects and applications on the market.
Interview leading blockchain experts and developers to better understand the trends and potential of this technology.',
                'publish_date' => "2023-02-25 12:12:12",
                'startDate' => "2023-03-01",
                'deadline' => "2023-03-20",
                'finalDeadline' => "2023-04-15",
            ],
            [
                'name' => 'EducationExpress',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/EducationExpress.jpg',
                'detail' => 'Learn about and discuss issues in the modern education system, including curriculum improvement, teaching methods, and teacher training.
Share experiences and advice from students, teachers and educational administrators.
Analyze new trends and developments in digital education and online learning.',
                'publish_date' => "2023-03-10 08:30:45",
                'startDate' => "2023-03-15",
                'deadline' => "2023-04-10",
                'finalDeadline' => "2023-04-30",
            ],
            [
                'name' => 'SocialSpectrum',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/SocialSpectrum.jpg',
                'detail' => 'Discuss modern social issues such as cultural diversity, gender equality, and LGBT+ rights.
Analyze current trends and changes in society and culture.
Share personal stories and perspectives on social issues from the student community.',
                'publish_date' => "2023-04-05 17:17:17",
                'startDate' => "2023-04-10",
                'deadline' => "2023-05-05",
                'finalDeadline' => "2023-05-25",
            ],
            [
                'name' => 'ArtisticAvenue',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/ArtisticAvenue.jpg',
                'detail' => 'Introduction to emerging artists and contemporary art trends.
Review and analysis of unique works of art and important art events.
Discuss the meaning and role of art in society and personal life.',
                'publish_date' => "2023-05-20 22:22:22",
                'startDate' => "2023-05-25",
                'deadline' => "2023-06-20",
                'finalDeadline' => "2023-07-05",
            ],
            [
                'name' => 'LifestyleLuxe',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/LifestyleLuxe.jpg',
                'detail' => 'Introducing a luxurious lifestyle and premium amenities.
Recommend experiences and products for those who love a luxurious lifestyle.
Share advice on how to create a classy and meaningful life.',
                'publish_date' => "2023-06-18 11:59:59",
                'startDate' => "2023-06-20",
                'deadline' => "2023-07-18",
                'finalDeadline' => "2023-08-05",
            ],
            [
                'name' => 'ScienceSphere',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/ScienceSphere.jpg',
                'detail' => 'Reviews and introduces new scientific findings and research advances.
Analyze current scientific and technological issues, such as climate change, renewable energy and molecular biology.
Discuss the applications and potential of science and technology in everyday life and across industries.',
                'publish_date' => "2022-07-05 14:14:14",
                'startDate' => "2022-07-10",
                'deadline' => "2022-08-05",
                'finalDeadline' => "2022-08-25",
            ],
            [
                'name' => 'SilverScreen',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/SilverScreen.jpg',
                'detail' => 'Write detailed reviews of new movies, including reviews of acting, script, directing, and other factors.
Analyze the artistic and technical elements of film production, such as performance, image and sound.
Compare old and new versions of the same film or series, commenting on changes and progression over time.
Analyzes the effects of films and television shows on culture and society, as well as ethical and ideological issues.',
                'publish_date' => "2022-08-15 09:30:30",
                'startDate' => "2022-08-20",
                'deadline' => "2022-09-15",
                'finalDeadline' => "2022-10-05",
            ],
            [
                'name' => 'GreenLiving',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/GreenLiving.jpg',
                'detail' => 'Share experiences and advice on how to reduce waste, save water and electricity, and use recycled materials.
Introducing new technologies and products that support sustainable living, including solar energy systems, water-saving devices and recycling systems.
Provides information and guidance on growing plants, gardening, and creating a green living space in the home.
Reflects on changes and progress in promoting sustainable lifestyles and energy efficiency around the world.',
                'publish_date' => "2022-09-10 03:45:00",
                'startDate' => "2022-09-15",
                'deadline' => "2022-10-10",
                'finalDeadline' => "2022-10-30",
            ],
            [
                'name' => 'EcoEvolutions',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/EcoEvolutions.jpg',
                'detail' => 'Exploration of eco-friendly practices, sustainable living, and green innovations.
                Reviews of environmentally conscious products and lifestyle changes.
                Interviews with environmental activists and experts.',
                'publish_date' => "2024-04-10 03:45:00",
                'startDate' => "2024-04-20",
                'deadline' => "2024-05-10",
                'finalDeadline' => "2024-05-15",
            ],
            [
                'name' => 'HealthHorizons',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/HealthHorizons.jpg',
                'detail' => 'Insights into the latest developments in healthcare, wellness tips, and medical breakthroughs.
                Reviews of health-related products and technologies.
                Personal stories of overcoming health challenges.',
                'publish_date' => "2024-04-13 03:50:00",
                'startDate' => "2024-04-20",
                'deadline' => "2024-05-10",
                'finalDeadline' => "2024-05-15",
            ],
            [
                'name' => 'CulinaryChronicles',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/CulinaryChronicles.jpg',
                'detail' => 'Culinary trends, recipes, and cooking techniques.
                Reviews of kitchen gadgets and appliances.
                Interviews with chefs and food enthusiasts.',
                'publish_date' => "2024-04-13 03:50:00",
                'startDate' => "2024-04-20",
                'deadline' => "2024-05-10",
                'finalDeadline' => "2024-05-15",
            ],
            [
                'name' => 'MindMatters',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/MindMatters.jpg',
                'detail' => 'Mental health awareness, coping strategies, and mindfulness practices.
                Reviews of apps and resources for mental well-being.
                Personal stories of resilience and overcoming mental health challenges.',
                'publish_date' => "2024-04-13 03:50:00",
                'startDate' => "2024-04-20",
                'deadline' => "2024-05-10",
                'finalDeadline' => "2024-05-15",
            ],
            [
                'name' => 'EduExplore',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/EduExplore.jpg',
                'detail' => 'Mental health awareness, coping strategies, and mindfulness practices.
                Reviews of apps and resources for mental well-being.
                Personal stories of resilience and overcoming mental health challenges.',
                'publish_date' => "2024-04-13 03:50:00",
                'startDate' => "2024-04-20",
                'deadline' => "2024-05-10",
                'finalDeadline' => "2024-05-15",
            ],
            [
                'name' => 'AdventureAwaits',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/AdventureAwaits.jpg',
                'detail' => 'Travel destinations, tips, and itineraries.
                Reviews of accommodations, tours, and travel gear.
                Personal travel experiences and adventures shared by globetrotters.',
                'publish_date' => "2024-04-13 03:50:00",
                'startDate' => "2024-04-20",
                'deadline' => "2024-05-10",
                'finalDeadline' => "2024-05-15",
            ],
            [
                'name' => 'FinTechFocus',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/FinTechFocus.jpg',
                'detail' => 'Financial technology trends, investment strategies, and fintech innovations.
                Reviews of financial apps and services.
                Interviews with fintech entrepreneurs and experts.',
                'publish_date' => "2024-04-13 03:50:00",
                'startDate' => "2024-04-20",
                'deadline' => "2024-05-10",
                'finalDeadline' => "2024-05-15",
            ],
            [
                'name' => 'ArtisticExpressions',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/ArtisticExpressions.jpg',
                'detail' => 'Artistic trends, techniques, and creative inspirations.
                Reviews of art supplies and exhibitions.
                Interviews with artists from various disciplines.',
                'publish_date' => "2024-04-13 03:50:00",
                'startDate' => "2024-04-20",
                'deadline' => "2024-05-10",
                'finalDeadline' => "2024-05-15",
            ],
            [
                'name' => 'ParentingPulse',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/ParentingPulse.jpg',
                'detail' => 'Parenting advice, child development insights, and family activities.
                Reviews of parenting products and resources.
                Interviews with parenting experts and psychologists.',
                'publish_date' => "2024-04-13 03:50:00",
                'startDate' => "2024-04-20",
                'deadline' => "2024-05-10",
                'finalDeadline' => "2024-05-15",
            ],
            [
                'name' => 'SciTechSavvy',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/SciTechSavvy.jpg',
                'detail' => 'Science news, breakthroughs, and discoveries.
                Reviews of scientific tools and equipment.
                Interviews with scientists and researchers.',
                'publish_date' => "2024-04-13 03:50:00",
                'startDate' => "2024-04-20",
                'deadline' => "2024-05-10",
                'finalDeadline' => "2024-05-15",
            ],
            [
                'name' => 'HomeHacks',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/HomeHacks.jpg',
                'detail' => 'Home improvement tips, DIY projects, and organization hacks.
                Reviews of home products and tools.
                Interviews with interior designers and home experts.',
                'publish_date' => "2024-04-13 03:50:00",
                'startDate' => "2024-04-20",
                'deadline' => "2024-05-10",
                'finalDeadline' => "2024-05-15",
            ],
            [
                'name' => 'MusicMilestones',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/MusicMilestones.jpg',
                'detail' => 'Music industry news, artist spotlights, and album reviews.
                Interviews with musicians and music producers.
                Coverage of music festivals and events.',
                'publish_date' => "2024-04-13 03:50:00",
                'startDate' => "2024-04-20",
                'deadline' => "2024-05-10",
                'finalDeadline' => "2024-05-15",
            ],
            [
                'name' => 'PetPals',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/PetPals.jpg',
                'detail' => 'Pet care advice, training tips, and pet product reviews.
                Interviews with veterinarians and animal behaviorists.
                Heartwarming stories of pet adoption and companionship.',
                'publish_date' => "2024-04-13 03:50:00",
                'startDate' => "2024-04-20",
                'deadline' => "2024-05-10",
                'finalDeadline' => "2024-05-15",
            ],
            [
                'name' => 'GreenThumb',
                'image' => 'https://guxdryphbnffhexbtcvn.supabase.co/storage/v1/object/public/magazine-contribution-bucket/GreenThumb.jpg',
                'detail' => 'Gardening tips, plant care guides, and garden design inspiration.
                Reviews of gardening tools and accessories.
                Interviews with horticulturists and landscape architects.',
                'publish_date' => "2024-04-13 03:50:00",
                'startDate' => "2024-04-20",
                'deadline' => "2024-05-10",
                'finalDeadline' => "2024-05-15",
            ],
        ]);
    }
}
