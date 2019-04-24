<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour</title>
    <link rel="stylesheet" href="https://cdn.pannellum.org/2.4/pannellum.css"/>
    <script type="text/javascript" src="https://cdn.pannellum.org/2.4/pannellum.js"></script>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.js"></script>  
   <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
    #panorama {
        height: 100vh;
    }
    </style>
</head>
<body>
 <div id ="pruebadiv"><button id="prueba">sfsdg</button></div>
<div id="panorama"></div>
<script>
   var i ;
   $.ajax({
                data : {!! $json !!},
                headers : {"X-CSRF-Token":"{{ csrf_token() }} " },
                url: "{{ route('datos_tour',$tour->id) }} ", 
                dataType: 'json', 
                type: 'get', 
                success: function(data) {
                    console.log(JSON.stringify(data));
               
                    alert(data[0].id);
  }
});

   pannellum.viewer('panorama', {   
                    "default": {
                        "firstScene": "circle",
                        "author": "Matthew Petroff",
                        "sceneFadeDuration": 1000
                    },
       
                "scenes": {
                
                  "hola" : {
                        "title": "Mason Circle",
                        "hfov": 110,
                        "pitch": -3,
                        "yaw": 117,
                        "type": "equirectangular",
                        "panorama": "/images/from-tree.jpg",
                        "hotSpots": [
                            {
                                "pitch": -2.1,
                                "yaw": 132.9,
                                "type": "scene",
                                "text": "Spring House or Dairy",
                                "sceneId": "house"
                            }
                        ]
                    },
                
                }   
    });

 

</script>

</body>
</html>
