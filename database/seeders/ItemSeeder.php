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
    }
}
