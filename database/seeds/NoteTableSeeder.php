<?php

use Illuminate\Database\Seeder;
use App\Note;
use App\Category;

class NoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$categories = Category::all();

# Con el método create() se crean las instancias de un modelo y se persisten dichos objetos en la base de datos

    //	factory(Note::class)->times(40)->create();

# Con make() sólo se crean las instancias del modelo sin persistirlas en la base de datos. 

    	$notes = factory(Note::class)->times(40)->make();

# El metodo save pertenece a hasMany(metodo) que esta definido en el modelo Category, que permite guardar cada una de las notas asociandolas con su correspondiente categoria aleatoria. 

    	foreach ($notes as $note) {
    		$category = $categories->random();//Genera una categoria aleatoria

    		$category->notes()->save($note);
    	}
# NOTA: En el ORM Eloquent cuando utilizo parentesis {Ejemplo: category->notes()->save($note)} significa que estoy trabajando con "Relaciones" (en este caso pidiendo una relación). Cuando no utilizo parentesis  como $category->notes quiere decir que Eloquent va a traer todas las notas relacionadas con una categoria ó tambien $note->category va a traer la categoria relacionada con esa nota
    }
}
