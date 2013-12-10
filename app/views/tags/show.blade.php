@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit Profile
@stop

{{-- Content --}}
@section('content')

<h1>Show Category</h1>

<p>{{ link_to_route('tags.index', 'Return to all Categories') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Type</th>
				<th>Created_by</th>
				<th>Last_modified_by</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $tag->type }}}</td>
					<td>{{{ $tag->created_by }}}</td>
					<td>{{{ $tag->last_modified_by }}}</td>
                    <td>{{ link_to_route('tags.edit', 'Edit', array($tag->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('tags.destroy', $tag->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
