@extends('layout')

@section('title')
Index
@stop

@section('headExtra')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
@stop

@section('content')
<section id="1" class="whatis">
    <h2>что это такое?</h2>
    <div class="part">
      <div class="big-part">
        <p><span class="logo">Help4Help</span> - место , где можно найти различную помощь и предложить помощь самому.</p>
        <p>Помогать умеют не только супергерои.</p>
      </div>
      <div class="little-part">
        <h3>Мне помогают</h3>
        <p>Оставьте заявку с описанием вашей просьбы о помощи</p>
        <h3>Я помогаю</h3>
        <p>Выполните просьбу о помощи и получите вознаграждение</p>
      </div>
    </div>
</section>
@if (Auth::guest())
  <section class="registration" id="7">
    <div class="part">
    <div class="big-part">
      <h2>Регистрация</h2>
    <p><span class="shad">Зарегестрируйся</span> чтобы иметь больше возможностей</p>
    <div class="subscribe">
      <form role="form" class="form-horizontal" action="register" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label for="name" class="control-label col-sm-2">Ваше имя:</label>
          <div class="col-sm-10">
            <input type="text" name="name" class="form-control" placeholder="введите ваше имя" required>
            @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
          </div>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <label for="email" class="control-label col-sm-2">Email:</label>
          <div class="col-sm-10">
            <input type="email" name="email" class="form-control" placeholder="введите ваш email" required>
            @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
          </div>
        </div>
        <div class="form-group{{ $errors->has('skills') ? ' has-error' : '' }}">
          <label for="skills" class="control-label col-sm-2">Ваши навыки:</label>
          <div class="col-sm-10">
            <textarea name="skills" class="form-control"></textarea>
          </div>
        </div>
        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
          <label for="photo" class="control-label col-sm-2">Фото:</label>
          <div class="col-sm-10">
            <input type="file" name="photo" accept="image/*">
            @if ($errors->has('avatar'))
            <span class="help-block">
                <strong>{{ $errors->first('photo') }}</strong>
            </span>
        @endif
          </div>
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <label for="password" class="control-label col-sm-2">Пароль:</label>
          <div class="col-sm-10">
            <input type="password" name="password" class="form-control" required>
            @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
          </div>
        </div>
        <div class="form-group">
          <label for="password_confirmation" class="control-label col-sm-2">Подтвердите пароль:</label>
          <div class="col-sm-10">
            <input type="password" name="password_confirmation" class="form-control" required>
          </div>
        </div>
        <div class="col-sm-offset-2 col-sm-10">
          <input type="submit" value="Зарегистрироваться">
        </div>
      </form>
    </div>
  </div>

  <div class="little-part">
    <div class="reg_img">
    </div>
  </div>
  </div>
  </section>
@endif
  <section id="2" class="new_orders">
    <div class="part">
    <div class="little-part">
      <h2>Новые заявки</h2>
      <div class="new_orders_img">
      </div>
      <div class="subscribe">
        <div>
          <a href="/need">Просмотреть все заявки</a>
        </div>
      </div>
    </div>
    <div class="big-part">
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
    </div>
    </div>
  </section>

  <section id="3" class="rating">
    <div class="part">
        <div class="big-part">
          <div class="big-list">
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
            </div>
            <div class="subscribe">
              <a href="/rating">Просмотреть весь рейтинг</a>
            </div>
        </div>



    <div class="little-part">
      <h2>Рейтинг</h2>
      <div class="rating_img">
      </div>
    </div>
    </div>
  </section>

  <section id="4" class="comment">
    <h2>Отзывы</h2>
    <div class="container">
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
    </div>
    <div class="part">
      <div class="subscribe">
      <a href="/review">Просмотреть все отзывы</a>
      </div>
    </div>
  </section>

  <section id="5" class="partners">
    <div class="part">
    <div class="little-part">
      <h2>Партнёры</h2>
      <div class="partners_img"></div>
    </div>
    <div class="big-part">
      <div class="p_news">
        <p>Новый конкурс!</p>
        <p>Победители сентября</p>
        <p>Лучшая работа</p>
      </div>
      <div class="subscribe">
        <a href="#">Подробнее</a>
      </div>
    </div>
    </div>
  </section>

  <section id="6" class="about">
    <p>Здесь вы можете написать нам о своих предложениях или написать в техподдержку</p>
    <div class="subscribe">
      <form action="" method="post">
        <input type="email" name="email" placeholder="введите ваш email">
        <input type="text" placeholder="Введите текст сообщения">
        <input type="submit" value="Отправить">
      </form>
    </div>
  </section>
@stop
@section('scriptsExtra')
<!--<script src="js/height.js"></script>-->
@stop
