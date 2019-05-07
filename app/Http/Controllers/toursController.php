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
       $tour = tour::find($id);
       $escenas = $tour->imagenes->all();
        
      $imagenes = imagenes::find(0);
      $hotspots = hotspots::where('imagenes_id', '=' ,$imagenes);
     
       $json = json_encode($escenas);
       
        var_dump($json);
        //return $tour->imagenes->toJson();
           
    	//return view('tour.tour',compact('tour','escenas','json'));
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
    public function store(Request $request )
    {

       tour::create([
        'name' =>request('name'),
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
        $tour->name = $request->get('name');
        $tour->save();

        $tour->update();

        return redirect()->route('tours_path');
    }
}
