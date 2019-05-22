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
        height: 95vh;
    }
    </style>
</head>
<body>
 
<div id="panorama"></div>
<?php 


echo (count($escenas));
?>
<script>
   
   
 // necesito 



pannellum.viewer('panorama', {   

    <?php

    echo( " 'default': {
        'firstScene': '".$tour->first_scene."',
        'author': 'Matthew Petroff',
        'sceneFadeDuration': 1000
    },

    'scenes': {

        ");
   


        for($i=0;$i<=count($escenas)-1; $i++){
            echo ("".$escenas[$i]->name." :  {
                        'title': '".$escenas[$i]->title."',
                        'hfov': 110,
                        'pitch': '".$escenas[$i]->pitch."',
                        'yaw':  '".$escenas[$i]->yaw."',
                        'type': 'equirectangular',
                        'panorama': '/imagenes/".$escenas[$i]->panorama."',
                        'hotSpots': [
                            ");

             for($k=0;$k<=count($collection[$i])-1; $k++){
            echo (  " {
                                 'pitch': '".$collection[$i][$k]->pitch."',
                                'yaw': '".$collection[$i][$k]->yaw."',
                                'type': '".$collection[$i][$k]->type."',
                                'text': '".$collection[$i][$k]->text."',
                                'sceneId': '".$collection[$i][$k]->scene_id."',
                            },
                       
            "); 
        }

            echo (" ]
                    },
                    ");


        }
            ?>
        }
    });
        
</script>

</body>
</html>
