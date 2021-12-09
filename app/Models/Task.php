<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function characters()
    {
        return $this->hasMany(Character::class);
    }

    public function active_characters()
    {
        return $this->hasMany(Character::class, 'active_task_id')
            ->where('last_task_client_tick', '<=', now()->subSeconds(30));
    }

    public function work(Character $character, $clientTick = false)
    {
        $itemGained = $this->item;
        $quantityGained = $this->item_quantity;
        $taskTimeInSeconds = $this->time_in_seconds;

        if (now()->diffInSeconds($character->last_task_tick) >= $taskTimeInSeconds) {
            $character->addItem($itemGained, $quantityGained);
            $character->tickTask($clientTick);
        }
    }



}
