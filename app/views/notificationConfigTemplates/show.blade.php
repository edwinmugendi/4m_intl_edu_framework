@extends('layouts.scaffold')

@section('main')

<h1>Show NotificationConfigTemplate</h1>

<p>{{ link_to_route('notificationConfigTemplates.index', 'Return to all notificationConfigTemplates') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Notification_config_id</th>
				<th>Language_code</th>
				<th>Subject</th>
				<th>Template_path</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $notificationConfigTemplate->notification_config_id }}}</td>
					<td>{{{ $notificationConfigTemplate->language_code }}}</td>
					<td>{{{ $notificationConfigTemplate->subject }}}</td>
					<td>{{{ $notificationConfigTemplate->template_path }}}</td>
                    <td>{{ link_to_route('notificationConfigTemplates.edit', 'Edit', array($notificationConfigTemplate->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('notificationConfigTemplates.destroy', $notificationConfigTemplate->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
