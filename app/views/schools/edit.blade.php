@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')

<h1>Edit School</h1>

@if ($errors->any())
<ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
</ul>
@endif

<div class="well col-md-6 col-md-offset-3">
{{ Form::model($school, array('method' => 'PATCH', 'route' => array('schools.update', $school->id)), array('class' => 'form-horizontal', 'role' => 'form')) }}
    <div class="well">
        <div class="form-group">
            {{ Form::label('name', 'Name:', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::text('name', $name, array('class' => 'form-control')) }}
            </div>
        </div>

        <div>
            {{ Form::label('description', 'Description:', array('class' => 'col-sm-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::textarea('description', $description,  array('class' => 'form-control')) }}
            </div>
        </div>

        <div class="form-group col-sm-offset-2 col-sm-10">
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('schools.show', 'Cancel', $school->id, array('class' => 'btn')) }}
        </div>
    </div>

{{ Form::close() }}
</div>



@stop
