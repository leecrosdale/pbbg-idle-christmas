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
        $crafting = Skill::where('slug', 'crafting')->first();
        $farming = Skill::where('slug', 'farming')->first();
        $cooking = Skill::where('slug', 'cooking')->first();
        $wrapping = Skill::where('slug', 'wrapping')->first();


        // Items
        // Chopping
        $smallLog = Item::where(['slug' => 'small-log'])->first();
        $mediumLog = Item::where(['slug' => 'medium-log'])->first();
        $largeLog = Item::where(['slug' => 'large-log'])->first();
        $plant = Item::where('slug','plant')->first();

        // Mining
        $ironOre = Item::where(['slug' => 'iron-ore'])->first();
        $coalOre = Item::where(['slug' => 'coal-ore'])->first();
        $copperOre = Item::where(['slug' => 'copper-ore'])->first();
        $goldOre = Item::where(['slug' => 'gold-ore'])->first();

        // Smithing
        $ironBar = Item::where(['slug' => 'iron-bar'])->first();
        $copperBar = Item::where('slug','copper-bar')->first();
        $goldBar = Item::where('slug','gold-bar')->first();
        $coal = Item::where('slug','coal')->first();
        $rawPlastic = Item::where('slug','raw-plastic')->first();


        // Crafting
        $paper = Item::where('slug', 'paper')->first();
        $wrappingPaper = Item::where('slug', 'wrapping-paper')->first();
        $electricalComponent = Item::where('slug','electrical-component')->first();
        $woodenBlock = Item::where('slug','wooden-block')->first();
        $woodenCog = Item::where('slug','wooden-cog')->first();
        $plasticBox = Item::where('slug','plastic-box')->first();
        $computer = Item::where('slug','computer')->first();
        $videoGame = Item::where('slug', 'video-game')->first();
        $gameConsole = Item::where('slug','game-console')->first();
        $actionFigure = Item::where('slug','action-figure')->first();
        $doll = Item::where('slug', 'doll')->first();
        $trainSet = Item::where('slug','train-set')->first();


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

        $chopPlant = Task::factory()->create(
            [
                'name' => 'Chop',
                'title' => 'Plant',
                'skill_id' => $chopping->id,
                'item_id' => $plant->id,
                'time_in_seconds' => 2,
                'item_quantity' => 3,
                'skills_gained' => [$chopping->slug => 1]
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

        $smithCopperBar = Task::factory()->create(
            [
                'name' => 'Smelt',
                'title' => 'Copper Bar',
                'skill_id' => $smithing->id,
                'item_id' => $copperBar->id,
                'time_in_seconds' => 5,
                'item_quantity' => 1,
                'items_required' => [$copperOre->slug => 1],
                'skills_gained' => [$smithing->slug => 5]
            ]
        );

        $smithGoldBar = Task::factory()->create(
            [
                'name' => 'Smelt',
                'title' => 'Gold Bar',
                'skill_id' => $smithing->id,
                'item_id' => $goldBar->id,
                'time_in_seconds' => 5,
                'item_quantity' => 1,
                'items_required' => [$goldOre->slug => 1],
                'skills_gained' => [$smithing->slug => 5]
            ]
        );

        $smithCoal = Task::factory()->create(
            [
                'name' => 'Create',
                'title' => 'Coal',
                'skill_id' => $smithing->id,
                'item_id' => $coal->id,
                'time_in_seconds' => 5,
                'item_quantity' => 1,
                'items_required' => [$coalOre->slug => 1],
                'skills_gained' => [$smithing->slug => 5]
            ]
        );

        $smithRawPlastic = Task::factory()->create(
            [
                'name' => 'Create',
                'title' => 'Coal',
                'skill_id' => $smithing->id,
                'item_id' => $rawPlastic->id,
                'time_in_seconds' => 5,
                'item_quantity' => 1,
                'items_required' => [$plant->slug => 1],
                'skills_gained' => [$smithing->slug => 5]
            ]
        );


        $craftPaper = Task::factory()->create(
            [
                'name' => 'Craft',
                'title' => 'Paper',
                'skill_id' => $crafting->id,
                'item_id' => $paper->id,
                'time_in_seconds' => 5,
                'item_quantity' => 1,
                'items_required' => [$smallLog->slug => 1],
                'skills_gained' => [$crafting->slug => 5]
            ]
        );

        $craftWrappingPaper = Task::factory()->create(
            [
                'name' => 'Craft',
                'title' => 'Wrapping Paper',
                'skill_id' => $crafting->id,
                'item_id' => $wrappingPaper->id,
                'time_in_seconds' => 5,
                'item_quantity' => 1,
                'items_required' => [$paper->slug => 1],
                'skills_gained' => [$crafting->slug => 5]
            ]
        );


        $craftElectricalComponent = Task::factory()->create(
            [
                'name' => 'Craft',
                'title' => 'Electrical Component',
                'skill_id' => $crafting->id,
                'item_id' => $electricalComponent->id,
                'time_in_seconds' => 5,
                'item_quantity' => 1,
                'items_required' => [$ironBar->slug => 1, $copperBar->slug => 1],
                'skills_gained' => [$crafting->slug => 5]
            ]
        );

        $craftWoodenCog = Task::factory()->create(
            [
                'name' => 'Craft',
                'title' => 'Wooden Cog',
                'skill_id' => $crafting->id,
                'item_id' => $woodenCog->id,
                'time_in_seconds' => 5,
                'item_quantity' => 1,
                'items_required' => [$mediumLog->slug => 1],
                'skills_gained' => [$crafting->slug => 5]
            ]
        );

        $craftWoodenBlock = Task::factory()->create(
            [
                'name' => 'Craft',
                'title' => 'Wooden Block',
                'skill_id' => $crafting->id,
                'item_id' => $woodenBlock->id,
                'time_in_seconds' => 5,
                'item_quantity' => 1,
                'items_required' => [$largeLog->slug => 1],
                'skills_gained' => [$crafting->slug => 5]
            ]
        );


        $craftPlasticBox = Task::factory()->create(
            [
                'name' => 'Craft',
                'title' => 'Plastic Box',
                'skill_id' => $crafting->id,
                'item_id' => $plasticBox->id,
                'time_in_seconds' => 5,
                'item_quantity' => 1,
                'items_required' => [$rawPlastic->slug => 1],
                'skills_gained' => [$crafting->slug => 5]
            ]
        );

        $craftComputer = Task::factory()->create(
            [
                'name' => 'Craft',
                'title' => 'Computer',
                'skill_id' => $crafting->id,
                'item_id' => $computer->id,
                'time_in_seconds' => 5,
                'item_quantity' => 1,
                'items_required' => [$plasticBox->slug => 1, $electricalComponent->slug => 5],
                'skills_gained' => [$crafting->slug => 5]
            ]
        );

        $craftVideoGame = Task::factory()->create(
            [
                'name' => 'Craft',
                'title' => 'Video Game',
                'skill_id' => $crafting->id,
                'item_id' => $videoGame->id,
                'time_in_seconds' => 5,
                'item_quantity' => 1,
                'items_required' => [$plasticBox->slug => 1, $electricalComponent->slug => 3],
                'skills_gained' => [$crafting->slug => 5]
            ]
        );

        $craftGameConsole = Task::factory()->create(
            [
                'name' => 'Craft',
                'title' => 'Game Console',
                'skill_id' => $crafting->id,
                'item_id' => $gameConsole->id,
                'time_in_seconds' => 5,
                'item_quantity' => 1,
                'items_required' => [$plasticBox->slug => 1, $electricalComponent->slug => 4],
                'skills_gained' => [$crafting->slug => 5]
            ]
        );

        $craftActionFigure = Task::factory()->create(
            [
                'name' => 'Craft',
                'title' => 'Action Figure',
                'skill_id' => $crafting->id,
                'item_id' => $actionFigure->id,
                'time_in_seconds' => 5,
                'item_quantity' => 1,
                'items_required' => [$plasticBox->slug => 1, $rawPlastic->slug => 3, $electricalComponent->slug => 1],
                'skills_gained' => [$crafting->slug => 5]
            ]
        );

        $craftDoll = Task::factory()->create(
            [
                'name' => 'Craft',
                'title' => 'Doll',
                'skill_id' => $crafting->id,
                'item_id' => $doll->id,
                'time_in_seconds' => 5,
                'item_quantity' => 1,
                'items_required' => [$rawPlastic->slug => 3, $plasticBox->slug => 1],
                'skills_gained' => [$crafting->slug => 5]
            ]
        );

        $craftTrainSet = Task::factory()->create(
            [
                'name' => 'Craft',
                'title' => 'Train Set',
                'skill_id' => $crafting->id,
                'item_id' => $trainSet->id,
                'time_in_seconds' => 5,
                'item_quantity' => 1,
                'items_required' => [$woodenBlock->slug => 2, $woodenCog->slug => 5],
                'skills_gained' => [$crafting->slug => 5]
            ]
        );














    }
}
