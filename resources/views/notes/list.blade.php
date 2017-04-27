@extends('layout')


@section('content')
	<h2>Notes</h2>
	<p>
		<a href="{{ url('notes/create') }}">Add a note</a>
	</p>
	<ul class="list-group">	

	@foreach($notes as $note)
		<li class="list-group-item">
			<span class="label label-danger">{{ $note->category->name }}:</span>
			@if( strlen($note->note) > 100 ) 
				<p>{{ substr($note->note, 0, 100) }}<span>...</span></p>
				<br><a href="{{ url('notes/'.$note->id) }}" >View More</a>

<!--Llamada al metodo Mostrar en javascript-->

				<br><a href="javascript: Mostrar('{{ strstr($note->note,100) }}',{{ $note->id }} );" >View Here</a>
			@else
				<p>{{ $note->note }}</p>
			@endif			
		</li>
	@endforeach
	</ul>
	

<!-- El método render() genera el HTML (compatible con el framework de CSS Bootstrap) para acceder a las demás páginas que muestra el resultado de la consulta (En este caso es la interfaz de paginacion) -->
	{!! $notes->render() !!}
	
	
	<!--
		El metodo csrf_field siempre debe estar includo dentro de un formulario cuando se utiliza el metodo POST
		porque protege a la página de una vulnerabilidad CSRF, que es cuando una paginase hace pasar por otra p-
		ágina.
	-->
<script type="text/javascript">
	//La funcion Mostrar requiere dos paramentros uno es el texto que se debe mostrar y el otro es el id de la nota
	function Mostrar(texto, id)
	{
		if (id > 20) {
			id = id % 20;
		}
		//La variable lista guarda cual fue el Listed Item (LI) que fue clickeado perteneciente a la class CSS list-group-item, y lo selecciona con el parametro id
		var lista = (document.querySelectorAll("li.list-group-item"))[(id-1)];
		// La variable parrafo recupera el Elemento P que contiene el texto que se debe mostrar 
		var parrafo = lista.querySelector('p');
		//Cambia el link que lleva al metodo Ocultar
		lista.querySelectorAll('a')[1].href = "javascript: Ocultar("+id+");";
		//Cambia el contenido del elemento span
		parrafo.querySelector('span').innerHTML = texto;
	}
	function Ocultar (id){
		//
		var lista = (document.querySelectorAll("li.list-group-item"))[(id-1)];
		var parrafo = lista.querySelector('p');
		var saveText = parrafo.querySelector('span').innerHTML;
		lista.querySelectorAll('a')[1].href = "javascript: Mostrar('"+saveText+"',"+id+");";
		parrafo.querySelector('span').innerHTML = "...";
	}
</script>

@endsection