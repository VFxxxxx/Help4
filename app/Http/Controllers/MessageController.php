<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class MessageController extends Controller
{
	public function showDialog($id) {
		//$id - id пользователя, с которым ведется переписка
		return view('dialog', ['id' => $id]);
	}
	public function sendMessage($id) {
		echo "Отправка сообщения";
	}
}