<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nice extends Model
{
    public function image()
    {
        return $this->belongsTo('Image');
    }
}
