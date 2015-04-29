<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', Input::old('title'), ['class' => 'form-control', 'placeholder' => 'exam title']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', Input::old('body'), ['class' => 'form-control']) !!}
</div>

<div class="from-group">
    {!! Form::submit($submit_text) !!}
</div>
