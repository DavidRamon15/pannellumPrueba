@extends('layouts.app')
@section('content')

<h2> Crear Tour</h2>

<form action="{{route('store_tour_path')}}" method="POST">
	{{ csrf_field() }}
  <div class="form-group ">
    <label for="name">Nombre del Tour</label>
    <input type="string" class="form-control" id="name" name="name" placeholder="Introduce nombre">

  </div>
 
  <button type="submit" class="btn btn-primary">Crear</button>
</form>
	@endsection