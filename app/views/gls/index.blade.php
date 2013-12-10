@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')

<h1>Gls Listing</h1>

<p>{{ link_to_route('gls.create', 'Add new gls') }}</p>

@if ($gls->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Cal_id</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($gls as $gls)
				<tr>
					<td>{{{ $gls->name }}}</td>
					<td>{{{ $gls->cal_id }}}</td>
                    <td>{{ link_to_route('discussions.topics.index', 'View Discussion Topics', $gls->discussion->id, array('class' => 'action-link')) }}</td>
                    <td>{{ link_to_route('gls.edit', 'Edit', array($gls->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('gls.destroy', $gls->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no gls
@endif

@stop
