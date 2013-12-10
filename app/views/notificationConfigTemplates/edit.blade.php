@extends('layouts.scaffold')

@section('main')

<h1>Edit NotificationConfigTemplate</h1>
{{ Form::model($notificationConfigTemplate, array('method' => 'PATCH', 'route' => array('notificationConfigTemplates.update', $notificationConfigTemplate->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('notificationConfigTemplates.show', 'Cancel', $notificationConfigTemplate->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
