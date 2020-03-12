<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PrintSheetItem;
use Faker\Generator as Faker;

$factory->define(PrintSheetItem::class, function (Faker $faker) {
    return [

        'image_url' => 'http://website.com',
        'x_pos' => 0,
        'y_pos' => 0,
        'identifier' => 'My cool design',

    ];
});
