<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(WideProject\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(WideProject\Entities\Client::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'responsible' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'obs' => $faker->sentence,
    ];
});

$factory->define(WideProject\Entities\Project::class, function (Faker\Generator $faker) {
    return [
        'owner_id' => rand(1, 5),
        'client_id' => rand(1, 10),
        'name' => $faker->word,
        'description' => $faker->sentence,
        'progress' => rand(1, 100),
        'status' => rand(1, 3),
        'due_date' => $faker->dateTime('now'),
    ];
});

$factory->define(WideProject\Entities\ProjectNote::class, function (Faker\Generator $faker) {
    return [
        'project_id' => rand(1, 20),
        'title' => $faker->word,
        'note' => $faker->paragraph,
    ];
});

$factory->define(WideProject\Entities\ProjectTask::class, function (Faker\Generator $faker) {
    return [
        'project_id' => rand(1, 20),
        'name' => $faker->sentence,
        'start_date' => $faker->dateTime,
        'due_date' => $faker->dateTime,
        'status' => rand(1, 3),
    ];
});
