@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit Profile
@stop

{{-- Content --}}
@section('content')

<h1 class="col-md-6 col-md-offset-3">Edit Category</h1>
<div class="well col-md-6 col-md-offset-3">
{{ Form::model($tag, array('method' => 'PATCH', 'route' => array('tags.update', $tag->id), 'class'=>'form-horizontal', 'role'=>'form')) }}
    {{ Form::hidden('type', 'Category') }}
    <div class="form-group">
        {{ Form::label('label_en', 'English:', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('label_en', $tag->languages['en']['title'], array('class' => 'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('label_ar', 'Arabic:', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('label_ar', $tag->languages['ar']['title'], array('class' => 'form-control lang-ar')) }}
        </div>
    </div>

    <div class="form-group col-sm-offset-2 col-sm-10">
        {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
        {{ link_to_route('tags.show', 'Cancel', $tag->id, array('class' => 'btn')) }}
    </div>
</div>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
