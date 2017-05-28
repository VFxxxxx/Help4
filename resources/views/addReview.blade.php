@extends('layout')

@section('title')
Need
@stop

@section('content')
<div class="col-md-12">
<form role="form" class="form-horizontal col-md-5" action="/review/add" method="post">
{{ csrf_field() }}
 <div class="form-group">
  <label for="text" class="control-label">Текст</label>
  <input type="text" class="form-control" name="text" placeholder="Текст">
 </div>
 <button type="submit" class="btn btn-success">Добавить</button>
</form>
</div>
@stop