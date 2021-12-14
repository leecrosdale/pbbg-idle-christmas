<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Chopping
        $smallLog = Item::factory()->create(['name' => 'Small Log', 'slug' => 'small-log']);
        $mediumLog = Item::factory()->create(['name' => 'Medium Log', 'slug' => 'medium-log']);
        $largeLog = Item::factory()->create(['name' => 'Large Log', 'slug' => 'large-log']);
        $plant = Item::factory()->create(['name' => 'Plant', 'slug' => 'plant']);

        // Mining
        $ironOre = Item::factory()->create(['name' => 'Iron Ore', 'slug' => 'iron-ore']);
        $copperOre = Item::factory()->create(['name' => 'Copper Ore', 'slug' => 'copper-ore']);
        $goldOre = Item::factory()->create(['name' => 'Gold Ore', 'slug' => 'gold-ore']);
        $coalOre = Item::factory()->create(['name' => 'Coal Ore', 'slug' => 'coal-ore']);

        // Smithing
        $ironBar = Item::factory()->create(['name' => 'Iron Bar', 'slug' => 'iron-bar']);
        $copperBar = Item::factory()->create(['name' => 'Copper Bar', 'slug' => 'copper-bar']);
        $goldBar = Item::factory()->create(['name' => 'Gold Bar', 'slug' => 'gold-bar']);
        $coal = Item::factory()->create(['name' => 'Coal', 'slug' => 'coal']);
        $rawPlastic = Item::factory()->create(['name' => 'Raw Plastic', 'slug' => 'raw-plastic']);

        // Crafting
        $paper = Item::factory()->create(['name' => 'Paper', 'slug' => 'paper']);
        $wrappingPaper = Item::factory()->create(['name' => 'Wrapping Paper', 'slug' => 'wrapping-paper']);
        $electricalComponent = Item::factory()->create(['name' => 'Electrical Component', 'slug' => 'electrical-component']);
        $woodenBlock = Item::factory()->create(['name' => 'Wooden Block', 'slug' => 'wooden-block']);
        $woodenCog = Item::factory()->create(['name' => 'Wooden Cog', 'slug' => 'wooden-cog']);
        $plasticBox = Item::factory()->create(['name' => 'Plastic Box', 'slug' => 'plastic-box']);
        $computer = Item::factory()->create(['name' => 'Computer', 'slug' => 'computer']);
        $videoGame = Item::factory()->create(['name' => 'Video Game', 'slug' => 'video-game']);
        $gameConsole = Item::factory()->create(['name' => 'Game Console', 'slug' => 'game-console']);
        $actionFigure = Item::factory()->create(['name' => 'Action Figure', 'slug' => 'action-figure']);
        $doll = Item::factory()->create(['name' => 'Doll', 'slug' => 'doll']);
        $trainSet = Item::factory()->create(['name' => 'Train Set', 'slug' => 'train-set']);

    }
}
