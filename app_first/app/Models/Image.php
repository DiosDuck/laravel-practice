<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['path'])]
class Image extends Model
{
    function imageable() {
        return $this->morphTo();
    }
}
