<?php

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        "title" => $faker->title(),
        "description" => $faker->text,
        "likes" => $faker->randomNumber(1),
        "shares" => $faker->randomNumber(1),
        "user_id" => \App\User::all()->first()->id,
    ];

});

$factory->define(\App\Comment::class, function (Faker $faker) {
    return [
        "description" => $faker->text,
        "likes" => $faker->randomNumber(1),
        "user_id" => \App\User::all()->random()->id,
        "post_id" => Post::all()->random()->id,
    ];

});