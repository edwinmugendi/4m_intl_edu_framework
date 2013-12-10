@extends('layouts.scaffold')

@section('main')

<h1>Create Translation</h1>

{{ Form::open(array('route' => 'translations.store')) }}
	<ul>
        <li>
            {{ Form::label('translatable_type', 'Translatable_type:') }}
            {{ Form::text('translatable_type') }}
        </li>

        <li>
            {{ Form::label('translatable_id', 'Translatable_id:') }}
            {{ Form::input('number', 'translatable_id') }}
        </li>

        <li>
            {{ Form::label('language_code', 'Language_code:') }}
            {{ Form::text('language_code') }}
        </li>

        <li>
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title') }}
        </li>

        <li>
            {{ Form::label('content', 'Content:') }}
            {{ Form::textarea('content') }}
        </li>

        <li>
            {{ Form::label('notes', 'Notes:') }}
            {{ Form::textarea('notes') }}
        </li>

        <li>
            {{ Form::label('created_by_id', 'Created_by_id:') }}
            {{ Form::input('number', 'created_by_id') }}
        </li>

        <li>
            {{ Form::label('last_updated_by_id', 'Last_updated_by_id:') }}
            {{ Form::input('number', 'last_updated_by_id') }}
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


