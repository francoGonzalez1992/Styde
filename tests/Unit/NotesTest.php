<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Note;

class NotesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
/*  	public function testNotesList()
  	{

  	#	Las pruebas se dividen en tres Having, when y then
  	#	Having == es la base de las pruebas donde se establecen las condiciones para hacer la prueba
  		Note::create(['note' => 'My first note']);
  		Note::create(['note' => 'second note']);

  	#	When == se definen las diferentes acciones que haria el usuario
  //  Then == donde se agregan todas las comprobaciones
  		$this->visit('notes')  
  		->see('My first note')
  		->see('Second note');
    
    
   	}
*/
    public function testNoteCreate() 
    {
      $this->visit('notes') // Al visitar la pagina con la ruta "notes"
          ->click('Add a note') // y al hacer click en el enlace "Add a note"
          ->seePageIs('notes/create') // Me muestra una pagina con la ruta 'notes/create'
          ->see('Create a note') // Donde en la pagina puedo ver un texto HTML ( con cualquier tag) que dice "Create a note"
          ->type('Hola','category')
          ->type('A new note','note')// Y tipeo (escribo) una nueva nota que dice "A new note" en un campo de formulario "note"
          ->press('Create note')// Presionando en un boton "Create note"
          ->seePageIs('notes')// Me regresa o redireciona devuelta a la pagina con ruta "notes"
          ->see('A new note') //Y puedo ver el texto ingresa en la pagina
          ->seeInDatabase('notes',['note'=>'A new note']);//Y Verla tambien en la base de datos
    }
}
