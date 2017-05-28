<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'id_from',
        'id_to',
        'text'
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
