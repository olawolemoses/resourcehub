<?php

use Faker\Generator as Faker;

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

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'username' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->state(App\Models\User::class, 'customer', [
    'user_type' => '1',
]);

$factory->state(App\Models\User::class, 'merchant', [
    'user_type' => '2',
]);
$factory->define(App\Models\Customer::class, function ($faker) {
    return [
        'firstname' => $faker->name,
        'lastname' => $faker->name,
        'mobile_no' => $faker->phoneNumber,
        'street' => $faker->address,
        'city' => $faker->city,
        'email_address' => $faker->unique()->safeEmail,
        'state' => $faker->state,
        'country' => $faker->country,
        'status' => 1,
        'profile_picture' => $faker->randomElement(['picture_1.jpeg', 'picture_2.jpeg', 'picture_3.jpeg', 'picture_4.jpeg', 'picture_5.jpeg']),
        'user_id' => function(){ 
            return factory('App\Models\User')->create(['user_type'=>2])->id;
        },        
    ];
});

$factory->define(App\Models\Merchant::class, function ($faker) {
    return [
        // 'user_id' => function(){ 
        //     return factory('App\Models\User')->create(['user_type'=>2])->id;
        // },
        'store_name' => $faker->unique()->company,
        'store_name_url' => $faker->unique()->url,
        'store_about_us' => nl2br(join("\n", $faker->paragraphs($nb = 12))),
        'store_portfolio' => nl2br(join("\n", $faker->paragraphs($nb = 24))),
        'title' => $faker->title('male'),
        'firstname' => $faker->name,
        'lastname' => $faker->name,
        'email_address' => $faker->unique()->safeEmail,
        'bvn_mobile_no' => $faker->phoneNumber,
        'street' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->state,
        'country' => $faker->country,
        'status' => 1
    ];
});

$factory->define(App\Models\Category::class, function ($faker) {
    return [
        'category_name' => $faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
        'category_description' => $faker->paragraph,
        'picture' => $faker->randomNumber(2),
        'active' => 1
    ];
});

$factory->define(App\Models\Service::class, function ($faker) {
    return [
        'service_name' => $faker->unique()->sentence($nbWords =6, $variableNbWords = true),
        'service_description' => $faker->paragraph,
        'tags' => join (',',
            $faker->randomElement(['criminal law', 'counselling', 'human right', 'administration', 'corporate finance', 'copyright', 'divorce', 'property'])),
        'merchant_id' => $faker->randomElement(range(1,50)),
        'category_id' => $faker->randomElement(range(1, 51)),
        'price' => $faker->randomNumber(4),
        'service_photo_image' => $faker->randomNumber(2)
    ];
});

$factory->define(App\Models\Review::class, function ($faker) {
    return [
        'user_id' => $faker->randomElement(range(1, 50)),
        'service_id' => $faker->randomElement(range(1, 400)),
        'title'  => $faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
        'content'  => $faker->unique()->sentence($nbWords = 20, $variableNbWords = true),
        'ratings_score' => $faker->randomElement(range(1, 5))
    ];
});

$factory->define(App\Models\BookReview::class, function ($faker) {
    return [
        'user_id' => $faker->randomElement(range(1, 50)),
        'document_id' => $faker->randomElement(range(1, 100)),
        'title' => $faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
        'content' => $faker->unique()->sentence($nbWords = 20, $variableNbWords = true),
        'ratings_score' => $faker->randomElement(range(1, 5))
    ];
});

$factory->define(App\Models\Document::class, function ($faker) {
    return [
        'merchant_id' => $faker->randomElement(range(1, 5)),
        'category_id' => $faker->randomElement(range(1, 51)),
        'title' => $faker->unique()->sentence($nbWords = 6, $variableNbWords = true),
        'description' => $faker->unique()->sentence($nbWords = 20, $variableNbWords = true),
        'tags' => join(',', $faker->words(5)),
        'published' => $faker->dateTimeBetween($startDate = '-10 years', $endDate = 'now', $timezone = null),
        'amount' => $faker->randomNumber(4),
        'no_of_pages' => $faker->randomNumber(1),
        'reading_time' => $faker->time('02:37:33'),
        'author_name' => $faker->name. ' ' . $faker->name,
        'filename' => $faker->randomElement(['sample1.pdf', 'sample2.pdf', 'sample3.pdf', 'sample4.pdf', 'sample5.pdf']),
        'photo' => $faker->randomElement(['book1.png', 'book2.png', 'book3.png', 'book4.png', 'boook5.png']),
        'isbn' => $faker->randomNumber(9),
        'tags' => join(',', $faker->words(5)),
    ];
});

$factory->define(App\Models\PreviewPages::class, function ($faker) {
    $page = $faker->randomElement(range(1, 9));
    return [
        'document_id' => $faker->randomElement(range(1, 5)),
        'page_num' => $page,
        'page_preview_file' => sprintf('page_%s.jpg', $page),
    ];
});