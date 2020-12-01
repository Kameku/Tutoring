<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EnrolmentProcess;
use Faker\Generator as Faker;

$factory->define(EnrolmentProcess::class, function (Faker $faker) {
    return [
        'description' => $this->faker->asciify('Enquiry Submitted'),
        'responsiblePerson' => $this->faker->asciify('Studen/Parent'),
        'actions' => $this->faker->asciify('Mark as Complete'),
    ];
});
