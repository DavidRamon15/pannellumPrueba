@extends('layouts.app')
@section('content')
<script>
function seleccionTipo()
  { 

   alert('hola');
   var tipo = document.getElementById('type');
      if(tipo == "info" )
      {
        var text = document.createElement("div");
        text.setAttribute( 'class', 'form-group');
        text.setAttribute( 'id' ,'div_info');
        form.appendChild(text);

        var label = document.createElement("label");

      }else if (tipo == "scene"){
       document.getElementById('div_url').style.visibility = 'visible';
       document.getElementById('div_scene_id').style.visibility ='visible';
        document.getElementById('div_text').style.visibility = 'hidden';
      }
  }





</script>
<h2> Crear Tour</h2>

<form id='form' action="{{route('store_hotspot_path',$escena->id )}}" method="POST">
	{{ csrf_field() }}
  <div class="form-group ">
    <label for="name">Pitch</label>
    <input type="string" class="form-control" id="pitch" name="pitch" placeholder="Introduce pitch">
  </div>
   <div class="form-group ">
    <label for="name">yaw</label>
    <input type="string" class="form-control" id="yaw" name="yaw" placeholder="Introduce yaw">
  </div>
  <div class="form-group ">
   <select name="select" id='type' onblur="seleccionTipo();">
      <option value="info" >informacion</option> 
      <option value="scene" selected>escena</option>
   </select>
  </div>


   <div class="form-group" id="div_text">
    <label for="name">text</label>
    <input  class="form-control" id="text" name="text" placeholder="Introduce texto">
  </div>

   <div class="form-group " id='div_url'  >
    <label for="name">url</label>
    <input type="string" class="form-control" id="url" name="url" placeholder="Introduce url de la imagen en caso de ser tipo info">
  </div>

   <div class="form-group" id="div_scene_id">
    <label for="name">scene_id</label>
    <input type="string" class="form-control" id="text" name="text" placeholder="Introduce el id de la escena a que saltas ">
  </div>

    <!-- introducir id tour-->
    <input type="hidden" class="form-control" id="id_imagen" name="id_imagen" value='{{ $escena->id }}'  readonly>
  
 
  <button type="submit" class="btn btn-primary">Crear</button>
</form>
	@endsection