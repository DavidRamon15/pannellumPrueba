<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hotspots extends Model
{
    protected $table= 'hotspots';
    protected $fillable = [
        'pitch','yaw','type','text','url','scene_id','imagenes_id'
    ];



    public function imagenes()
    {
    	return $this->belongsTo(imagenes::class, 'imagenes_id');
    }
}
