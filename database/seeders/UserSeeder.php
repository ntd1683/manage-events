<?php

namespace Database\Seeders;

use App\Enums\UserLevelEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr =[];
        $faker = \Faker\Factory::create('vi_VN');
        for ($i=1;$i<=10;$i++){
            $arr[] = [
                'name' => $faker->firstName . ' ' . $faker->lastName,
                'code_student' => '21806' . $faker->numberBetween(10000,99999),
                'class' => $faker->jobTitle,
                'faculty' => $faker->jobTitle,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'level' => $faker->randomElement(UserLevelEnum::getValues()),
                'gender' => $faker->boolean,
                'password' => Hash::make('12345678'),
                'remember_token' =>null,
            ];
        }
        User::insert($arr);
    }
}
