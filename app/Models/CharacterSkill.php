<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterSkill extends Model
{
    use HasFactory;

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function addExperience(int $exp)
    {
        $this->experience += $exp;

        if ($this->experience > ($this->level * 110 * $this->level))
        {
            $this->level += 1;
        }

        $this->save();

    }
}
