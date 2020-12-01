<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enquiry;
use Faker\Generator as Faker;

$factory->define(Enquiry::class, function (Faker $faker) {
    return [
        'first_name' => $this->faker->firstname,
        'last_name' => $this->faker->lastname,
        'home_phone' => $this->faker->phoneNumber,
        'adress' => $this->faker->address,
        'suburb' => $this->faker->citySuffix,
        'post_code' => $this->faker->postcode,
        'date_of_birth' => $this->faker->date($format = "Y-m-d"),
        'language_home' => $this->faker->country,
        'parent_name' => $this->faker->name,
        'parent_mobile' => $this->faker->phoneNumber,
        'parent_email' => $this->faker->email,
        'parent_adress' => $this->faker->address,
        'status' => $this->faker->randomElement(['active','disable']),


        'ep1_date' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'ep1_state' => $this->faker->randomElement(['Complete','Complete']),

        'ep2_date' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'ep2_state' => $this->faker->randomElement(['Complete','Complete']),

        'ep3_date' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'ep3_state' => $this->faker->randomElement(['Pending','Pending']),

        'ep4_date' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'ep4_state' => $this->faker->randomElement(['Complete','Complete']),

        'ep5_date' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'ep5_state' => $this->faker->randomElement(['Pending','Pending']),

        'ep6_date' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'ep6_state' => $this->faker->randomElement(['Pending','Pending']),
        
        'ep7_date' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'ep7_state' => $this->faker->randomElement(['Pending','Pending']),
        
        'ep8_date' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'ep8_state' => $this->faker->randomElement(['Pending','Pending']),
        
        'ep9_date' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'ep9_state' => $this->faker->randomElement(['Pending','Pending']),
        
        'ep10_date' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'ep10_state' => $this->faker->randomElement(['Pending','Pending']),
        
        'ep11_date' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'ep11_state' => $this->faker->randomElement(['Pending','Pending']),
        
        'ep12_date' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'ep12_state' => $this->faker->randomElement(['Pending','Pending']),
        
        'ep13_date' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'ep13_state' => $this->faker->randomElement(['Pending','Pending']),
        
        'ep14_date' => $this->faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'ep14_state' => $this->faker->randomElement(['Pending','Pending']),
        

    ];
});
