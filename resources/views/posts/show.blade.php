@extends('app')
@section('content')
    <h1>{{ $post->title }}</h1>
    <p>By {{ $post->author->name }}</p><br/>
    <p>{{ $post->body }}</p><br/>

    @if( !$post->comments->count() )
        <h2>This post has no comments yet. Be first commenter!!</h2>

        {!! Form::open([
        'route' => ['posts.comments.store', $post->id],
        'class' =>  'form',
        ]) !!}
        @include('posts.partials.comment_form', ['submit_text' => 'Post a comment'])
        {!! Form::close() !!}
    @else
        <h2>Comments: {!! $post->comment_count !!}</h2>

        {!! Form::open([
            'route' => ['posts.comments.store', $post->id],
            'class' =>  'form',
        ]) !!}
            @include('posts.partials.comment_form', ['submit_text' => 'Post a comment'])
        {!! Form::close() !!}
        <ul>
            @foreach($post->comments as $comment)
                <li>{{ $comment->body }}</li><br/>
                {!! Form::open([
                'method' => 'DELETE',
                'route' =>  ['posts.comments.destroy', $post->id, $comment->id],
                ]) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                {!! Form::close() !!}
            @endforeach
        </ul>
    @endif
@endsection