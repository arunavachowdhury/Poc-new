<?php

use Faker\Generator as Faker;
use App\User;
use App\Sample;
use App\TestItem;
use App\TestOrder;
use App\OrderTestItem;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'usertype' => $faker->randomElement(
            [
                User::USER_OFFICE_EXECUTIVE,
                User::USER_OFFICE_ADMIN,
                User::USER_DIRECTOR,
                User::USER_APPLICATION_ADMIN
            ]
        ),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(OrderTestItem::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
$factory->define(TestOrder::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'date' => Carbon::today()->toDateString(),
        'company_name' => $faker->word,
        'address' => $faker->address,
        'phone' => $faker->e164PhoneNumber,
    ];
});
