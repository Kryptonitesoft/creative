@extends('app');
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add a teachers</div>
                        <div class="panel-body">
                            {!! Form::open([
                            'route' => 'teachers.store',
                            'class' => 'form-horizontal',
                            'novalidate' => 'novalidate',
                            'files' => true]) !!}
                            @include('teachers.partials.form', ['submit_text' => 'Add teacher'])
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h1>Teachers list</h1>

    <div class="row">
        <ul class="thumbnails">
            @foreach($teachers as $teacher)
                <div class="col-md-2">
                    <div class="thumbnail">
                        <img src="{!! asset('fileStorage/profile/' . $teacher->id . '.' . $teacher->image ) !!}" alt="Alt Image" class="img-responsive">
                        <div class="caption">
                            <p><a href="{!! route('teachers.show', $teacher->id) !!}">{!! $teacher->name !!}</a></p>

                            <!-- File delete -->
                            {!! Form::open([
                            'method' => 'DELETE',
                            'route' => ['teachers.destroy', $teacher->id] ]) !!}
                            {!! Form::submit('Delete', ['class' => 'glyphicon-remove']) !!}

                            {!! Form::close() !!}


                        </div>
                    </div>
                </div>
            @endforeach
        </ul>
    </div>

@stop