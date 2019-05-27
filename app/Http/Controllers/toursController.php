<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tour;
use App\imagenes;

use App\hotspots;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;
class toursController extends Controller
{
    public function index()
    {
    	 
    	 $tours = Tour::all();
       $imagenes = imagenes::all();
       $hotspots = hotspots::all();
        return view('tour.index',compact('tours','imagenes','hotspots'));
    }

    public function show($id_tour)
    {
     
       $tour = tour::find($id_tour);
       $escenas = $tour->imagenes->all();

        $collection = collect([]);

      foreach ($escenas as $escena) {
        $collection->push($escena->hotspots);
      }
          
    	return view('tour.tour',compact('tour','escenas','collection'));
    }
    public function get_datos($id)
    {

        $tour = tour::find($id)->first();
       $escenas = $tour->imagenes->all();

       $json = json_encode($escenas);
        
        
       return $json;
    }

    public function create()
    {
      return view('tour.create');

  
    }
    public function store(request $request )
    {
      $data = $request->all();

      $rules = array(
       'name' => 'required' ,
        'first_scene' => 'required',
        'author'  => 'required',
        'fade_duration' => 'required'   
      );
    
      $valida = validator::make($data,$rules);

      if($valida->fails())
      {
        return redirect()->back()
              ->withErrors($valida->errors())
              ->WithInput($data);

      }


       tour::create([
        'name' =>request('name'),
        'first_scene'=>request('first_scene'),
        'author'=>request('author'),
        'fade_duration'=>request('fade_duration'),
      ]);
      return redirect()->route('tours_path');
    }
    public function delete($id){
        $id = tour::find($id);
        
        $id->delete();
      
        return redirect()->route('tours_path');
    }
    public function edit(Tour $tour)
    {
        
        return view('tour.edit',compact('tour'));
    }
    public function update(Request $request, Tour $tour)
    {
      $data = $request->all();

      $rules = array(
       'name' => 'required' ,
        'first_scene' => 'required',
        'author'  => 'required',
        'fade_duration' => 'required'   
      );
    
      $valida = validator::make($data,$rules);

      if($valida->fails())
      {
        return redirect()->back()
              ->withErrors($valida->errors())
              ->WithInput($data);

      }
        $tour->name = $request->get('name');
        $tour->first_scene = $request->get('first_scene');
        $tour->author = $request->get('author');
        $tour->fade_duration = $request->get('fade_duration');
        $tour->save();

        $tour->update();

        return redirect()->route('tours_path');
    }
}
