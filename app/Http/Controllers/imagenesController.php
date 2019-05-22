<?php

namespace App\Http\Controllers;

use Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\imagenes;
use App\tour;

use File;

use Illuminate\Support\Facades\Storage;
class imagenesController extends Controller
{
    public function index($id)
    {
    	$tour = tour::find($id);
       $escenas = $tour->imagenes->all();

    	
        return view('imagenes.index',compact('escenas','tour'));
    }

    public function create($id)
    {
    $tour = tour::find($id);


      return view('imagenes.create',compact('tour'));
	}
    public function store(Request $request, $id)
    {


      if($request->file('panorama')){
          
      //obtenemos el campo file definido en el formulario
       $file = $request->file('panorama');
          
       //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();

       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('public')->put($nombre,  \File::get($file));

           $tour = tour::find($id);
       $escenas = $tour->imagenes->all();

        imagenes::create([
        'id_tour' =>request('id_tour'),
        'name' =>request('name'),
        'title' =>request('title'),
        'hfov' =>request('hfov'),
        'pitch' =>request('pitch'),
        'yaw' =>request('yaw'),
        'type'=>request('type'),
        'panorama' =>$nombre,
        
      ]);


      return redirect()->route('imagenes_path' ,compact('escenas','tour'));
 }

    }
 
     public function delete($id,$id_tour)
     {

        $imagen = imagenes::find($id);
        $imagen->delete($id);

      
        return redirect()->route('imagenes_path',compact('id_tour'));
    }
    public function edit($id_escena, $id_tour)
    {
       
       $tour = tour::find($id_tour);
        

       $escena = imagenes::find($id_escena);

        

        return view("imagenes.edit",compact("tour","escena"));
    }
    public function update(Request $request , imagenes $escena)
      {
       
       $escena = imagenes::find($request->id);
      
        $tour = tour::find($request->get('id_tour'));
        $escenas = $tour->imagenes->all();
      
        

       if($request->file('imagen')){
  
      //obtenemos el campo file definido en el formulario
       $file = $request->file('imagen');
          
       //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();

       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('public')->put($nombre,  \File::get($file));

          
      $escena->panorama = $nombre;
    }
    else
    {
        $escena->panorama = $escena->panorama;
    }

    $escena->name = $request->get('name');
    $escena->title = $request->get('title');
    $escena->hfov = $request->get('hfov');
    $escena->pitch =$escena->pitch;
    $escena->yaw = $escena->yaw;
    $escena->type = $request->get('type');
    $escena->id_tour =$request->get('id_tour');


        $escena->save();

        $escena->update();
        
        return redirect()->route('imagenes_path' ,compact('escenas','tour'));
        
       
    }
    public function editPitchYaw($id_escena, $id_tour)
    {
       $tour = tour::find($id_tour);
        

       $escena = imagenes::find($id_escena);

       

        return view("imagenes.editPitchYaw",compact("tour","escena"));
    }
    public function updatePitchYaw(request $request ,imagenes $escena)
    {
        
      $tour = tour::find($escena->id_tour);
 
       $escena = imagenes::find($request->id);

     $escena = imagenes::find($request->id);

      $escena->name = $escena->name;
      $escena->id_tour = $escena->id_tour;
      $escena->title = $escena->title;
      $escena->hfov = $escena->hfov;
      $escena->type = $escena->type;
      $escena->panorama =$escena->panorama;
      $escena->pitch = $request->get('pitch');
      $escena->yaw = $request->get('yaw');

      $escena->save();

      $escena->update();

     
        
       return redirect()->route('imagenes_path' ,compact('escena'));
    }
}
