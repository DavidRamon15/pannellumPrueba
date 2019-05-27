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
        document.getElementById('div_text').style.visibility = 'visible';

      }else if (tipo == "scene"){
       document.getElementById('div_url').style.visibility = 'hidden';
       document.getElementById('div_scene_id').style.visibility ='visible';
        document.getElementById('div_text').style.visibility = 'hidden';
      }
  }





</script>
          
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">Agregar una Escena</div>
        <div class="panel-body">
       
             @include('admin.partials.messagesError')
              <form id='form' action="{{route('update_hotspot_path',$hotspot->id )}}" method="POST">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="PUT">
                  <div class="form-group ">
                    <label for="name">Pitch:</label>
                    <input type="string" class="form-control" id="pitch" name="pitch" value="{{ $hotspot->pitch}}">
                  </div>
                   <div class="form-group ">
                    <label for="name">Yaw:</label>
                    <input type="string" class="form-control" id="yaw" name="yaw" value="{{ $hotspot->yaw}}">
                  </div>
                  <div class="form-group ">
                    <label for="tipo">Selecciona un tipo de Hotspots :</label><br>
                   <select name="select" id='type' onchange="seleccionTipo(); ">
                      <option value="info" > Panel Informativo</option> 
                      <option value="scene" selected>Salto de Escena</option>
                   </select>
                  </div>
                   <div class="form-group" id="div_text" >
                    <label for="name">Contenido del panel Informativo</label>
                    <textarea class="form-control" id="text" name="text" >{{ $hotspot->text}}</textarea> 
                  </div>

                   <div class="form-group " id='div_url'  style = "visibility : hidden">
                    <label for="name">url</label>
                    <input type="string" class="form-control" id="url" name="url" value="{{ $hotspot->url}}">
                  </div>

                  <div class="form-group" id="div_scene_id" >
                    <label>Scene_id:
                      <select id="scene_id" name="scene_id">
                        
                        <?php foreach ($escenas as $esc): 

                          if ($hotspot->scene_id == $esc->name){
                          echo("<option value=' $esc->name ' selected >$esc->name</option>");
                          }else{
                          echo("<option value='$esc->name ' >$esc->name</option>");
                          }
                        
                         endforeach ?>
                        
                        
                      </select>
                  </div>

                    <input type="hidden" class="form-control" id="id_imagen" name="id_imagen" value='{{ $hotspot->imagenes_id }}'  readonly>
         
               

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

 