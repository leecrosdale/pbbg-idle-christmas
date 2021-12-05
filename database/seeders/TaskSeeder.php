<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Skill;
use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Skills
        $chopping = Skill::where(['slug' => 'chopping'])->first();


        // Items
        $smallLog = Item::where(['slug' => 'small-log'])->first();
        $mediumLog = Item::where(['slug' => 'medium-log'])->first();
        $largeLog = Item::where(['slug' => 'large-log'])->first();


        // Tasks
        $chopSmallTree = Task::factory()->create(
            [
                'name' => 'Chop Small Tree',
                'skill_id' => $chopping->id,
                'item_id' => $smallLog->id,
                'time_in_seconds' => 1
            ]
        );

        $chopMediumTree = Task::factory()->create(
            [
                'name' => 'Chop Medium Tree',
                'skill_id' => $chopping->id,
                'item_id' => $mediumLog->id,
                'time_in_seconds' => 3
            ]
        );

        $chopLargeTree = Task::factory()->create(
            [
                'name' => 'Chop Large Tree',
                'skill_id' => $chopping->id,
                'item_id' => $largeLog->id,
                'time_in_seconds' => 5
            ]
        );

    }
}
