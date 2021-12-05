<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\CharacterSkill;
use App\Models\Country;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ItemSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(TaskSeeder::class);

        $skills = Skill::all();

        Country::factory(10)->create();

        $users = \App\Models\User::factory(10)->create()->each(function (User $user) use ($skills) {
            $character = Character::factory()->create(['user_id' => $user->id, 'active' => true]);

            foreach($skills as $skill)
            {
                CharacterSkill::factory()->create(['character_id' => $character->id, 'skill_id' => $skill->id]);
            }

        });
    }


}
