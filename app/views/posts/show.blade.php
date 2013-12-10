@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit Profile
@stop

{{-- Content --}}
@section('content')

<h1>Show Post</h1>

<p>{{ link_to_route('posts.index', 'Return to all posts') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Translated_by_id</th>
				<th>Last_translated</th>
				<th>Translation_comment</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $post->translated_by_id }}}</td>
					<td>{{{ $post->last_translated }}}</td>
					<td>{{{ $post->translation_comment }}}</td>
                    <td>{{ link_to_route('posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('posts.destroy', $post->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
