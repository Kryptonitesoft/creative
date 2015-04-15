@extends('_layouts.master')

@section('content')
    <h1>{!! $file->title !!}</h1>

    <ul>
        <li>{!! $file->id !!}</li>
        <li>{!! $file->type !!}</li>
        <li>{!! $file->title !!}</li>
        <li>{!! base_path() . '/public/fileStorage/' . $file->slug !!}</li>
        <li>{!! $file->size !!}</li>
        <li>{!! $file->views !!}</li>
        <li>{!! $file->created_at !!}</li>
    </ul>
    @if($file->type == 'image')
        <img src={!!  asset('fileStorage/' . $file->id . $file->slug ) !!} alt="Image" width="1100px" height="600px">
    @endif
@stop