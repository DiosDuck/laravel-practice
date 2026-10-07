<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name'])]
class State extends Model
{
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
