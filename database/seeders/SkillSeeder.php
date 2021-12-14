<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            'Chopping',
            'Mining',
            'Smithing',
            'Crafting',
//            'Wrapping',
//            'Farming',
//            'Cooking',
        ];

        foreach ($skills as $skill)
        {
            Skill::factory()->create(['name' => $skill, 'slug' => Str::slug($skill)]);
        }

    }
}
