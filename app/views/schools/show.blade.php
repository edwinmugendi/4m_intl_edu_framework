@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')

<h1>Show School</h1>

<p>{{ link_to_route('schools.index', 'Return to all schools') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Description</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $school->name }}}</td>
					<td>{{{ $school->description }}}</td>
                    <td>{{ link_to_route('schools.edit', 'Edit', array($school->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('schools.destroy', $school->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
