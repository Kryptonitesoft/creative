<div class="form-group">
        {!! Form::label('type', 'Type') !!}
        {!! Form::select('type', [
            'image' => 'image',
            'pdf' => 'pdf',
            'ppt' => 'ppt',
            'word' => 'word'
            ], Input::old('type'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', Input::old('title'), ['class' => 'form-control', 'placeholder' => 'file title']) !!}
</div>

<div class="form-group">
    {!! Form::label('file','File') !!}
    {!! Form::file('filefield', null) !!}
</div>


<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>