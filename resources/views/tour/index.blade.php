@extends('layouts.app')
@section('content')

<h1>TOUR </h1>
<div class="row" >
	<div class="col-md-12">
		<table class="table table-dark" style="border: 1px solid-black">
		  <thead>
		    <tr>
		      <th scope="col">id</th>
		      <th scope="col">name</th>
		      <th scope="col">Visita</th>
		    </tr>
		  </thead>
		  <tbody>
		    
		    @foreach($tours as $tour)
		    <tr>
		      <th scope="row">{{$tour->id}}</th>
		      <td>{{$tour->name}}</td>
		      <td><a type="button" class="btn btn-primary" href="{{route('tour_path', $tour->id)}}">VER TOUR</a></td>
		      </tr>
		    @endforeach
		    </tr>
		  </tbody>
		</table>
	</div>
</div>



@endsection