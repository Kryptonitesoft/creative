@extends('app');

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit a teachers</div>
                    <div class="panel-body">
                        {!! Form::model($teacher, [
                        'method'    => 'PATCH',
                        'class'     => 'form-horizontal',
                        'route'     => ['teachers.update', $teacher->id],
                        'novalidate' => 'novalidate',
                        'files'     => true ]) !!}
                            @include('teachers.partials.form', ['submit_text' => 'Update'])
                        {!! Form::close() !!}
                        <img src="{!! asset('fileStorage/profile/' . $teacher->id . '.' . $teacher->image ) !!}" alt="Alt Image" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection