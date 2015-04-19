@extends('app')
@section('content')

    <h2>Edit this result</h2>

    {!! Form::model($result, [
        'method' => 'PATCH',
        'route'  => ['exams.results.update', $exam->id, $result->id],
        'class'	 => 'form-inline'
    ]) !!}

        @include('results.partials.form', ['submit_text' => 'update'])

    {!! Form::close() !!}

@endsection