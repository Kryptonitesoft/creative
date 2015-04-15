@extends('app');
@section('content')

{!! Form::open([
    'route' => 'files.store',
    'class' => 'form',
    'novalidate' => 'novalidate',
    'files' => true]) !!}

    @include('files.partials.form', ['submit_text' => 'Upload'])
    

{!! Form::close() !!}

<h1>Files Gellery</h1>

<div class="row">
    <ul class="thumbnails">
@foreach($entries as $entry)
        <div class="col-md-2">
            <div class="thumbnail">
                @if($entry->type == 'image')
                    <img src="{!! route('files.show', $entry->filename) !!}" alt="Alt Image" class="img-responsive">
                @endif
                <div class="caption">
                    <p>{!! $entry->title !!}</p>
                    
                    <!-- File delete -->
                    {!! Form::open([
                        'method' => 'DELETE',
                        'route'  => ['files.destroy', $entry->filename],
                        ]) !!}
                    {!! Form::submit('Delete', ['class' => 'glyphicon-remove']) !!}

                    {!! Form::close() !!}


                </div>
            </div>
        </div>
@endforeach
    </ul>
</div>

@stop