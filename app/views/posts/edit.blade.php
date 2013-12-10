@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit Profile
@stop

{{-- Content --}}
@section('content')

<h1>Edit Post</h1>
{{ Form::model($post, array('method' => 'PATCH', 'route' => array('posts.update', $post->id))) }}
	<ul>
        <li>
            {{ Form::label('translated_by_id', 'Translated_by_id:') }}
            {{ Form::input('number', 'translated_by_id') }}
        </li>

        <li>
            {{ Form::label('last_translated', 'Last_translated:') }}
            {{ Form::text('last_translated') }}
        </li>

        <li>
            {{ Form::label('translation_comment', 'Translation_comment:') }}
            {{ Form::text('translation_comment') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('posts.show', 'Cancel', $post->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
