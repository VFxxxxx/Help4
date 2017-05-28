<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
	public function showProfile(User $userModel, $id) {
		$user = $userModel->getUser($id);
		return view('user/profile', ['user' => $user]);
	}

	public function getEditProfile(User $userModel, $id) {
		$user = $userModel->getUser($id);
		return view('user/editProfile', ['user' => $user]);
	}

	public function postEditProfile($id) {
		return redirect()->action('UserController@showProfile', ['id' => $id]);
	}

	//Оплата баллами
	public function bill($id1, $id2) {
		return view('user/bill');
	}

	public function addComment($id) {
		//echo "Добавить отзыв о пользователе";
		return redirect()->action('UserController@showProfile', ['id' => $id]);
	}

	public function showTop(User $userModel) {
		$n=10;
		$topUsers = $userModel->getTopUsers($n);
		return view('topRating', ['topUsers' => $topUsers]);
	}
}