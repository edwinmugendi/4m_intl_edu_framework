@extends('layouts.scaffold')

@section('main')

<h1>Edit AccessLog</h1>
{{ Form::model($accessLog, array('method' => 'PATCH', 'route' => array('accessLogs.update', $accessLog->id))) }}
	<ul>
        <li>
            {{ Form::label('user_id', 'User_id:') }}
            {{ Form::input('number', 'user_id') }}
        </li>

        <li>
            {{ Form::label('created', 'Created:') }}
            {{ Form::text('created') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('accessLogs.show', 'Cancel', $accessLog->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
