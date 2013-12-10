@extends('layouts.scaffold')

@section('main')

<h1>All NotificationConfigs</h1>

<p>{{ link_to_route('notificationConfigs.create', 'Add new notificationConfig') }}</p>

@if ($notificationConfigs->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Description</th>
				<th>To_addresses</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($notificationConfigs as $notificationConfig)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no notificationConfigs
@endif

@stop
