@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit Profile
@stop

{{-- Content --}}
@section('content')

<h1>All Topics</h1>

<p>{{ link_to_route('discussions.topics.create', 'Add new topic', array($discussion->id), array('class' => 'action-link')) }}</p>

@if ($topics->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>English title</th>
                <th>Arabic title</th>
                <th>Admin_notes</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($topics as $topic)
				<tr>
                    <td>{{{ $topic->languages['en']['title'] }}}</td>
                    <td align="right">{{{ $topic->languages['ar']['title'] }}}</td>
                    <td>{{{ $topic->admin_notes }}}</td>
                    <td>{{ link_to_route('topics.posts.index', 'View Topic Posts', array($topic->id), array('class' => 'action-link')) }}</td>
                    <td>{{ link_to_route('discussions.topics.edit', 'Edit', array($topic->discussion_id, $topic->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('discussions.topics.destroy', $discussion->id, $topic->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no topics
@endif

@stop
