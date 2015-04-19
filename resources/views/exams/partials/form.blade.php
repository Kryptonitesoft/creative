<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', Input::old('title'), ['class' => 'form-control', 'placeholder' => 'exam title']) !!}
</div>

<div class="form-group">
    {!! Form::label('subject', 'Subject:') !!}
    {!! Form::text('subject', Input::old('subject'), ['class' => 'form-control', 'placeholder' => 'subject name']) !!}
</div>

<div class="form-group">
    {!! Form::label('class', 'Class:') !!}
    {!! Form::select('class',[
    	'six' => 'six',
    	'seven' => 'seven',
    	'eight' => 'eight',
    	'nine'	=> 'nine',
    	'ten'	=> 'ten',
    	'XI'	=> 'XI',
    	'XII'	=> 'XII'
    ], Input::old('class'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('mark_range', 'Mark range:') !!}
    {!! Form::text('mark_range', Input::old('mark_range'), ['class' => 'form-control', 'placeholder' => 'Mark range']) !!}
</div>

<div class="form-group">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::input('date', 'date', date('d-m-y'), Input::old('date'), ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
</div>