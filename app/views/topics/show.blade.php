@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit Profile
@stop

{{-- Content --}}
@section('content')

<h1>Show Topic</h1>

<p>{{ link_to_route('topics.index', 'Return to all topics') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Admin_notes</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $topic->admin_notes }}}</td>
                    <td>{{ link_to_route('topics.edit', 'Edit', array($topic->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('topics.destroy', $topic->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
