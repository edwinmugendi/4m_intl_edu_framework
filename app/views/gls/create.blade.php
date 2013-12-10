@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')

<h1 class="col-md-6 col-md-offset-3">Create Gls</h1>
<div class="well col-md-6 col-md-offset-3">
{{ Form::open(array('route' => 'gls.store', 'class'=>'form-horizontal', 'role'=>'form')) }}
   <div class="form-group">
        {{ Form::label('name', 'Name:', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::text('name','', array('class' => 'form-control')) }}
    	</div>
    </div>


	<div class="form-group">
        {{ Form::label('cal_id', 'Cal_id:', array('class' => 'col-sm-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::input('number', 'cal_id','', array('class' => 'form-control')) }}
    	</div>
    </div>




	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</div>
	</div>

{{ Form::close() }}
</div>
@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


