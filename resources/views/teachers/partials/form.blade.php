<div class="form-group">
    {!! Form::label('name', 'Name:', ['class = col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', Input::old('name'), ['class' => 'form-control', 'placeholder' => 'Your full name']) !!}

    </div>
</div>

<div class="form-group">
    {!! Form::label('teaches', 'Teaches:', ['class = col-md-4 control-label']) !!}
   <div class="col-md-6">
       {!! Form::text('teaches', Input::old('teaches'), ['class' => 'form-control', 'placeholder' => 'Teaching interest'])
       !!}
   </div>
</div>

<div class="form-group">
    {!! Form::label('education', 'Education:', ['class = col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('education', Input::old('education'), ['class' => 'form-control', 'placeholder' => 'Education']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('description', 'Short description:', ['class = col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('description', Input::old('description'), ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('email', 'Email:', ['class = col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('email', Input::old('email'), ['class' => 'form-control', 'placeholder' => 'sample@dev.io']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('fb', 'Facebook:', ['class = col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('fb', Input::old('fb'), ['class' => 'form-control', 'placeholder' => 'facebook username']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('phone', 'Contact:', ['class = col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('phone', Input::old('phone'), ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('cv', 'Resume:', ['class = col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('cv', Input::old('cv'), ['class' => 'form-control', 'placeholder' => 'Resume link']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('image', 'Image:', ['class = col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::file('image', null) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit($submit_text, ['class'=>'btn btn-primary']) !!}
    </div>
</div>