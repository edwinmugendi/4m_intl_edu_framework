@extends('layouts.scaffold')

@section('main')

<h1>Show NotificationConfig</h1>

<p>{{ link_to_route('notificationConfigs.index', 'Return to all notificationConfigs') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Description</th>
				<th>To_addresses</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $notificationConfig->name }}}</td>
					<td>{{{ $notificationConfig->description }}}</td>
					<td>{{{ $notificationConfig->to_addresses }}}</td>
                    <td>{{ link_to_route('notificationConfigs.edit', 'Edit', array($notificationConfig->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('notificationConfigs.destroy', $notificationConfig->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
