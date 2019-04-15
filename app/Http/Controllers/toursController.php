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

    	//$imagenes  = $tour->imagenes->get();

        
        //return $tour->imagenes->toJson();
           
    	return view('tour.tour',compact("escenas"));
    }
}
