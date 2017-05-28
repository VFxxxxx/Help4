<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/master.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    @yield('headExtra')
</head>
<body>
  <header>
    <h1>heplforhelp</h1>
      <h3>Помогаем друг другу</h3>
      <div class="head_img">
          <img src="" alt="">
    </div>
  </header>
  <span class="anchor"></span>
  <section class="menu">
      <nav>
        <ul>
          @if (url()->current() == url('/'))
          <li><a href="#1">о нас</a></li>
          @if (Auth::guest())
          <li><a href="#7">зарегистрироваться</a></li>
          @endif
          <li><a href="#2">заявки</a></li>
          <li><a href="#3">рейтинг</a></li>
          <li><a href="#4">отзывы</a></li>
          <li><a href="#5">партнёры</a></li>
          <li><a href="#6">контакты</a></li>
          @else
          <li><a href="/">главная</a></li>
          @if (Auth::guest())
          <li><a href="/#7">зарегистрироваться</a></li>
          @endif
          <li><a href="/need">заявки</a></li>
          <li><a href="/rating">рейтинг</a></li>
          <li><a href="/review">отзывы</a></li>
          <li><a href="#">партнёры</a></li>
          <li><a href="#">контакты</a></li>
          @endif

          @if (Auth::guest())
          <li><a href="/login">войти</a></li>
          @else
          <li><a href="{{ URL::to('/user', ['id' => auth()->user()->id]) }}">профиль</a></li>
          <li><a href="/logout">выход</a></li>
          @endif
        </ul>
      </nav>
  </section>
  @yield('content')
  <footer></footer>
</body>
<script src="{{ asset('js/app.js') }}"></script>
@yield('scriptsExtra')
<script src="js/fixed-menu.js"></script>
</html>
