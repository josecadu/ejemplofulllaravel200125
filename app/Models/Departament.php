<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Departament extends Model
{
    protected $fillable=['nombre', 'color'];

    public $timestamps=false;

    public function humans(): HasMany{
        return $this->hasMany(Human::class);
    }

    //Accesors y Mutators
    public function nombre(): Attribute{
        return Attribute::make(
            set: fn(string $v)=>ucfirst($v),
            //get: fn($v)=>"#".$v
        );
    }
}
