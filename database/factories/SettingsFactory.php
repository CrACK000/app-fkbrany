<?php

namespace Database\Factories;

use App\Models\Settings;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SettingsFactory extends Factory
{
    protected $model = Settings::class;

    public function definition(): array
    {
        return [
            'title_page' => $this->faker->word(),
            'email_receive' => $this->faker->unique()->safeEmail(),
            'units_measurement' => $this->faker->word(),
            'company_email' => $this->faker->unique()->safeEmail(),
            'company_mobile' => $this->faker->word(),
            'company_address' => $this->faker->address(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
