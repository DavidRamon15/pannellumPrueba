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

      if($request->file('imagen')){
  
      //obtenemos el campo file definido en el formulario
       $file = $request->file('imagen');
          
       //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();

       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('public')->put($nombre,  \File::get($file));

           $tour = tour::find($id);
       $escenas = $tour->imagenes->all();

        imagenes::create([
        'name' =>request('name'),
        'url' =>$nombre,
        'pitch' =>request('pitch'),
        'yaw' =>request('yaw'),
        'id_tour' =>request('id_tour')
      ]);


      return redirect()->route('imagenes_path' ,compact('escenas','tour'));
 }

    }
 
     public function delete($id)
     {
        $imagen = imagenes::find($id);
        
        $imagen->delete($id);
      
        return redirect()->route('tours_path');
    }
    public function edit($id_escena, $id_tour)
    {
       
       $tour = tour::find($id_tour);
        

       $escena = imagenes::find($id_escena);

        

        return view("imagenes.edit",compact("tour","escena"));
    }
    public function update(Request $request , imagenes $escena)
    {
        $escena->name = $request->get('name');
        $escena->url = $request->get('url');
        $escena->pitch = $request->get('pitch');
        $escena->yaw = $request->get('yaw');
        $escena->id_tour =$request->get('id_tour');


        $escena->save();

        $escena->update();

        return redirect()->route('tours_path');
        
    }
}
