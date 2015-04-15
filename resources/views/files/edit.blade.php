@extends('app');
@section('content')

<h1>Files Gellery</h1>

<!-- File edit -->

{!! Form::model($entry, [
    'method' => 'PATCH',
    'route' => ['files.update', $entry->filename]
    ]) !!}

    @include('files.partials.form', ['submit_text' => 'Edit'])

{!! Form::close() !!}

@stop