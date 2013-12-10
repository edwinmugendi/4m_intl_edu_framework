@extends('layouts.scaffold')

@section('main')

<h1 class="col-md-6 col-md-offset-3">Create UserInfo</h1>
<div class="well col-md-6 col-md-offset-3">
{{ Form::open(array('route' => 'userInfos.store', 'class'=>'form-horizontal', 'role'=>'form')) }}
{{ Form::hidden('user_id', $user_id) }}
    
    <div class="form-group">
        {{ Form::label('first_name', 'First_name:', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('first_name') }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('last_name', 'Last_name:', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('last_name') }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('screen_name', 'Screen_name:', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('screen_name') }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('g_cal_id', 'G_cal_id:', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('g_cal_id') }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('coach_id', 'Coach_id:', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('coach_id') }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('position', 'Position:', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('position') }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('user_image', 'User_image:', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('user_image') }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('sort_index', 'Sort_index:', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::input('number', 'sort_index') }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('enabled', 'Enabled:', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::checkbox('enabled') }}
        </div>
    </div>

	<div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
		  {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
        </div>
	</div>
</div>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


