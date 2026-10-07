<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name'])]
class Pizza extends Model
{
    public function toppings() {
        return $this->belongsToMany(Topping::class);
    }
}
