@extends('layouts.scaffold')

@section('main')

<h1>Create ParticipantUpload</h1>

{{ Form::open(array('route' => 'participantUploads.store')) }}
	<ul>
        <li>
            {{ Form::label('file_id', 'File_id:') }}
            {{ Form::input('number', 'file_id') }}
        </li>

        <li>
            {{ Form::label('user_id', 'User_id:') }}
            {{ Form::input('number', 'user_id') }}
        </li>

        <li>
            {{ Form::label('gls_cal_id', 'Gls_cal_id:') }}
            {{ Form::input('number', 'gls_cal_id') }}
        </li>

        <li>
            {{ Form::label('school_id', 'School_id:') }}
            {{ Form::input('number', 'school_id') }}
        </li>

        <li>
            {{ Form::label('feedback_req_user_id', 'Feedback_req_user_id:') }}
            {{ Form::input('number', 'feedback_req_user_id') }}
        </li>

        <li>
            {{ Form::label('feedback_last_modified', 'Feedback_last_modified:') }}
            {{ Form::text('feedback_last_modified') }}
        </li>

        <li>
            {{ Form::label('shared', 'Shared:') }}
            {{ Form::checkbox('shared') }}
        </li>

        <li>
            {{ Form::label('shared_by_user_id', 'Shared_by_user_id:') }}
            {{ Form::input('number', 'shared_by_user_id') }}
        </li>

        <li>
            {{ Form::label('shared_by_user_role_id', 'Shared_by_user_role_id:') }}
            {{ Form::input('number', 'shared_by_user_role_id') }}
        </li>

        <li>
            {{ Form::label('share_last_modified', 'Share_last_modified:') }}
            {{ Form::text('share_last_modified') }}
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


