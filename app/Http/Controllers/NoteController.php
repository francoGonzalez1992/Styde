<?php

namespace App\Http\Controllers;

use App\Note;
use App\Category;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index() 
    {

# El método paginate() puede ser usado con cualquier consulta de Eloquent y como resultado se obtiene una instancia de lluminate\Pagination\LengthAwarePaginator que puede ser recorrido como un array a través de la directiva de Blade @foreach.

    	$notes = Note::paginate(20);//La Paginacion demuestra hasta 20 elementos

		return view('notes/list', compact('notes'));
    }

    public function create()
    {
    	return view('notes/create');
    }

    public function store() 
    {   
        $this->validate(request(), [
                'note' => ['required', 'max:200'],
                'name' => ['required', 'max:15']
            ]);

# La funcion helper de Laravel "request" busca cuales son los pedidos que se le hicieron al metodo "store" a traves del metodo de envio. En este caso es post. El metodo create guarda un nuevo modelo de Note y devuelve una instancia. 
        $categories = Category::create(request()->only(['name']));
        $notes = Note::create(request()->only(['note']));        
        $categories->notes()->save($notes);

        return redirect()->to('notes');
    }

    public function show($note) 
    {   
        $note = Note::findOrFail($note);
    	return view('notes/details', compact('note'));
    }
}
