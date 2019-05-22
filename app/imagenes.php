<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imagenes extends Model
{
	protected $table= 'imagenes';
    protected $fillable = [
       'id_tour', 'name','title','hfov','pitch','yaw','type','panorama',
    ];



    public function tours()
    {
    	return $this->belongsTo(tour::class, 'id_tour');
    }
    public function hotspots()
	{
		return $this->hasMany(hotspots::class, 'imagenes_id');
	}
}
