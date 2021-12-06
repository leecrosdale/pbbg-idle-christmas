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

    public function tickTask()
    {
        $this->last_task_tick = now();
        $this->save();
    }
}
