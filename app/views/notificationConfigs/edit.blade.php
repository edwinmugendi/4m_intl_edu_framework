@extends('layouts.scaffold')

@section('main')

<h1>Edit NotificationConfig</h1>
{{ Form::model($notificationConfig, array('method' => 'PATCH', 'route' => array('notificationConfigs.update', $notificationConfig->id))) }}
	<ul>
        <li>
            {{ Form::label('name', 'Name:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::textarea('description') }}
        </li>

        <li>
            {{ Form::label('to_addresses', 'To_addresses:') }}
            {{ Form::text('to_addresses') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('notificationConfigs.show', 'Cancel', $notificationConfig->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
