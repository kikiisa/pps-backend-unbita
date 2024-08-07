<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Faker\Factory;
use Faker\Generator as Faker;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 50; $i++) {
            DB::table('posts')->insert([
                'uuid' => Str::uuid(),
                'title' => $faker->sentence,
                'slug' => Str::slug($faker->sentence),
                'deskripsi' => $faker->paragraph,
                'content' => $faker->text,
                'image' => "https://santrikoding.com/storage/posts/7793757a-f440-4647-9ce1-f5927a73fa16.webp", // Mengambil gambar dari CDN
                'views' => $faker->numberBetween(0, 1000),
                'category' => $faker->randomElement(['post', 'agenda','pengumuman']),
            ]);
        }
    }
}
