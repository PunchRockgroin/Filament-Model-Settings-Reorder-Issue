<?php

namespace App\Models;

use Glorand\Model\Settings\Traits\HasSettingsField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HopperEvent extends Model
{
    use HasSettingsField;

    protected $casts = [
      'settings' => 'array'
    ];

    protected array $defaultSettings = [
        'color' => '#ff0000',
        'can_add_students' => true,
        'encounter_difficulty_options' => [
            [
                'value' => "0",
                'name' => 'Review',
                'description' => 'We have clicked through your presentation and have made no edits.'
            ],
            [
                'value' => "1",
                'name' => 'Minor',
                'description' => 'We have made minor edits to your presentation to ensure brand compliance.'
            ],
            [
                'value' => "2",
                'name' => 'Update',
                'description' => 'We made minor edits to HPE slides for brand compliance and added the survey slide.'
            ],
            [
                'value' => "3",
                'name' => 'Revised',
                'description' => 'We have made edits to your presentation to ensure brand compliance. For slides that we created revised graphics, we have kept your original slide in the back-up slides at the end of the presentation.'
            ],
        ],
    ];
}
