<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    protected $fillable=['nombre', 'color'];

    public $timestamps=false;
    
    // Relacion N:M con humans
    public function humans(): BelongsToMany{
        return $this->belongsToMany(Human::class);
    }
}
