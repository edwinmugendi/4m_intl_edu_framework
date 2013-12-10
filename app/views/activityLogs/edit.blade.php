@extends('layouts.scaffold')

@section('main')

<h1>Edit Activitylog</h1>
{{ Form::model($activitylog, array('method' => 'PATCH', 'route' => array('activitylogs.update', $activitylog->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('activitylogs.show', 'Cancel', $activitylog->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
