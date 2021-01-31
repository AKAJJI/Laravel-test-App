<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    public function posts()
    {
        return $this->hasMany('App\Posts');
    }

    // protected $fillable=['name','slug'];
}
