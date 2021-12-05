<?php

namespace Database\Seeders;

use App\Models\Character;
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

        Country::factory(10)->create();

        $users = \App\Models\User::factory(10)->create()->each(function (User $user) {
            $character = Character::factory()->create(['user_id' => $user->id]);
        });
    }


}
