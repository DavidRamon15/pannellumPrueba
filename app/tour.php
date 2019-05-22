<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tour extends Model
{
	protected $table='tours';
    protected $fillable = [
        'name','first_scene','author','fade_duration'    ];

   	public function imagenes()
	{
		return $this->hasMany(imagenes::class, 'id_tour');
	}
}
