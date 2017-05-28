@extends('layout')

@section('title')
Редактировать профиль
@stop

@section('content')
<h2>Редактировать профиль</h2>

<div class="service-icon">
@if($user->photo !== null)
    <img src="{!! $user->photo !!}">
@else
	<img src="/images/services/Branding-Identity.png">
@endif
</div>
<h4 class="service-head">{{$user->name}}</h4>
<h4 class="service-head">{{$user->email}}</h4>
<h4 class="service-head">пароль</h4>
</a>
<div class="skills">
    <p>Навыки: {{$user->skills}}</p>
</div>

@stop