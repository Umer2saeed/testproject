<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'name', 'image', 'warranty', 'expiry', 'cost', 'user_id'
    ];


    public function user() {
        return $this->hasOne('App\User');
    }
}
