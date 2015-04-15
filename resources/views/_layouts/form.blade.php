
<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }} ">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
    {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
    {!! $errors->first('slug', '<span class="help-block">:message</span>') !!}
</div>

<div class="form-group">
    {!! Form::label('lyrics', 'Lyrics:') !!}
    {!! Form::textarea('lyrics', null, ['class' => 'form-control']) !!}
    {{--{!! $errors->first('lyrics', '<span class="help-block">:message</span>') !!}--}}
</div>

<div class="form-group">
    {!! Form::label('published_at', 'Publish On:') !!}
    {!! Form::input('date', 'published_at', date('y-m-d'), ['class' => 'form-control']) !!}
    {{--{!! $errors->first('lyrics', '<span class="help-block">:message</span>') !!}--}}
</div>

<div class="form-group">
    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
</div>