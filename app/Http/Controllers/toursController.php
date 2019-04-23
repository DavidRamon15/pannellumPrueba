<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tour;
use App\imagenes;
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
     
        for ($i=0;$i<=count($escenas)-1;$i++)
        {
        $data =  array( 
            'id' =>  $escenas[0]->id ,
            'name' =>  $escenas[0]->name, 
            'url' =>  $escenas[0]->url
        
        ); 
    
    }
        var_dump($data);

    	//$imagenes  = $tour->imagenes->get();

        
        //return $tour->imagenes->toJson();
           
    	return view('tour.tour',compact("escenas","tour"));
    }
    public function getdatos(Request  $id)
    {
        $tour = tour::find($id)->first();

        $escenas = $tour->imagenes->all();

        

           return json_encode($escenas);

           
        

    }
}
