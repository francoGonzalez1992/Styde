<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['name'];
# El metodo notes devuelve la relacion en las categorias y las notas. En este caso la categoria tiene muchas notas

    public function notes()
    {
    	return $this->hasMany(Note::class);
    }
}
