<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attends extends Model
{
    public function user() {
        return $this->belongsTo('App\User','user_code','code');
    }
}
