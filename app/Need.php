<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\NeedCategory;

class Need extends Model
{
    protected $fillable = [
        'id_from',
        'text',
        'category_id',
        'points'
    ];

    public function userFrom()
    {
        return $this->belongsTo('App\User', 'id_from');
    }

    public function userBy()
    {
        return $this->belongsTo('App\User', 'id_by');
    }

    public function category()
    {
        return $this->belongsTo('App\NeedCategory', 'category_id');
    }

    public function getNeedList($n)
    {
        $needs = Need::where('status', '=', 'new')->orderBy('created_at', 'desc')->paginate($n);
        $needs->transform(function ($need, $key) {
            $need['category'] = $need->category()->first();
            $need['user_from'] = $need->userFrom()->first();
            $need['user_by'] = $need->userBy()->first();
            return $need;
        });
        return $needs;
    }

    public function store(Request $request)
    {
        //здесь будет проверка $request
        $need = new Need;
        if (Auth::check())
        {
            // The user is logged in...
            $need->id_from = Auth::user()->id;
        }
        else
        {
            //регистрация/вход;
            return redirect('/#7');
        }
        $need->text = $request->text;
        //что, если такой категории нет? Может, сделать select в форме вместо input?
        $need->category_id = NeedCategory::where('name', '=', $request->category)->firstOrFail()->id;
        $need->points = $request->points;
        
        $need->save();
        return $need;
    }

    public function getNeed($id)
    {
        $need = Need::find($id);
        $need['category'] = $need->category()->first();
        $need['user_from'] = $need->userFrom()->first();
        $need['user_by'] = $need->userBy()->first();
        return $need;
    }
}
