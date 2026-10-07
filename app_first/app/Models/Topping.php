<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name'])]
class Topping extends Model
{
    public function pizzas() {
        return $this->belongsToMany(Pizza::class);
    }
}
