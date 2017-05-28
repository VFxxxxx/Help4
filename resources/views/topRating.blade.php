@extends('layout')

@section('title')
Rating
@stop

@section('content')
<h2>Рейтинг</h2>

@foreach($topUsers as $key => $user)
    <div class="block">
        <div class="service-icon">
            @if($user->photo !== null)
        		<img src="{!! $user->photo !!}">
    		@else
    			<img src="/images/services/Branding-Identity.png">
    		@endif
        </div>
        <a href="{{ URL::to('/user', ['id' => $user->id]) }}">
            <h4 class="service-head">{{$user->name}}</h4>
        </a>
        <h3>{{$user->rating}}</h3>
    </div>
@endforeach

{{ $topUsers->links() }}
@stop