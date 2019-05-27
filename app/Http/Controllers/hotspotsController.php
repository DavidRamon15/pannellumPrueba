<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\imagenes;
use App\hotspots;
use App\tour;
use Illuminate\Support\Facades\Validator;
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

      return view('hotspots.createPitchYaw',compact('escena'));

    }
    public function store(Request $request )
    {
       /* 
        $data = $request->all();

      $rules = array(
     'pitch' => 'required',
     'yaw' => 'required',
     'text' => 'required',
     'imagenes_id' => 'required' 
      );
    
      $valida = validator::make($data,$rules);

        
      if($valida->fails())
      {
        return redirect()->back()
              ->withErrors($valida->errors())
              ->WithInput($data);

      }*/

        if(request('url') == "")
        {
           
            hotspots::create([
     
        'pitch'=>request('pitch'), 
        'yaw' =>request('yaw'), 
        'type'=>request('select'), 
        'text'=>request('text'),
        'url'  =>"null",
        'scene_id' =>request('scene_id'),
        'imagenes_id'=>request('id_imagen'),   
         ]);    

         }else
        {
            
            hotspots::create([
     
        'pitch'=>request('pitch'), 
        'yaw' =>request('yaw'), 
        'type'=>request('select'), 
        'text'=>request('text'),
        'url'  =>request('url'),
        'scene_id' =>"null",
        'imagenes_id'=>request('id_imagen'),
         ]);
        }

        $escena = imagenes::find($request->id_imagen);
        $puntos = $escena->hotspots->all();
      return view('hotspots.index', compact('puntos','escena'));

    }

     public function delete($id,$id_escena)
     {

        $hotspots = hotspots::find($id);
        
        $hotspots->delete($id);
      
        return redirect()->route('hotspots_path',compact("id_escena"));
    }
    public function edit($id_escena, $id_hotspot)
    {
          $tour = tour::find($id_escena);
          $hotspot = hotspots::find($id_hotspot);

     
       $escenas = $tour->imagenes->all();
    

            return view('hotspots.edit',compact('tour','hotspot','escenas'));
    }
    public function update(Request $request , $id )
    {
       
 
           $data = $request->all();

      $rules = array(
     'pitch' => 'required',
     'yaw' => 'required',
     'text' => 'required',
     'url' => 'required',
     'scene_id' => 'required',
      );
    
      $valida = validator::make($data,$rules);

        
      if($valida->fails())
      {
        return redirect()->back()
              ->withErrors($valida->errors())
              ->WithInput($data);

      }


       $hotspot = hotspots::find($id);
        
        
        $hotspot->pitch = $request->get('pitch');
        $hotspot->yaw = $request->get('yaw');
        $hotspot->type = $request->get('select');
        $hotspot->text = $request->get('text');
        $hotspot->url = $request->get('url');
        $hotspot->scene_id = $request->get('scene_id');
        $hotspot->imagenes_id = $request->get('id_imagen');
        
        $hotspot->save();

        $hotspot->update();

        
        
         return redirect()->route('tours_path');
    }
    public function getData($escena , request $request)
    {
  
        $localizacion= $request->all();
        
        $escena = imagenes::find($escena);
        $tour = tour::find($escena->id_tour);
       $escenas = $tour->imagenes->all();
    
      

        return view('hotspots.create',compact('localizacion','escenas','escena'));
    }

      public function editPitchYaw($id_escena, $id_hotspot)
    {
        $escena = imagenes::find($id_escena);
        $hotspot = hotspots::find($id_hotspot);

        return view("hotspots.editPitchYaw",compact("escena","hotspot"));
    }
    public function updatePitchYaw(request $request , $escena)

    {
        
        
      $escena = imagenes::find($escena);
 
       $hotspot = hotspots::find($request->id);


     
      
      $hotspot->type = $hotspot->type;
      $hotspot->text =$hotspot->text;
      $hotspot->url = $hotspot->url;

      $hotspot->scene_id = $hotspot->scene_id;
      $hotspot->pitch = $request->get('pitch');
      $hotspot->yaw = $request->get('yaw');
      
      $hotspot->imagenes_id = $hotspot->imagenes_id;

    
      $hotspot->save();

      $hotspot->update();

     
        
       return redirect()->route('imagenes_path' ,compact('escena'));
    }
}
