<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
	public function showReviews(Review $reviewModel) {
		$n=5;
		$reviews = $reviewModel->getReviews($n);
		return view('review', ['reviews' => $reviews]);
	}

	public function addReview(Request $request, Review $reviewModel) {
		$reviewModel->store($request);
		return redirect('review');
	}

	public function getAddReview() {
		return view('addReview');
	}
}