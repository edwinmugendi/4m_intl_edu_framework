@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit Profile
@stop

{{-- Content --}}
@section('content')

<h1>All Posts</h1>

<p>{{ link_to_route('topics.posts.create', 'Add new post', array($topic->id), array('class' => 'action-link')) }}</p>

@if ($posts->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Translated_by_id</th>
				<th>Last_translated</th>
				<th>Translation_comment</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($posts as $post)
				<tr>
					<td>{{{ $post->translated_by_id }}}</td>
					<td>{{{ $post->last_translated }}}</td>
					<td>{{{ $post->translation_comment }}}</td>
                    <td>{{ link_to_route('topics.posts.edit', 'Edit', array($topic->id, $post->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('posts.destroy', $post->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no posts
@endif

@stop
