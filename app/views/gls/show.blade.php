@extends('layouts.default')

{{-- Web site Title --}}
@section('title')
@parent
Home
@stop

{{-- Content --}}
@section('content')

<h1>Gls Detail</h1>

<p>{{ link_to_route('gls.index', 'Return to all gls') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Cal_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $gls->name }}}</td>
            <td>{{{ $gls->cal_id }}}</td>
            <td>{{ link_to_route('gls.edit', 'Edit', array($gls->id), array('class' => 'btn btn-info')) }}</td>
            <td>
                {{ Form::open(array('method' => 'DELETE', 'route' => array('gls.destroy', $gls->id))) }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td>
		</tr>
	</tbody>
</table>

@stop
