<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto load</title>
    <link rel="stylesheet" href="https://cdn.pannellum.org/2.4/pannellum.css"/>
    <script type="text/javascript" src="https://cdn.pannellum.org/2.4/pannellum.js"></script>
    <style>
    #panorama {
        height:90vh;
    }
    </style>
</head>
<body>
<script>
function recogerPitchYaw()
{

    inp_pitch = document.getElementById("pitch");
    inp_yaw =document.getElementById("yaw");

    pitch=viewer.getPitch(); 
    yaw=viewer.getYaw(); 
    

    inp_pitch.value = pitch;
    inp_yaw.value = yaw;

    console.log(inp_pitch);
    console.log(inp_yaw);

   document.forms["formulario"].submit();

}
</script>
<h3 align="center">Mueve y marca con doble click</h3>

<div id="panorama" ondblclick ="recogerPitchYaw();">
    
</div>

 <form method="POST" name="formulario" action="{{route('getData_hotspot_path',$escena->id )}}"  accept-charset="UTF-8" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
  
    <input type="hidden" id="pitch" name="pitch" value="{{$escena->pitch}}">
    <input type="hidden" id="panorama" name="panorama" value="{{$escena->panorama}}">
    <input type="hidden" id="yaw" name="yaw" value="{{ $escena->yaw}}">
   
</form>
<script>
viewer = pannellum.viewer('panorama', {
    "type": "equirectangular",
    "panorama": "/imagenes/{{$escena->panorama}}",
    "autoLoad": true,
    
});

    

</script>

</body>
