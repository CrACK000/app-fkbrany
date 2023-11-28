<?php

namespace Database\Factories;

use App\Models\ReferenceGallery;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ReferenceGalleryFactory extends Factory
{
    protected $model = ReferenceGallery::class;

    public function definition(): array
    {
        return [
            'src' => $this->faker->word(),
            'tmp' => $this->faker->word(),
            'reference_id' => $this->faker->randomNumber(),
            'main' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
