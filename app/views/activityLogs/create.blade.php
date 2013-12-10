@extends('layouts.scaffold')

@section('main')

<h1>Create Activitylog</h1>

{{ Form::open(array('route' => 'activitylogs.store')) }}
	<ul>
        <li>
            {{ Form::label('user_id', 'User_id:') }}
            {{ Form::input('number', 'user_id') }}
        </li>

        <li>
            {{ Form::label('object_type', 'Object_type:') }}
            {{ Form::text('object_type') }}
        </li>

        <li>
            {{ Form::label('object_id', 'Object_id:') }}
            {{ Form::text('object_id') }}
        </li>

        <li>
            {{ Form::label('action', 'Action:') }}
            {{ Form::text('action') }}
        </li>

        <li>
            {{ Form::label('detail', 'Detail:') }}
            {{ Form::text('detail') }}
        </li>

        <li>
            {{ Form::label('created', 'Created:') }}
            {{ Form::text('created') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


