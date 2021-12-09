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
        $smithing = Skill::where(['slug' => 'smithing'])->first();


        // Items
        // Chopping
        $smallLog = Item::where(['slug' => 'small-log'])->first();
        $mediumLog = Item::where(['slug' => 'medium-log'])->first();
        $largeLog = Item::where(['slug' => 'large-log'])->first();

        // Mining
        $ironOre = Item::where(['slug' => 'iron-ore'])->first();
        $coalOre = Item::where(['slug' => 'coal-ore'])->first();
        $copperOre = Item::where(['slug' => 'copper-ore'])->first();
        $goldOre = Item::where(['slug' => 'gold-ore'])->first();

        // Smithing
        $ironBar = Item::where(['slug' => 'iron-bar'])->first();


        // Tasks
        $chopSmallTree = Task::factory()->create(
            [
                'name' => 'Chop',
                'title' => 'Small Tree',
                'skill_id' => $chopping->id,
                'item_id' => $smallLog->id,
                'time_in_seconds' => 2,
                'item_quantity' => 1,
                'skills_gained' => [$chopping->slug => 5]
            ]
        );

        $chopMediumTree = Task::factory()->create(
            [
                'name' => 'Chop',
                'title' => 'Medium Tree',
                'skill_id' => $chopping->id,
                'item_id' => $mediumLog->id,
                'time_in_seconds' => 4,
                'item_quantity' => 1,
                'skills_gained' => [$chopping->slug => 7]
            ]
        );

        $chopLargeTree = Task::factory()->create(
            [
                'name' => 'Chop',
                'title' => 'Large Tree',
                'skill_id' => $chopping->id,
                'item_id' => $largeLog->id,
                'time_in_seconds' => 6,
                'item_quantity' => 1,
                'skills_gained' => [$chopping->slug => 9]
            ]
        );

        $mineIronOre = Task::factory()->create(
            [
                'name' => 'Mine',
                'title' => 'Iron Vein',
                'skill_id' => $mining->id,
                'item_id' => $ironOre->id,
                'time_in_seconds' => 3,
                'item_quantity' => 1,
                'skills_gained' => [$mining->slug => 5]
            ]
        );

        $mineCoalOre = Task::factory()->create(
            [
                'name' => 'Mine',
                'title' => 'Coal Vein',
                'skill_id' => $mining->id,
                'item_id' => $coalOre->id,
                'time_in_seconds' => 3,
                'item_quantity' => 1,
                'skills_gained' => [$mining->slug => 5]
            ]
        );

        $mineCopperOre = Task::factory()->create(
            [
                'name' => 'Mine',
                'title' => 'Copper Vein',
                'skill_id' => $mining->id,
                'item_id' => $copperOre->id,
                'time_in_seconds' => 3,
                'item_quantity' => 1,
                'skills_gained' => [$mining->slug => 5]
            ]
        );

        $mineGoldVein = Task::factory()->create(
            [
                'name' => 'Mine',
                'title' => 'Gold Vein',
                'skill_id' => $mining->id,
                'item_id' => $goldOre->id,
                'time_in_seconds' => 3,
                'item_quantity' => 1,
                'skills_gained' => [$mining->slug => 5]
            ]
        );

        $smithIronBar = Task::factory()->create(
            [
                'name' => 'Smelt',
                'title' => 'Iron Bar',
                'skill_id' => $smithing->id,
                'item_id' => $ironBar->id,
                'time_in_seconds' => 5,
                'item_quantity' => 1,
                'items_required' => [$ironOre->slug => 1],
                'skills_gained' => [$smithing->slug => 5]
            ]
        );
    }
}
