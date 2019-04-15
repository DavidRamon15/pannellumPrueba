<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour</title>
    <link rel="stylesheet" href="https://cdn.pannellum.org/2.4/pannellum.css"/>
    <script type="text/javascript" src="https://cdn.pannellum.org/2.4/pannellum.js"></script>
    <style>
    #panorama {
        
        height: 100vh;
    }
    </style>
</head>
<body>
 
<div id="panorama"></div>
<script>
pannellum.viewer('panorama', {   
    "default": {
        "firstScene": "{{$escenas[0]->name}}",
        "author": "Matthew Petroff",
        "sceneFadeDuration": 1000,
        "autoLoad": true
    },
    for( var i=0; i<2 ;i++){
        "scenes": {
            "{{$escenas[i]->name}}": {
                "title": "Mason Circle",
                "hfov": 110,
                "pitch": -3,
                "yaw": 117,
                "type": "equirectangular",
                "panorama": "{{ asset('imagenes/'.$escenas[0]->url) }}",
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
            
        }
    
});
</script>

</body>
</html>
