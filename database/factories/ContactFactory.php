<?php

use App\Models\Contact;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

$factory->define(Contact::class, function (Faker $faker) {
    Storage::fake('public');

    return [
        'name' => $faker->word,
        'email' => $faker->email,
        'phone' => $faker->cellphoneNumber,
        'message' => $faker->text(),
        'file' => UploadedFile::fake()->create($faker->word, 500, 'application/pdf'),
    ];
});
