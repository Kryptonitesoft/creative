@extends('app')
@section('content')

    <h1>Article's</h1>
    <a href="{!! route('posts.create') !!}">Create a post</a>
    @if( !$posts->count())
        <p>The blog have no article</p>
    @else
        <ul>
            @foreach( $posts as $post)
                <li><h4><a href="{!! route('posts.show', $post->id)  !!}">{!! $post->title !!}</a></h4></li>
                <p>{!! substr($post->body, 0, 120) !!} <a href="{!! route('posts.show', $post->id)  !!}">Read more</a></p>
                {!! Form::open([
                    'method' => 'DELETE',
                    'route' =>  ['posts.destroy', $post->id],
                ]) !!}
                (
                    {!! link_to_route('posts.edit', 'Edit', [$post->id], ['class' => 'btn btn-info']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                )

                {!! Form::close() !!}
            @endforeach
        </ul>
    @endif

@endsection