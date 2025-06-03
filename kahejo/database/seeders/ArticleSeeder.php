<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::truncate(); // Clear the table before seeding

        Article::create([
            'title' => 'Understanding Climate Change',
            'slug' => Str::slug('Understanding Climate Change'),
            'image_path' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            'reading_time' => 10,
            'published_at' => now(),
            'content' => '
                <h2>What is Climate Change?</h2>
                <p>Climate change refers to long-term shifts in temperatures and weather patterns. These shifts may be natural, but since the 1800s, human activities have been the main driver of climate change, primarily due to burning fossil fuels like coal, oil, and gas.</p>
                
                <h2>Causes of Climate Change</h2>
                <ul>
                    <li>Greenhouse gas emissions from human activities</li>
                    <li>Deforestation and land use changes</li>
                    <li>Industrial processes and manufacturing</li>
                    <li>Agricultural practices</li>
                </ul>

                <h2>Effects of Climate Change</h2>
                <p>Climate change affects our planet in numerous ways:</p>
                <ul>
                    <li>Rising global temperatures</li>
                    <li>Melting ice caps and rising sea levels</li>
                    <li>More frequent and severe weather events</li>
                    <li>Changes in precipitation patterns</li>
                    <li>Impact on ecosystems and biodiversity</li>
                </ul>

                <h2>What Can We Do?</h2>
                <p>There are many ways we can help mitigate climate change:</p>
                <ul>
                    <li>Reduce energy consumption</li>
                    <li>Use renewable energy sources</li>
                    <li>Practice sustainable transportation</li>
                    <li>Support climate-friendly policies</li>
                    <li>Educate others about climate change</li>
                </ul>
            ',
            'description' => 'Learn about the causes, effects, and what we can do to mitigate climate change.'
        ]);

        Article::create([
            'title' => 'Sustainable Living Tips',
            'slug' => Str::slug('Sustainable Living Tips'),
            'image_path' => 'https://images.unsplash.com/photo-1472214103451-9374bd1c798e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            'reading_time' => 8,
            'published_at' => now(),
            'content' => '
                <h2>What is Sustainable Living?</h2>
                <p>Sustainable living is a lifestyle that attempts to reduce an individual\'s or society\'s use of the Earth\'s natural resources and personal resources.</p>

                <h2>Daily Sustainable Practices</h2>
                <ul>
                    <li>Reduce, reuse, and recycle</li>
                    <li>Conserve water and energy</li>
                    <li>Choose sustainable transportation</li>
                    <li>Support local and sustainable businesses</li>
                    <li>Minimize waste production</li>
                </ul>

                <h2>Home Sustainability</h2>
                <p>Make your home more sustainable with these tips:</p>
                <ul>
                    <li>Use energy-efficient appliances</li>
                    <li>Install solar panels</li>
                    <li>Use LED lighting</li>
                    <li>Implement proper insulation</li>
                    <li>Start composting</li>
                </ul>
            ',
            'description' => 'Discover practical tips for reducing your environmental impact in daily life and at home.'
        ]);

        Article::create([
            'title' => 'Renewable Energy Guide',
            'slug' => Str::slug('Renewable Energy Guide'),
            'image_path' => 'https://images.unsplash.com/photo-1501854140801-50d01698950b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            'reading_time' => 12,
            'published_at' => now(),
            'content' => '
                <h2>What is Renewable Energy?</h2>
                <p>Renewable energy is energy that is collected from renewable resources that are naturally replenished on a human timescale.</p>

                <h2>Types of Renewable Energy</h2>
                <ul>
                    <li>Solar Energy</li>
                    <li>Wind Energy</li>
                    <li>Hydropower</li>
                    <li>Geothermal Energy</li>
                    <li>Biomass Energy</li>
                </ul>

                <h2>Benefits of Renewable Energy</h2>
                <ul>
                    <li>Reduces greenhouse gas emissions</li>
                    <li>Creates jobs and economic growth</li>
                    <li>Improves public health</li>
                    <li>Provides energy security</li>
                    <li>Reduces dependence on fossil fuels</li>
                </ul>

                <h2>Implementing Renewable Energy</h2>
                <p>Steps to transition to renewable energy:</p>
                <ul>
                    <li>Assess your energy needs</li>
                    <li>Research available options</li>
                    <li>Calculate costs and benefits</li>
                    <li>Install appropriate systems</li>
                    <li>Monitor and maintain</li>
                </ul>
            ',
            'description' => 'An introductory guide to different types of renewable energy and their benefits.'
        ]);
    }
}
