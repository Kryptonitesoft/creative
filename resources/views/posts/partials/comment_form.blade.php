<div class="form-group">
    {!! Form::label('body', 'Message:') !!}
    {!! Form::textarea('body', Input::old('body'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', Input::old('name'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', Input::old('email'), ['class' => 'form-control']) !!}
</div>

<div class="from-group">
    {!! Form::submit($submit_text) !!}
</div>
