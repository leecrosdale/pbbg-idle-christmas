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
        $smallLog = Item::factory()->create(['name' => 'Small Log', 'slug' => 'small-log']);
        $mediumLog = Item::factory()->create(['name' => 'Medium Log', 'slug' => 'medium-log']);
        $largeLog = Item::factory()->create(['name' => 'Large Log', 'slug' => 'large-log']);
        $ironOre = Item::factory()->create(['name' => 'Iron Ore', 'slug' => 'iron-ore']);
        $copperOre = Item::factory()->create(['name' => 'Copper Ore', 'slug' => 'copper-ore']);
        $goldOre = Item::factory()->create(['name' => 'Gold Ore', 'slug' => 'gold-ore']);
        $coalOre = Item::factory()->create(['name' => 'Coal Ore', 'slug' => 'coal-ore']);
    }
}
