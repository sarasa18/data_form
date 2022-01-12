<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

//ここにデータベースまでのパスを書かなければならないので注意。
use App\Models\DataForm;
use Faker\Generator as Faker;

//defineの中のDB名も書き換えなきゃいけないので注意。
$factory->define(DataForm::class, function (Faker $faker) {
    return [
        //
        'your_name' => $faker->name,
        'title' => $faker->realText(50),
        'email' => $faker->unique()->email,
        'url' => $faker->url,
        'gender' => $faker->randomElement(['0', '1']),
        'age' => $faker->numberBetween($min = 1, $max = 6),
        'contact' => $faker->realText(200),
    ];
});
