@extends('layouts.scaffold')

@section('main')

<h1>Show Notification</h1>

<p>{{ link_to_route('notifications.index', 'Return to all notifications') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Label</th>
				<th>Description</th>
				<th>Subject</th>
				<th>Body</th>
				<th>Sent_adresses</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $notification->label }}}</td>
					<td>{{{ $notification->description }}}</td>
					<td>{{{ $notification->subject }}}</td>
					<td>{{{ $notification->body }}}</td>
					<td>{{{ $notification->sent_adresses }}}</td>
                    <td>{{ link_to_route('notifications.edit', 'Edit', array($notification->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('notifications.destroy', $notification->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
