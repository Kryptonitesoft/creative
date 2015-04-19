@extends('app')
@section('content')

	<h2>Create a new exams</h2>

	{!! Form::open([
		'route' => 'exams.store',
		'class' => 'form-inline',
		'novalidate' => 'novalidate' ]) !!}

		@include('exams.partials.form', ['submit_text' => 'Create'])

	{!! Form::close() !!}


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
						'route' => ['exams.destroy', $exam->id]
					]) !!}

					(
						<a href="{!! route('exams.show', $exam->id ) !!}">{!! $exam->title !!}</a>
						{!! link_to_route('exams.edit', 'Edit', [$exam->id], ['class' => 'btn btn-info']) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
					)

					{!! Form::close() !!}
				</li>
			@endforeach
		</ul>
	@endif
@endsection