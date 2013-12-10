@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit Profile
@stop

{{-- Content --}}
@section('content')

<h1>All Discussions</h1>

<p>{{ link_to_route('discussions.create', 'Add new discussion') }}</p>

@if ($discussions->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Gls_id</th>
				<th>Created_by_id</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($discussions as $discussion)
				<tr>
					<td>{{{ $discussion->gls_id }}}</td>
					<td>{{{ $discussion->created_by_id }}}</td>
                    <td>{{ link_to_route('discussions.edit', 'Edit', array($discussion->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('discussions.destroy', $discussion->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no discussions
@endif

@stop
