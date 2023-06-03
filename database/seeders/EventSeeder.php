<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userId = User::query()->first()->id;
        $arr = [];
        $faker = \Faker\Factory::create('vi_VN');
        for ($i = 1; $i <= 10; $i++) {
            $arr[] = [
                'title' => $faker->title(),
                'subtitle' => $faker->realText(50),
                'description' => $faker->realText(),
                'content' => $faker->realText(),
                'author' => $userId,
            ];
        }
        Event::insert($arr);
    }
}
