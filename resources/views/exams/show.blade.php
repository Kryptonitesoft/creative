@extends('app');

@section('content')

    <h2>Insert a result record </h2>

    {!! Form::open([
        'route' => ['exams.results.store', $exam->id],
        'class' => 'form-inline',
        'novalidate' => 'novalidate']) !!}

        @include('results.partials.form', ['submit_text' => 'Add to list'])

    {!! Form::close() !!}

    <h2>{!! $exam->title !!}</h2>

    @if( !$exam->results->count() )
        <p>You have no result yet.</p>
    @else
        <ul class="list-inline">
            @foreach($exam->results as $result)
                <li>{!! $result->sroll !!}</li>
                <li>{!! $result->name !!}</li>
                <li>{!! $result->mark !!}</li>
                <li>{!! $result->gpa !!}</li>
                <li>{!! link_to_route('exams.results.edit', 'Edit', [$exam->id, $result->id]) !!}</li>
                <li>
                    {!! Form::open([
                        'method' => 'DELETE',
                        'route'  => ['exams.results.destroy', $exam->id, $result->id]
                    ]) !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                    {!! Form::close() !!}
                </li>
                <br/>
            @endforeach
        </ul>
    @endif

@endsection