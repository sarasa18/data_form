<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shop extends Model
{
    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function routes()
    {
        return $this->belongsToMany('App\Models\Route');
    }
}
