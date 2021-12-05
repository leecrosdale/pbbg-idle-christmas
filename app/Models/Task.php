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
        return $this->hasMany(Character::class, 'active_task_id');
    }



}
