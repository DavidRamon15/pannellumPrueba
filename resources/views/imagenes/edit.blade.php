@extends('layouts.app')
@section('content')


<div class="container">

<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading"> Modificiar Imagenes</div>
        <div class="panel-body">
          <form method="POST" action="{{route('update_imagen_path',['id' => $escena->id])}}" accept-charset="UTF-8" enctype="multipart/form-data">
              
            <div class="form-group ">
              <label for="name">Nombre del Imagen</label>
              <input type="string" class="form-control" id="name" name="name" value="{{$escena->name}}">
            </div>
            
             <div class="form-group ">
              <label for="name">pitch</label>
              <input type="number" class="form-control" id="pitch" name="pitch" value="{{$escena->pitch}}">
            </div>
             <div class="form-group ">
              <label for="name">yaw</label>
              <input type="number" class="form-control" id="yaw" name="yaw" value="{{$escena->yaw}}">
            </div>
              </div>
                <!-- introducir id tour-->
                <input type="hidden" class="form-control" id="id_tour" name="id_tour" value='{{ $tour->id }}'  readonly>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {{ method_field('PUT') }}
            
            <div class="form-group">
              <label class="col-md-4 control-label">Nuevo Archivo</label>
              <div class="col-md-6">
                <input type="file" name="imagen"  value="/public/imagenes/{{$escena->url}}" >
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>



	@endsection