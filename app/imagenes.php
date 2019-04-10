<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class imagenes extends Model
{
	protected $table= 'imagenes';
    protected $fillable = [
        'url',
    ];



    public function tours()
    {
    	return $this->belongto(tour::class);
    }
}
