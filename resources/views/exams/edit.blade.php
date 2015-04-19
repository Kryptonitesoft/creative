@extends('app');

@section('content')

    <h2>Edit exam:</h2>

    {!! Form::model($exam, [
        'method'    => 'PATCH',
        'route'     => ['exams.update', $exam->id],
        'class'     => 'form-inline',
        'novalidate' => 'novalidate' ]) !!}

        @include('exams.partials.form', ['submit_text' => 'Update'])

    {!! Form::close() !!}


@endsection