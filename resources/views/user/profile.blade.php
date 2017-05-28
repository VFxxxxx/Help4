@extends('layout')

@section('title')
Профиль
@stop

@section('content')
<div class="block">
    <div class="service-icon">
    @if($user->photo !== null)
        <img src="{!! $user->photo !!}">
    @else
    	<img src="/images/services/Branding-Identity.png">
    @endif
    </div>
        <h4 class="service-head">{{$user->name}}</h4>
    </a>
    <h3>Рейтинг: {{$user->rating}}</h3>

    <div class="skills">
        <p>Навыки: {{$user->skills}}</p>
    </div>
</div>
@if (Auth::check())
	@if(Auth::user()->id === $user->id)
		<h3>Баланс: {{$user->balance}}</h3>
        <a href="{!! '/user/' . $user->id . '/edit' !!}">Редактировать</a>
	@endif
@endif
@stop