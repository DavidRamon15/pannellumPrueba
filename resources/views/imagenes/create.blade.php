@extends('layouts.app')
@section('content')



<div class="container">

<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">Agregar una Escena</div>
        <div class="panel-body">
          <form method="POST" action="{{route('store_imagen_path',$tour->id )}}"  accept-charset="UTF-8" enctype="multipart/form-data">
              
              <div class="form-group ">
                <label for="name">Nombre del Tour</label>
                <input type="string" class="form-control" id="name" name="name" placeholder="Introduce nombre">
              </div>
               <div class="form-group ">
                <label for="pitch">pitch</label>
                <input type="number" class="form-control" id="pitch" name="pitch" placeholder="Introduce pitch">
              </div>
               <div class="form-group ">
                <label for="yaw">yaw</label>
                <input type="number" class="form-control" id="yaw" name="yaw" placeholder="Introduce yaw">
              </div>
                <!-- introducir id tour-->
                <input type="hidden" class="form-control" id="id_tour" name="id_tour" value='{{ $tour->id }}'  readonly>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <div class="form-group">
              <label class="col-md-4 control-label">Nuevo Archivo</label>
              <div class="col-md-6">
                <input type="file" name="imagen" >
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
