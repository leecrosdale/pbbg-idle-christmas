<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $casts = [
        'items_required' => 'object',
        'skills_gained' => 'object'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function getItemsAttribute()
    {
        $records = [];

        if ($this->items_required) {
            foreach ($this->items_required as $slug => $qty) {
                $record = Item::where('slug', $slug)->first();
                $records[] = $record;
            }
        }

        return $records;

    }

    public function characters()
    {
        return $this->hasMany(Character::class);
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function active_characters()
    {
        return $this->hasMany(Character::class, 'active_task_id')
            ->where('last_task_client_tick', '<=', now()->subSeconds(30))
            ->where('last_task_client_tick', '>=', now()->subHour());
    }

    public function work(Character $character, $clientTick = false)
    {
        $itemGained = $this->item;
        $quantityGained = $this->item_quantity;
        $taskTimeInSeconds = $this->time_in_seconds;

        if (!$character->hasRequiredItems($this)) {
            $character->clearActiveTask();
            return false;
        }

        if (now()->diffInSeconds($character->last_task_tick) >= $taskTimeInSeconds) {

            if ($this->items_required) {
                foreach ($this->items_required as $k => $qty) {
                    $item = Item::where(['slug' => $k])->firstOrFail();
                    $characterItem = $character->items()->where('item_id', $item->id)->where('quantity', '>=', $qty)->firstOrFail();

                    $characterItem->quantity -= $qty;
                    $characterItem->save();
                }
            }

            $character->addItem($itemGained, $quantityGained);
            $character->addExperience($this);
            $character->tickTask($clientTick);

            return true;
        }

        return false;
    }
}
