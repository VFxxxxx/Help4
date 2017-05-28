<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Review extends Model
{
    protected $fillable = [
        'id_from',
        'text'
    ];

    public function userFrom() {
        return $this->belongsTo('App\User', 'id_from');
    }

    public function getReviews($n) {
    	$reviews = Review::orderBy('created_at', 'desc')->paginate($n);
        $reviews->transform(function ($review) {
            $review['user_from'] = $review->userFrom()->first();
  			return $review;
		});
		return $reviews;
    }

    public function store(Request $request) {
    	//здесь будет проверка $request->all()
		$review = new Review;
		if (Auth::check())
		{
    		// The user is logged in...
			$review->id_from = Auth::user()->id;
		}
		else
		{
			//регистрация/вход;
            return redirect('/#7');
		}
		$review->text = $request->text;
		
		$review->save();
		return $review;
    }
}
