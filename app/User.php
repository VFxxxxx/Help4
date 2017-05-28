<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'skills',
        'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email',
    ];

    public function getTopUsers($n)
    {
        //Как будем определять, если у 100500 человек рейтинг 10 из 10?
        $users = User::orderBy('rating', 'desc')->paginate($n);
        return $users;
    }

    public function writtenComments()
    {
        return $this->hasMany('App\Comment', 'id_from');
    }

    public function acceptedComments()
    {
        return $this->hasMany('App\Comment', 'id_to');
    }

    public function review()
    {
        return $this->hasOne('App\Review', 'id_from');
    }

    public function acceptedMessages()
    {
        return $this->hasMany('App\Message', 'id_to');
    }

    public function writtenMessages()
    {
        return $this->hasMany('App\Message', 'id_from');
    }

    public function writtenNeeds()
    {
        return $this->hasMany('App\Need', 'id_from');
    }

    public function acceptedNeeds()
    {
        return $this->hasMany('App\Need', 'id_by');
    }

    public function getUser($id)
    {
        $user = User::find($id);
        return $user;
    }
}
