@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Create Category
@stop

{{-- Content --}}
@section('content')

@if ($errors->any())
<ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

<h1 class="col-md-6 col-md-offset-3">Create Category</h1>
<div class="well col-md-6 col-md-offset-3">
{{ Form::open(array('route' => 'tags.store')) }}
    {{ Form::hidden('type', 'Category') }}
    <div class="form-group">
        {{ Form::label('label_en', 'English:', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('label_en', '', array('class' => 'form-control', 'autofocus'=>'autofocus')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('label_ar', 'Arabic:', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('label_ar', '', array('class' => 'form-control lang-ar')) }}
        </div>
    </div>

    <div class="form-group col-sm-offset-2 col-sm-10">
        {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
    </div>

{{ Form::close() }}
</div>
@stop


