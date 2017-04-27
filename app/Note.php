<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
# El atributo fillable le dice al metodo que es invocado por la clase, cuales son las columnas con las que se va a interactuar. Por ejemplo un metodo que hace esto es metodo heredado de Model "create", que crea un nuevo objeto de esta clase.  
    protected $fillable = ['note'];

  	public function category() 
  	{
  		return $this->belongsTo(Category::class);
  	}
}
