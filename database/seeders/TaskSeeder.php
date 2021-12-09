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
        $mining = Skill::where(['slug' => 'mining'])->first();


        // Items
        $smallLog = Item::where(['slug' => 'small-log'])->first();
        $mediumLog = Item::where(['slug' => 'medium-log'])->first();
        $largeLog = Item::where(['slug' => 'large-log'])->first();
        $ironOre = Item::where(['slug' => 'iron-ore'])->first();
        $coalOre = Item::where(['slug' => 'coal-ore'])->first();
        $copperOre = Item::where(['slug' => 'copper-ore'])->first();
        $goldOre = Item::where(['slug' => 'gold-ore'])->first();


        // Tasks
        $chopSmallTree = Task::factory()->create(
            [
                'name' => 'Chop',
                'title' => 'Small Tree',
                'skill_id' => $chopping->id,
                'item_id' => $smallLog->id,
                'time_in_seconds' => 2,
                'item_quantity' => 1
            ]
        );

        $chopMediumTree = Task::factory()->create(
            [
                'name' => 'Chop',
                'title' => 'Medium Tree',
                'skill_id' => $chopping->id,
                'item_id' => $mediumLog->id,
                'time_in_seconds' => 4,
                'item_quantity' => 1
            ]
        );

        $chopLargeTree = Task::factory()->create(
            [
                'name' => 'Chop',
                'title' => 'Large Tree',
                'skill_id' => $chopping->id,
                'item_id' => $largeLog->id,
                'time_in_seconds' => 6,
                'item_quantity' => 1
            ]
        );

        $mineIronOre = Task::factory()->create(
            [
                'name' => 'Chop',
                'title' => 'Iron Vein',
                'skill_id' => $mining->id,
                'item_id' => $ironOre->id,
                'time_in_seconds' => 3,
                'item_quantity' => 1
            ]
        );

        $mineCoalOre = Task::factory()->create(
            [
                'name' => 'Chop',
                'title' => 'Coal Vein',
                'skill_id' => $mining->id,
                'item_id' => $coalOre->id,
                'time_in_seconds' => 3,
                'item_quantity' => 1
            ]
        );

        $mineCopperOre = Task::factory()->create(
            [
                'name' => 'Chop',
                'title' => 'Copper Vein',
                'skill_id' => $mining->id,
                'item_id' => $copperOre->id,
                'time_in_seconds' => 3,
                'item_quantity' => 1
            ]
        );

        $mineGoldVein = Task::factory()->create(
            [
                'name' => 'Chop',
                'title' => 'Gold Vein',
                'skill_id' => $mining->id,
                'item_id' => $goldOre->id,
                'time_in_seconds' => 3,
                'item_quantity' => 1
            ]
        );



    }
}
