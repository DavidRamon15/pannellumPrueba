<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tour;
use App\imagenes;

use App\hotspots;
class toursController extends Controller
{
    public function index()
    {
    	 
    	 $tours = Tour::all();
        return view('tour.index',compact('tours'));
    }

    public function show($id)
    {
       $tour = tour::find($id)->first();
       $escenas = $tour->imagenes->all();
        
      $imagenes = imagenes::find(0);
      $hotspots = hotspots::where('imagenes_id', '=' ,$imagenes);
        var_dump($hotspots);
       $json = json_encode($escenas);
       

        //return $tour->imagenes->toJson();
           
    	return view('tour.tour',compact('tour','escenas','json'));
    }
    public function get_datos($id){

        $tour = tour::find($id)->first();
       $escenas = $tour->imagenes->all();

       $json = json_encode($escenas);
        
        
       return $json;
    }
}
