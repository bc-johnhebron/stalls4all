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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'username' => $faker->userName,
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Location::class, function (Faker\Generator $faker) {

    return [
        'lat' => $faker->latitude($min = 30, $max = 31),
        'long' => $faker->longitude($min = -98, $max = -97),
        'name' => $faker->company,
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'category' => $faker->randomElement($array = array ('Fast Food','Sit-Down Restaurant','Gas Station', 'Bar/Pub', 'Rest Stop', 'Shopping/Retail')),
        'address1' => $faker->buildingNumber . " " . $faker->streetName,
        'address2' => $faker->secondaryAddress,
        'city' => "Austin",
        'state' => "Texas",
        'zip' => 78758
    ];
});

$factory->define(App\Review::class, function (Faker\Generator $faker) {

    return [
        'user_id' => $faker->numberBetween($min = 0, $max = 21),
        'stars' => $faker->numberBetween($min = 1, $max = 5),
        'sing_or_mult' => $faker->boolean,
        'cleanliness' => $faker->boolean,
        'changing_station' => $faker->boolean,
        'unisex' => $faker->boolean,
        'doors' => $faker->boolean,
        'locks' => $faker->boolean,
        'feel_safe' => $faker->boolean,
        'wifi' => $faker->boolean,
        'customer_only' => $faker->boolean,
        'wheelchair_accessible' => $faker->boolean,
        'comment' => $faker->realText($maxNbChars = 100, $indexSize = 2)
    ];
});

$factory->define(App\Photo::class, function (Faker\Generator $faker) {

	$image = $faker->image('storage/app/public/business_profiles', 400, 300, 'nightlife');
	$name = explode("/", $image);

    return [
        'entity_name' => "business_location",
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'path' => $image,
        'name' => $name[4],
        'order' => 0,
        'primary_image' => TRUE
    ];
});













