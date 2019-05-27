@extends('layouts.app')
@section('content')

<script>

  
function seleccionTipo()
  { 

 
   var tipo = document.getElementById('type').value;
      if(tipo == "info" )
      {
          document.getElementById('div_url').style.visibility = 'visible';
       document.getElementById('div_scene_id').style.visibility ='hidden';
        

      }else if (tipo == "scene"){
       document.getElementById('div_url').style.visibility = 'hidden';
       document.getElementById('div_scene_id').style.visibility ='visible';
      
      }
  }





</script>
          
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading"><h2>Agregar un Hotspots</h2></div>
        <div class="panel-body">
       
            <!-- @include('admin.partials.messagesError')-->

              <form id='form' action="{{route('store_hotspot_path' )}}" method="POST">
                  {{ csrf_field() }}
                 
                  <div class="form-group ">
                    <label for="tipo">Selecciona un tipo de Hotspots :</label><br>
                   <select name="select" id='type' onchange="seleccionTipo();">
                      <option value="info" > Panel Informativo</option> 
                      <option value="scene" selected>Salto de Escena</option>
                   </select>
                  </div>
                   <div class="form-group" id="div_text" >
                    <label for="name">Contenido del panel Informativo</label>
                    <textarea class="form-control" id="text" name="text" placeholder="Introduce texto" ></textarea> 
                  </div>

                   <div class="form-group " id='div_url' style = "visibility : hidden">
                    <label for="name">url</label>
                    <input type="string" class="form-control" id="url" name="url" placeholder="Introduce url de la imagen en caso de ser tipo info">
                  </div>

                  
                  <div class="form-group" id="div_scene_id" >
                    <label>Selecciona el nombre de la Escena a la cual quieres saltar :
                      <select id="scene_id" name="scene_id">
                        <?php foreach ($escenas as $esc): ?>
                           <option value="{{$esc->name}}">{{$esc->name}}</option>
                        <?php endforeach ?>
                        
                        
                      </select>
                  </div>


                    <input type="hidden" class="form-control" id="id_imagen" name="id_imagen" value='{{ $escena->id}}'  readonly>
         
                <input type="hidden" class="form-control" id="pitch" name="pitch" value="{{ $localizacion['pitch'] }}"  readonly>
                <input type="hidden" class="form-control" id="yaw" name="yaw" value="{{ $localizacion['yaw'] }}"  readonly>
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

 
