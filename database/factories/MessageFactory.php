<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'title' => $faker->realText($maxNbChars = 10, $indexSize = 2),
        'body' => $faker->realText($maxNbChars = 200, $indexSize = 2)
    ];
});
