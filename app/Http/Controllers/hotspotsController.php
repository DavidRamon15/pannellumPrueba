<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\imagenes;

class hotspotsController extends Controller
{
    public function index($id)
    {
    	$escena = imagenes::find($id);
       	$puntos = $escena->hotspots->all();

    	
        return view('hotspots.index', compact('puntos','escena'));
    }
    public function create($id)
    {
    	$escena = imagenes::find($id);
    	return view('hotspots.create',compact('escena'));
    }
    public function store($id)
    {
    		hotspots::create([
     
        'pitch'=>request('pitch'), 
        'yaw' =>request('yaw'), 
        'type'=>request('type'), 
        'text'=>request('text'),
        'url'  =>request('url'),
        'scene_id' =>request('scene_id'),
        'imagenes_id'=>request('imagenes_id'),
        
      ]);
        $tour = tour::find($id);
       $escenas = $tour->imagenes->all();
       return view('imagenes.index',compact('escenas','tour'));

    }
}
