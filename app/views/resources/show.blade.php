@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit Profile
@stop

{{-- Content --}}
@section('content')

<h1>Show Resource</h1>

<p>{{ link_to_route('resources.index', 'Return to all resources') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>File_id</th>
				<th>Translated_by_id</th>
				<th>Last_translated</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $resource->file_id }}}</td>
					<td>{{{ $resource->translated_by_id }}}</td>
					<td>{{{ $resource->last_translated }}}</td>
                    <td>{{ link_to_route('resources.edit', 'Edit', array($resource->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('resources.destroy', $resource->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
