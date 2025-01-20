<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Human extends Model
{
    /** @use HasFactory<\Database\Factories\HumanFactory> */
    use HasFactory;

    protected $fillable=['username', 'email', 'activo', 'logo', 'departament_id'];

    //Relacion 1:N con departamento
    public function departament(): BelongsTo{
        return $this->belongsTo(Departament::class);
    }
    //Relacion N:M con roles
    public function roles(): BelongsToMany{
        return  $this->belongsToMany(Role::class);
    }
}
