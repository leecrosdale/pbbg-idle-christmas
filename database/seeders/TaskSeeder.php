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


        // Tasks
        $chopSmallTree = Task::factory()->create(
            [
                'name' => 'chop',
                'skill_id' => $chopping->id,
                'item_id' => $smallLog->id
            ]
        );
    }
}
