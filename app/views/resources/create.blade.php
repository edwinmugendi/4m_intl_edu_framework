@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit Profile
@stop

{{-- Content --}}
@section('content')

<h1>Create Resource</h1>

{{ Form::open(array('route' => 'resources.store')) }}
	<ul>
        <li>
            {{ Form::label('file_id', 'File_id:') }}
            {{ Form::input('number', 'file_id') }}
        </li>

        <li>
            {{ Form::label('translated_by_id', 'Translated_by_id:') }}
            {{ Form::input('number', 'translated_by_id') }}
        </li>

        <li>
            {{ Form::label('last_translated', 'Last_translated:') }}
            {{ Form::text('last_translated') }}
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


