@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit Profile
@stop

{{-- Content --}}
@section('content')

<h1>Edit Topic</h1>
{{ Form::model($topic, array('method' => 'PATCH', 'route' => array('topics.update', $topic->id))) }}
	<ul>
        <li>
            {{ Form::label('admin_notes', 'Admin_notes:') }}
            {{ Form::text('admin_notes') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('topics.show', 'Cancel', $topic->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
