@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit Profile
@stop

{{-- Content --}}
@section('content')

<h1>Edit Discussion</h1>
{{ Form::model($discussion, array('method' => 'PATCH', 'route' => array('discussions.update', $discussion->id))) }}
	<ul>
        <li>
            {{ Form::label('gls_id', 'Gls_id:') }}
            {{ Form::input('number', 'gls_id') }}
        </li>

        <li>
            {{ Form::label('created_by_id', 'Created_by_id:') }}
            {{ Form::input('number', 'created_by_id') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('discussions.show', 'Cancel', $discussion->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
