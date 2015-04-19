<div class="form-group">
    {!! Form::label('sroll', 'Student roll:') !!}
    {!! Form::text('sroll', Input::old('sroll'), ['class' => 'form-control', 'placeholder' => 'Student roll']) !!}
</div>

<div class="form-group">
    {!! Form::label('name', 'Student name:') !!}
    {!! Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => 'student name']) !!}
</div>

<div class="form-group">
    {!! Form::label('mark', 'Student mark:') !!}
    {!! Form::text('mark', Input::old('mark'), ['class' => 'form-control', 'placeholder' => 'student mark']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>