@extends('layout')

@section('title')
Новые заявки
@stop

@section('content')
<h2>Новые заявки</h2>
<br>

@if (!Auth::guest())
    <a href="/need/create">Создать задание</a>
@endif

@foreach($needs as $key => $need)
      <div class="block">
        <div class="icon">
          <div class="service-icon">
            @if($need->user_from->photo !== null)
              <img src="{!! $need->user_from->photo !!}">
            @else
              <img src="/images/services/Branding-Identity.png">
            @endif
          </div>
          <h4 class="service-head">{{$need->user_from->name}}</h4>
        </div>
        <div class="text">
        	<a href="{{ URL::to('/need', ['id' => $need->id]) }}">
          		<p>{{$need->text}}</p>
          	</a>
        </div>
     </div>
    @endforeach

{{ $needs->links() }}

@stop