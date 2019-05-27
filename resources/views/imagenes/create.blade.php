@extends('layouts.app')
@section('content')



<div class="container">

<div class="row">

  <div id="panorama"></div>
<script>
pannellum.viewer('panorama', {
    "type": "equirectangular",
    "panorama": "https://pannellum.org/images/alma.jpg"
});
</script>
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading"><h2>Agregar una Escena</h2></div>
        <div class="panel-body">

          @include('admin.partials.messagesError')
          <form method="POST" action="{{route('store_imagen_path',$tour->id )}}"  accept-charset="UTF-8" enctype="multipart/form-data">
              
              <div class="form-group ">
                <label for="name">Nombre de la Escena</label>
                <input type="string" class="form-control" id="name" name="name" placeholder="Introduce nombre">
              </div>
               <div class="form-group ">
                <label for="title">Titulo de la Escena</label>
                <input type="string" class="form-control" id="title" name="title" placeholder="Introduce titulo">
              </div>
              <div class="form-group ">
                <label for="hfov">Hfov</label>
                <input type="string" class="form-control" id="hfov" name="hfov" placeholder="Introduce hfov">
              </div>
               <div class="form-group ">
                <label for="type">Seleccion el Tipo de Escena :</label>
                  <select name="type" id='type'>
                      <option value="equirectangular" >Equirectangular</option> 
                   </select>
              </div>
            <div class="form-group">
              <label class="col-md-4 control-label">Introduce la Imagen:</label>
              <div class="col-md-6">
                <input type="file" name="panorama">
              </div>
            </div>


                <input type="hidden" class="form-control" id="id_tour" name="id_tour" value='{{ $tour->id }}'  readonly>
                <input type="hidden" class="form-control" id="pitch" name="pitch" value=' -2.1'  readonly>
                <input type="hidden" class="form-control" id="yaw" name="yaw" value='132.9'  readonly>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">


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
