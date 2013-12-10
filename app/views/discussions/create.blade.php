@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit Profile
@stop

{{-- Content --}}
@section('content')

<h1>Create Discussion</h1>

{{ Form::open(array('route' => 'discussions.store')) }}
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
            <div class="row translatable-basic">
                <div class="col-md-6 translation-en">
                    <h4>English</h4>
                    <ul>
                        <li>
                            {{ Form::label('title-en', 'Title:') }}
                            {{ Form::text('title-en') }}
                        </li>
                        <li>
                            {{ Form::label('content-en', 'Content: ') }}
                            {{ Form::textarea('content-en') }}
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 translation-ar">
                    <h4>Arabic</h4>
                    <ul>
                        <li>
                            {{ Form::label('title-ar', 'Title:') }}
                            {{ Form::text('title-ar') }}
                        </li>
                        <li>
                            {{ Form::label('content-ar', 'Content: ') }}
                            {{ Form::textarea('content-ar') }}
                        </li>
                    </ul>
                </div>
            </div>
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


