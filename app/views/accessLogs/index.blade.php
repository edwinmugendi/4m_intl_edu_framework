@extends('layouts.scaffold')

@section('main')

<h1>All AccessLogs</h1>

<p>{{ link_to_route('accessLogs.create', 'Add new accessLog') }}</p>

@if ($accessLogs->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>User_id</th>
				<th>Created</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($accessLogs as $accessLog)
				<tr>
					<td>{{{ $accessLog->user_id }}}</td>
					<td>{{{ $accessLog->created }}}</td>
                    <td>{{ link_to_route('accessLogs.edit', 'Edit', array($accessLog->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('accessLogs.destroy', $accessLog->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no accessLogs
@endif

@stop
