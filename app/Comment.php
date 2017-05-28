<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id_from',
        'id_to',
        'text',
        'rating'
    ];

    public function userFrom()
    {
        return $this->belongsTo('App\User', 'id_from');
    }

    public function userTo()
    {
        return $this->belongsTo('App\User', 'id_to');
    }
}
