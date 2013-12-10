@extends('layouts.scaffold')

@section('main')

<h1>Create NotificationConfigTemplate</h1>

{{ Form::open(array('route' => 'notificationConfigTemplates.store')) }}
	<ul>
        <li>
            {{ Form::label('notification_config_id', 'Notification_config_id:') }}
            {{ Form::input('number', 'notification_config_id') }}
        </li>

        <li>
            {{ Form::label('language_code', 'Language_code:') }}
            {{ Form::text('language_code') }}
        </li>

        <li>
            {{ Form::label('subject', 'Subject:') }}
            {{ Form::text('subject') }}
        </li>

        <li>
            {{ Form::label('template_path', 'Template_path:') }}
            {{ Form::text('template_path') }}
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


