<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follows extends Model
{
    public function user()
    {
        return $this->belongsTo('User');
    }
}