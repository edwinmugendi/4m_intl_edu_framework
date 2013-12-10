@extends('layouts.scaffold')

@section('main')

<h1>All Activitylogs</h1>

<p>{{ link_to_route('activitylogs.create', 'Add new activitylog') }}</p>

@if ($activitylogs->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>User_id</th>
				<th>Object_type</th>
				<th>Object_id</th>
				<th>Action</th>
				<th>Detail</th>
				<th>Created</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($activitylogs as $activitylog)
				<tr>
					<td>{{{ $activitylog->user_id }}}</td>
					<td>{{{ $activitylog->object_type }}}</td>
					<td>{{{ $activitylog->object_id }}}</td>
					<td>{{{ $activitylog->action }}}</td>
					<td>{{{ $activitylog->detail }}}</td>
					<td>{{{ $activitylog->created }}}</td>
                    <td>{{ link_to_route('activitylogs.edit', 'Edit', array($activitylog->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('activitylogs.destroy', $activitylog->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no activitylogs
@endif

@stop
