@extends('layouts.scaffold')

@section('main')

<h1>Edit UserInfo</h1>
{{ Form::model($userInfo, array('method' => 'PATCH', 'route' => array('userInfos.update', $userInfo->id))) }}
	<ul>
        <li>
            {{ Form::label('user_id', 'User_id:') }}
            {{ Form::input('number', 'user_id') }}
        </li>

        <li>
            {{ Form::label('first_name', 'First_name:') }}
            {{ Form::text('first_name') }}
        </li>

        <li>
            {{ Form::label('last_name', 'Last_name:') }}
            {{ Form::text('last_name') }}
        </li>

        <li>
            {{ Form::label('screen_name', 'Screen_name:') }}
            {{ Form::text('screen_name') }}
        </li>

        <li>
            {{ Form::label('g_cal_id', 'G_cal_id:') }}
            {{ Form::text('g_cal_id') }}
        </li>

        <li>
            {{ Form::label('coach_id', 'Coach_id:') }}
            {{ Form::text('coach_id') }}
        </li>

        <li>
            {{ Form::label('position', 'Position:') }}
            {{ Form::text('position') }}
        </li>

        <li>
            {{ Form::label('user_image', 'User_image:') }}
            {{ Form::text('user_image') }}
        </li>

        <li>
            {{ Form::label('sort_index', 'Sort_index:') }}
            {{ Form::input('number', 'sort_index') }}
        </li>

        <li>
            {{ Form::label('enabled', 'Enabled:') }}
            {{ Form::checkbox('enabled') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('userInfos.show', 'Cancel', $userInfo->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
