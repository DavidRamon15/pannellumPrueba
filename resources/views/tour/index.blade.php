@extends('layouts.app')
@section('content')

<h1>TOURS</h1>
<div class="row" >
	<div class="col-md-12">
		
		<a type="button" href="{{ route( 'create_tour_path' ) }}" class="btn btn-success float-right mb-2">Crear Tours</a>

		<table class="table table-dark" style=" border: 1px solid-black">
		  <thead>
		    <tr>
		      <th scope="col">Id</th>
		      <th scope="col">Nombre</th>
		      <th scope="col">Primera Escena</th>
		      <th scope="col">Autor</th>
		      <th scope="col">Fade Duration</th>
		      <th scope="col">Visita</th>	      
		      <th scope="col">Modificar</th>
		      <th scope="col">Eliminar</th>
		      <th scope="col">Imagenes</th>
		     

		    </tr>
		  </thead>
		  <tbody>
		    @foreach($tours as $tour)
		    <tr>
			     <th scope="row">{{$tour->id}}</th>
			     <td>{{$tour->name}}</td>
			     <td>{{$tour->first_scene}}</td>
			     <td>{{$tour->author}}</td>
			     <td>{{$tour->fade_duration}}</td>
			     <td><a type="button" class="btn btn-primary" 
			     	href="{{route('tour_path', $tour->id)}}">
			     VER TOUR</a></td>
			     
			     <td><a type="button" class="btn btn-primary" href="{{route('modificar_tour_path',['tour' => $tour ->id])}}">Modificar</a></td>
				<td><form action="{{ route('delete_tour_path',['tour'=>$tour->id ])}}" method="POST">
					{{ csrf_field()}}
					{{method_field('delete')}}
				<button type="submit" class="btn btn-danger ">Delete</button>

				</form></td>
				<td><a type="button" class="btn btn-warning" href="{{route('imagenes_path',$tour->id)}}">Imagenes</a></td>

		      </tr>
		    @endforeach
		    </tr>
		  </tbody>
		</table>
	</div>
</div>



@endsection