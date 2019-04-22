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
        "firstScene": "Scene",
        "author": "Matthew Petroff",
        "sceneFadeDuration": 1000,
        "autoLoad": true
    },
    "Scene": {

<?php
    for( $i=0;$i <=count($escenas)-1;$i++)
       {
?>
       
        "{{$escenas[$i]->name}}": {
                "title": "Mason Circle",
                "hfov": 110,
                "pitch": -3,
                "yaw": 117,
                "type": "equirectangular",
                "panorama": "{{ asset('imagenes/'.$escenas[$i]->url) }}",
             
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

    <?php } ?>   
    }
});

</script>

</body>
</html>
