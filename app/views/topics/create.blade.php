@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit Profile
@stop

{{-- Content --}}
@section('content')
<h1 class="col-md-6 col-md-offset-3">Create Topic</h1>
<div class="well col-md-6 col-md-offset-3">

    @if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
    @endif
    
{{ Form::open(array('route' => array('discussions.topics.store', $discussion_id), 'class' => 'form-horizontal', 'role' => 'form')) }}
    <div class="form-group">
        {{ Form::label('title_en', 'English title:', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('title_en', array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('title_ar', 'Arabic title:', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('title_ar', array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('admin_notes', 'Admin notes:', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('admin_notes', array('class' => 'form-control')) }}
        </div>
    </div>

    <div class="form-group col-sm-offset-2 col-sm-10">
        {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
    </div>
{{ Form::close() }}

</div>

@stop


