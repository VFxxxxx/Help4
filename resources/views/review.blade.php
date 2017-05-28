@extends('layout')

@section('title')
Review
@stop

@section('content')

<h2>Отзывы о нас</h2>

@if (!Auth::guest())
    <a href="/review/add">Оставить отзыв</a>
@endif
@foreach($reviews as $key => $review)
     <div class="block">
      <div class="service-icon">
        @if($review->user_from->photo !== null)
          <img src="{!! $review->user_from->photo !!}">
        @else
          <img src="/images/services/Branding-Identity.png">
        @endif
      </div>
      <h4 class="service-head">{{$review->user_from->name}}</h4>
      <div class="text">
          <p>{{$review->text}}</p>
      </div>
     </div>
@endforeach

{{ $reviews->links() }}

@stop