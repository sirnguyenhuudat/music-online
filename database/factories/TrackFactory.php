<?php

use Faker\Generator as Faker;
use App\Models\Track;
use Illuminate\Support\Str;

$factory->define(Track::class, function (Faker $faker) {
    $name = $faker->name;
    $path_array = [
        'https://www.nhaccuatui.com/bai-hat/that-girl-olly-murs.b03EguFnAlXU.html',
        'https://www.nhaccuatui.com/bai-hat/beautiful-in-white-shane-filan.6wxzvEkMn8.html',
        'https://www.nhaccuatui.com/bai-hat/fade-dj-prom3t3u-remix-alan-walker.ixSvJ1DKHbLQ.html',
        'https://www.nhaccuatui.com/bai-hat/alone-alan-walker.dPAWTe6nAnZ8.html',
        'https://www.nhaccuatui.com/bai-hat/the-spectre-alan-walker.am558dwdemh1.html',
    ];

    return [
        'name' => $name,
        'slug' => Str::slug($name),
        'author' => $faker->firstName,
        'artist_id' => rand(1, 300),
        'user_id' => rand(1, 150),
        'source' => 'nhaccuatui',
        'path' => $path_array[rand(0, 4)],
        'lyric' => $faker->text,
        'week_view' => rand(50, 200),
        'month_view' => rand(500, 1000),
        'views' => rand(5000, 10000),
    ];
});
