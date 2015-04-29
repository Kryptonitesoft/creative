@extends('app')
@section('content')
    <h2>Write a article</h2>

    {!! Form::open([
        'route' =>  'posts.store',
        'class' => 'form'
    ]) !!}
        @include('posts/partials/form', ['submit_text' => 'Save article'])
    {!! Form::close() !!}
@endsection