<?php

namespace Database\Factories;

use App\Models\HopperEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

class HopperEventFactory extends Factory
{
    protected $model = HopperEvent::class;

    public function definition(): array
    {
        return [
            'persistSettings' => $this->faker->boolean(),
            'settings' => $this->faker->words(),
            'settingsFieldName' => $this->faker->name(),
            'settingsRules' => $this->faker->words(),
        ];
    }
}
