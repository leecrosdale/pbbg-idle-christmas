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
    }
}
