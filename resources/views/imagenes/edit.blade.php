@extends('layouts.app')
@section('content')


<div class="container">

<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading"> Modificiar Imagenes</div>
        <div class="panel-body">
          <form method="POST" action="{{route('update_imagen_path',['id' => $escena->id])}}" accept-charset="UTF-8" enctype="multipart/form-data">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <input type="hidden" name="_method" value="PUT">
                   <input type="hidden" id="id" name="id" value="{{$escena->id}}">
            <div class="form-group ">
              <label for="name">Nombre de la Escena</label>
              <input type="string" class="form-control" id="name" name="name" value="{{ $escena->name }}">
            </div>
            <div class="form-group ">
              <label for="name">Titulo de la Escena</label>
              <input type="string" class="form-control" id="title" name="title" value="{{ $escena->title }}">
            </div>
            <div class="form-group ">
              <label for="name">Titulo de la Escena</label>
              <input type="number" class="form-control" id="hfov" name="hfov" value="{{ $escena->hfov }}">
            </div>
             <div class="form-group ">
                <label for="type">Seleccion el Tipo de Escena :</label>
                  <select name="type" id='type'>
                      <option value="equirectangular" >Equirectangular</option> 
                   </select>
              </div>
                <input type="hidden" class="form-control" id="id_tour" name="id_tour" value='{{ $tour->id }}'  readonly>
             
            
            <div class="form-group">
              <label class="col-md-4 control-label">Nuevo Archivo</label>
              <div class="col-md-6">
                <input type="file" name="imagen" default="/imagenes/{{$escena->panorama}}" >
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