<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $dates = [
        'last_task_tick'
    ];

    public function character_skills()
    {
        return $this->hasMany(CharacterSkill::class);
    }

    public function items()
    {
        return $this->hasMany(CharacterItem::class);
    }

    public function addItem(Item $item, int $quantity)
    {
        // Check if character has an item
        $item = $this->items()->firstOrCreate([
            'item_id' => $item->id
        ],
        [
            'item_id' => $item->id,
            'quantity' => 0,
            'character_id' => $this->id,
        ]);

        $item->quantity += $quantity;

        return $item->save();
    }

    public function setActiveTask(Task $task)
    {
        //TODO check character can actually do that task.
        $this->active_task_id = $task->id;
        $this->save();
    }

    public function clearActiveTask()
    {
        $this->active_task_id = null;
        $this->save();
    }

    public function hasRequiredItems(Task $task)
    {
        if ($task->items_required) {
            foreach ($task->items_required as $k => $qty) {
                $item = Item::where(['slug' => $k])->firstOrFail();
                $characterItem = $this->items()->where('item_id', $item->id)->where('quantity', '>=', $qty)->first();

                if (!$characterItem) {
                    return false;
                }
            }
        }

        return true;

    }

    public function addExperience(Task $task)
    {
        $skillsGained = $task->skills_gained;

        foreach ($skillsGained as $slug => $xp)
        {
            $skill = Skill::where('slug', $slug)->firstOrFail();
            $characterSkill = $this->character_skills()->where('skill_id', $skill->id)->firstOrFail();
            $characterSkill->addExperience($xp);
        }
    }

    public function tickTask($clientTick = true)
    {
        $this->last_task_tick = now();

        if ($clientTick) {
            $this->last_task_client_tick = now();
        }

        $this->save();
    }
}
