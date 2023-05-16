<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Media;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [];
        $faker = \Faker\Factory::create('vi_VN');
        for ($i = 1; $i <= 10; $i++) {
            $media = Media::create([
                'name' => $faker->title(),
                'type' => 'png',
                'url' => $faker->imageUrl(),
            ]);
            $arr[] = [
                'title' => $faker->title(),
                'subtitle' => $faker->realText(50),
                'description' => $faker->realText(),
                'content' => $faker->realText(),
                'author' => 24,
                'media_id' => $media->id,
            ];
        }
        Event::insert($arr);
    }
}
