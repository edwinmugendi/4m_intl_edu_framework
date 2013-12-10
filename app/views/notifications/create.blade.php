@extends('layouts.scaffold')

@section('main')

<h1>Create Notification</h1>

{{ Form::open(array('route' => 'notifications.store')) }}
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


