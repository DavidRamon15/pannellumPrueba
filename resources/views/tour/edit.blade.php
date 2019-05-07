@extends('layouts.app')
@section('content')

<h2> Modificar Tour</h2>

<form action="{{route('update_tour_path',['tour'=> $tour->id])}}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
  <div class="form-group ">
    <label for="name">Nombre del Tour</label>
    <input type="string" class="form-control" id="name" name="name"  value="{{ $tour->name }}
">
  </div>
 
  <button type="submit" class="btn btn-primary">Crear</button>
</form>
	@endsection