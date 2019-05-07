@extends('layouts.app')
@section('content')

<h1>Imagenes </h1>
<div class="row" >
	<div class="col-md-12 ">
		<a type="button" href="{{ route( 'create_imagenes_path',$tour->id ) }}" class="btn btn-success float-right mb-2">Introducir Imagen</a>
		<table class="table table-dark" style="  border: 1px solid-black">
		  <thead>
			    <tr>
		      <th scope="col">Id</th>
		      <th scope="col">Nombre</th>
		      <th scope="col">Url</th>
		      <th scope="col">Pitch</th>
		      <th scope="col">Yaw</th>
		      <th scope="col">id_tour</th>
		      <th scope="col">Modificar</th>
		      <th scope="col">Eliminar</th>
		      <th scope="col">Hotspots</th>


		    </tr>
		  </thead>
		  <tbody>
		 <?php foreach ($escenas as  $escena): ?>
		 	
		
		    <tr>
			     <th scope="row">{{$escena->id}}</th>
			     <td>{{$escena->name}}</td>
			     <td>{{$escena->url}}</td>
			     <td>{{$escena->pitch}}</td>
			     <td>{{$escena->yaw}}</td>
			     <td>{{$escena->id_tour}}</td> 
			     <td><a type="button" class="btn btn-primary" href="{{route('modificar_imagen_path',['id_escena' => $escena->id_tour,
			     																					 'id_tour' => $escena->id] )}}">Modificar</a></td>
				<td><form action="{{ route('delete_imagen_path',$escena->id )}}" method="POST">
					{{ csrf_field()}}
					{{method_field('delete')}}
				<button type="submit" class="btn btn-danger ">Delete</button>

				</form></td>
				 <td><a type="button" class="btn btn-primary" href="{{route('hotspots_path',$escena->id)}}">Hotspots</a></td>
			    
		      </tr>
		    
		    <?php endforeach ?>
		  </tbody>
		</table>
	</div>
</div>



@endsection