<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', Input::old('title'), ['class' => 'form-control', 'placeholder' => 'file title']) !!}
</div>

<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', Input::old('title'), ['class' => 'form-control', 'placeholder' => 'file title']) !!}
</div>



<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>