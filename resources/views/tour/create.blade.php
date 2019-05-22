@extends('layouts.app')
@section('content')

<h2> Crear Tour</h2>

<form action="{{route('store_tour_path')}}" method="POST">
	{{ csrf_field() }}
  <div class="form-group ">
    <label for="name">Nombre del Tour</label>
    <input type="string" class="form-control" id="name" name="name" placeholder="Introduce nombre">
  </div>
  <div class="form-group ">
    <label for="name">Primera Escena</label><br>
    <input type="string" class="form-control" id="first_scene" name="first_scene" placeholder="Introduce la escena">
  
  </div>
  <div class="form-group ">
    <label for="name">Autor</label>
    <input type="string" class="form-control" id="author" name="author" placeholder="Introduce Autor">
  </div>
  <div class="form-group ">
    <label for="name">Fade_duration</label>
    <input type="number" class="form-control" id="fade_duration" name="fade_duration" placeholder="Introduce fade_duration">
  </div>
 
  <button type="submit" class="btn btn-primary">Crear</button>
</form>



	@endsection