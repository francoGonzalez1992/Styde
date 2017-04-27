@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h2>Notes</h2>
		Categoría: <span class="label label-danger">{{ $note->category->name }}</span>
		| <a href="{{ url('notes') }}">View all Notes</a>
		<hr>
		{{ $note->note }}		
	</div>
</div>
@endsection