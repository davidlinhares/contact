<?php

use Faker\Generator as Faker;

$factory->define(App\Contact::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'phoneNumber' => $faker->e164PhoneNumber,
        'company' => $faker->company,
        'email' => $faker->email,
        'address' => $faker->address,
        'website' => $faker->domainName,
        'comments' => $faker->text(50)
    ];
});