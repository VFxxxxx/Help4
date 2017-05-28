<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NeedCategory extends Model
{
    protected $fillable = [
        'name'
    ];

    public function needs()
    {
        return $this->hasMany('App\Need', 'category_id');
    }
}
