@extends('app')
@section('content')
    <h2>Edit article</h2>

    {!! Form::model($post, [
    'method'    => 'PATCH',
    'route' =>  ['posts.update', $post->id],
    'class' => 'form',
    ]) !!}
    @include('posts/partials/form', ['submit_text' => 'Save'])
    {!! Form::close() !!}
@endsection