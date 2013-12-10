@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Edit Profile
@stop

{{-- Content --}}
@section('content')

<h1>All Categories</h1>

<p>{{ link_to_route('tags.create', 'Add new tag') }}</p>

@if ($tags->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Category - English</th>
                <th>Category - Arabic</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($tags as $tag)
				<tr>
                    <td>{{{ $tag->languages['en']['title'] }}}</td>
                    <td class="lang-ar">{{{ $tag->languages['ar']['title'] }}}</td>
                    <td>{{ link_to_route('tags.edit', 'Edit', array($tag->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('tags.destroy', $tag->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are currently no categories in the system.
@endif

@stop
