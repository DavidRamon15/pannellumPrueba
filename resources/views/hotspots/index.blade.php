@extends('layouts.app')
@section('content')

<h1>Hotspots De la Escena</h1>
<div class="row" >
	<div class="col-md-12">

		<a type="button" href="{{ route( 'create_hotspot_path', $escena->id) }}" class="btn btn-success float-right mb-2">Crear Hotspot</a>

		<table class="table table-dark" style="  border: 1px solid-black">
		  <thead>
		    <tr>
		      <th scope="col">Id</th>
		      <th scope="col">pitch</th>
		      <th scope="col">yaw</th>
		      <th scope="col">type</th>
		      <th scope="col">text</th>
		      <th scope="col">url</th>
		      <th scope="col">scene_id</th>
		      <th scope="col">imagenes_id</th>
		      <th scope="col">Modificar</th>
		      <th scope="col">Modificar PitchYaw</th>
		      <th scope="col">Eliminar</th>
		     

		    </tr>
		  </thead>
		  <tbody>
		    @foreach($puntos as $hotspot)
		    <tr>
			     <th scope="row">{{$hotspot->id}}</th>
			     <td>{{$hotspot->pitch}}</td>
			     <td>{{$hotspot->yaw}}</td>
			     <td>{{$hotspot->type}}</td>
			     <td>{{$hotspot->text}}</td>
			     <td>{{$hotspot->url}}</td>
			     <td>{{$hotspot->scene_id}}</td>
			     <td>{{$hotspot->imagenes_id}}</td> 
			
			   <td><a type="button" class="btn btn-primary" 
			   	href="{{route('modificar_hotspot_path',[
			   	'id_escena' => $escena->id_tour,
			    'id_hotspot' => $hotspot->id] )}}"
			    >Modificar</a></td>
			      <td><a type="button" class="btn btn-primary" 
			   	href="{{route('modificar_hotspotPitchYaw_path',[
			   	'id_escena' => $escena->id_tour,
			    'id_hotspot' => $hotspot->id] )}}"
			    >Modificar PitchYaw</a></td>
				<td><form action="{{ route('delete_hotspot_path',[$hotspot->id , $escena->id ] )}}" method="POST">
					{{ csrf_field()}}
					{{method_field('delete')}}
				<button type="submit" class="btn btn-danger ">Delete</button>

				</form></td>

			

				</form></td>

		      </tr>
		    @endforeach
		    </tr>
		  </tbody>
		</table>
	</div>
</div>



@endsection