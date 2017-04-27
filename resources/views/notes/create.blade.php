@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<h1>Crear una nota</h1>
		@include('partials/errors')
		<form action="{{ url('notes') }}" method="post" class="form">
			{!!csrf_field()!!}
			<div class="form-group">

<!-- El metodo Old recupera la informacion que fue ingresada al input(textarea) en el caso de que la entrada no haya sido validada-->
				<h2>Add a category</h2>
				<input type="text" name="name" class="form-control">
				<textarea name="note" class="form-control" placeholder="Write something here...">{{ old('note') }}</textarea>
			</div>
			<button type="submit" class="btn btn-primary">Create note</button>
		</form>
	</div>
</div>
@endsection