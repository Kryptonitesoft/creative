@extends('app');
@section('content')
    <img src="{!! asset('fileStorage/profile/' . $teacher->id . '.' . $teacher->image ) !!}" alt="Alt Image" class="img-responsive">
    <h1>{!! $teacher->name !!}</h1>
    <a href="{!! route('teachers.edit', $teacher->id) !!}" class="glyphicon-edit">Edit</a>

@endsection