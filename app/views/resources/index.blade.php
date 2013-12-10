@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit Profile
@stop

{{-- Content --}}
@section('content')

<h1>All Resources</h1>

<p>{{ link_to_route('resources.create', 'Add new resource') }}</p>

@if ($resources->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>File_id</th>
				<th>Translated_by_id</th>
				<th>Last_translated</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($resources as $resource)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no resources
@endif

@stop
