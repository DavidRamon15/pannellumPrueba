@extends('layouts.app')
@section('content')

<h2> Modificar Tour</h2>

<form action="{{route('update_tour_path',['tour'=> $tour->id])}}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
  <div class="form-group ">
    <label for="name">Nombre del Tour</label>
    <input type="string" class="form-control" id="name" name="name"  value="{{ $tour->name }}">
  </div>
  <div class="form-group ">
    <label for="name">Primera Escena</label>
    <input type="string" class="form-control" id="first_scene" name="first_scene" value="{{$tour->first_scene}}">
  </div>

  <div class="form-group ">
    <label for="name">Autor</label>
    <input type="string" class="form-control" id="author" name="author" value="{{$tour->author}}">
  </div>
  <div class="form-group ">
    <label for="name">Fade_duration</label>
    <input type="number" class="form-control" id="fade_duration" name="fade_duration" value="{{$tour->fade_duration}}">
  </div>
  <button type="submit" class="btn btn-primary">Crear</button>
</form>

	@endsection