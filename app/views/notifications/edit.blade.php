@extends('layouts.scaffold')

@section('main')

<h1>Edit Notification</h1>
{{ Form::model($notification, array('method' => 'PATCH', 'route' => array('notifications.update', $notification->id))) }}
	<ul>
        <li>
            {{ Form::label('label', 'Label:') }}
            {{ Form::text('label') }}
        </li>

        <li>
            {{ Form::label('description', 'Description:') }}
            {{ Form::text('description') }}
        </li>

        <li>
            {{ Form::label('subject', 'Subject:') }}
            {{ Form::text('subject') }}
        </li>

        <li>
            {{ Form::label('body', 'Body:') }}
            {{ Form::textarea('body') }}
        </li>

        <li>
            {{ Form::label('sent_adresses', 'Sent_adresses:') }}
            {{ Form::text('sent_adresses') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('notifications.show', 'Cancel', $notification->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
