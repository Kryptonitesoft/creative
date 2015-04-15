@extends('_layouts.master')
@section('content')

<h1>Upload a file</h1>

<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>


{!! Form::open([
    'route' => 'files.store',
    'class' => 'form',
    'novalidate' => 'novalidate',
    'files' => true]) !!}

    
    <div class="form-group">
        {!! Form::label('type', 'Type') !!}
        {!! Form::select('type', [
            'image' => 'image',
            'pdf' => 'pdf',
            'ppt' => 'ppt',
            'word' => 'word'
            ], Input::old('type'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title', Input::old('title'), ['class' => 'form-control', 'placeholder' => 'file title']) !!}
    </div>

   <div class="form-group">
        {!! Form::label('file','File') !!}
        {!! Form::file('filefield', null) !!}
   </div>


    {!! Form::submit('upload', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}

@stop