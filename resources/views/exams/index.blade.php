@extends('app')
@section('content')

	{!! Form::open([
		'route' => 'exams.store',
		'class' => 'form',
		'novalidate' => 'novalidate' ]) !!}

		@include('exams.partials.form', ['submit_text' => 'Create'])

	{!! Form::close() !!}


	<h2>Create a new exams</h2>

	<h2>Exams list</h2>

	@if(!$exams->count())
		<p>You have no exams</p>
	@else
		<ul>
			@foreach($exams as $exam)
				<li>
					{!! Form::open([
						'class' => 'form-inline',
						'method' => 'DELETE',
						'route' => ['exams.destroy', $exam->title]
					]) !!}

					(
						<a href="{!! route('exams.show', $exam->slug) !!}">{!! $exam->title !!}</a>
						{!! link_to_route('exams.edit', 'Edit', ['$exam->slug'], ['class' => 'btn btn-info']) !!}
					)

					{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

					{!! Form::close() !!}
				</li>
			@endforeach
		</ul>
	@endif
@endsection